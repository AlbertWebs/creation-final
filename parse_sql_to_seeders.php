<?php

/**
 * Script to parse SQL file and create Laravel seeders
 * Usage: php parse_sql_to_seeders.php
 */

$sqlFile = __DIR__ . '/creation_revamps.sql';
$content = file_get_contents($sqlFile);

// Extract INSERT statements
preg_match_all('/INSERT INTO `(\w+)`[^;]+;/s', $content, $matches);

$tables = [];
foreach ($matches[1] as $index => $tableName) {
    if (!isset($tables[$tableName])) {
        $tables[$tableName] = [];
    }
    $tables[$tableName][] = $matches[0][$index];
}

echo "Found " . count($tables) . " tables with INSERT statements\n";

// Generate seeders for main tables
$mainTables = ['categories', 'clients', 'portfolios', 'services', 'blogs'];

foreach ($mainTables as $table) {
    if (isset($tables[$table])) {
        echo "Processing table: $table\n";
        // The actual parsing would be more complex - this is a placeholder
        // For now, we'll create seeders manually
    }
}

echo "Done!\n";

