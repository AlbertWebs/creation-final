<?php

/**
 * Laravel Project Packaging Script for cPanel Deployment
 * 
 * This script creates a deployment-ready ZIP file excluding
 * unnecessary files for shared hosting deployment.
 */

$rootDir = __DIR__;
$packageName = 'deployment-package-' . date('Y-m-d-His') . '.zip';
$packagePath = $rootDir . '/' . $packageName;

// Files and directories to exclude
$excludePatterns = [
    '.git',
    '.gitignore',
    '.gitattributes',
    'node_modules',
    '.env',
    '.env.example',
    '.env.backup',
    '.idea',
    '.vscode',
    '.DS_Store',
    'Thumbs.db',
    '*.log',
    'tests',
    'phpunit.xml',
    '.phpunit.result.cache',
    'deployment-package-*.zip',
    'package-for-deployment.php',
    'DEPLOYMENT_GUIDE.md',
    'SEO_IMPLEMENTATION_SUMMARY.md',
    'storage/logs/*.log',
    'storage/framework/cache/data/*',
    'storage/framework/sessions/*',
    'storage/framework/views/*.php',
];

// Directories that should be included but emptied (keep structure)
$emptyDirs = [
    'storage/logs',
    'storage/framework/cache/data',
    'storage/framework/sessions',
    'storage/framework/views',
];

echo "🚀 Creating deployment package...\n\n";

// Create ZIP archive
$zip = new ZipArchive();
if ($zip->open($packagePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
    die("❌ Cannot create ZIP file: $packagePath\n");
}

// Function to check if file should be excluded
function shouldExclude($file, $excludePatterns) {
    foreach ($excludePatterns as $pattern) {
        // Simple pattern matching - check if pattern matches file path
        if (strpos($pattern, '*') !== false) {
            // Convert wildcard pattern to regex
            $regexPattern = '#^' . str_replace(['*', '/'], ['.*', '\/'], $pattern) . '$#';
            if (preg_match($regexPattern, $file)) {
                return true;
            }
        } elseif (strpos($file, $pattern) !== false) {
            return true;
        }
    }
    return false;
}

// Function to add directory to ZIP
function addDirectoryToZip($zip, $dir, $rootDir, $excludePatterns, $emptyDirs) {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $file) {
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootDir) + 1);
            
            // Check if should be excluded
            if (shouldExclude($relativePath, $excludePatterns)) {
                continue;
            }
            
            // Check if in empty directory (skip files, but keep dir structure)
            $shouldEmpty = false;
            foreach ($emptyDirs as $emptyDir) {
                if (strpos($relativePath, $emptyDir) === 0) {
                    // Check if it's a .gitignore file (keep those)
                    if (basename($relativePath) !== '.gitignore') {
                        $shouldEmpty = true;
                        break;
                    }
                }
            }
            
            if ($shouldEmpty) {
                continue;
            }
            
            $zip->addFile($filePath, $relativePath);
            echo "✓ Added: $relativePath\n";
        }
    }
}

// Add .gitignore files to empty directories to maintain structure
foreach ($emptyDirs as $emptyDir) {
    $gitignorePath = $rootDir . '/' . $emptyDir . '/.gitignore';
    if (file_exists($gitignorePath)) {
        $relativePath = $emptyDir . '/.gitignore';
        $zip->addFile($gitignorePath, $relativePath);
        echo "✓ Added: $relativePath\n";
    } else {
        // Create .gitignore if it doesn't exist
        $zip->addFromString($emptyDir . '/.gitignore', "*\n!.gitignore\n");
        echo "✓ Created: $relativePath\n";
    }
}

// Add all files and directories
echo "\n📦 Adding files to package...\n";
addDirectoryToZip($zip, $rootDir, $rootDir, $excludePatterns, $emptyDirs);

// Add .env.example file (for reference)
if (file_exists($rootDir . '/.env.example')) {
    $zip->addFile($rootDir . '/.env.example', '.env.example');
    echo "✓ Added: .env.example\n";
}

// Create deployment instructions file
$instructions = <<<'EOT'
DEPLOYMENT INSTRUCTIONS
=======================

1. Upload this entire package to your cPanel public_html directory
2. Extract the ZIP file
3. Create a .env file in the root directory (copy from .env.example)
4. Update .env with your production database credentials
5. Set permissions: storage/ and bootstrap/cache/ folders to 755
6. Point your domain's document root to the 'public' folder
7. Import your database via phpMyAdmin
8. Visit your website to verify it's working

For detailed instructions, see DEPLOYMENT_GUIDE.md
EOT;

$zip->addFromString('DEPLOYMENT_INSTRUCTIONS.txt', $instructions);
echo "✓ Created: DEPLOYMENT_INSTRUCTIONS.txt\n";

$zip->close();

$packageSize = filesize($packagePath);
$packageSizeMB = round($packageSize / 1024 / 1024, 2);

echo "\n✅ Package created successfully!\n";
echo "📦 Package: $packageName\n";
echo "📊 Size: $packageSizeMB MB\n";
echo "\n📝 Next steps:\n";
echo "   1. Upload $packageName to your cPanel File Manager\n";
echo "   2. Extract it in public_html directory\n";
echo "   3. Follow DEPLOYMENT_INSTRUCTIONS.txt\n";
echo "\n";

