<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class VerifyImageAssociations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:verify {--fix : Fix missing image files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify image associations in database and file system';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fix = $this->option('fix');
        
        $this->info('Verifying image associations...');
        $this->newLine();

        $issues = [];
        $fixed = 0;

        // Check Blogs
        $this->info('Checking Blogs...');
        $blogs = DB::table('blogs')->get();
        foreach ($blogs as $blog) {
            $imageFields = ['image', 'image_one', 'image_two', 'image_three', 'image_four', 'image_five'];
            foreach ($imageFields as $field) {
                if ($blog->$field) {
                    $path = public_path('uploads/blogs/' . $blog->$field);
                    if (!File::exists($path)) {
                        $issues[] = [
                            'type' => 'Blog',
                            'id' => $blog->id,
                            'field' => $field,
                            'filename' => $blog->$field,
                            'path' => $path
                        ];
                        
                        if ($fix) {
                            DB::table('blogs')->where('id', $blog->id)->update([$field => null]);
                            $fixed++;
                            $this->line("  ✓ Fixed: Blog #{$blog->id} - {$field}");
                        } else {
                            $this->line("  ✗ Missing: Blog #{$blog->id} - {$field}: {$blog->$field}");
                        }
                    }
                }
            }
        }

        // Check Portfolios
        $this->info('Checking Portfolios...');
        $portfolios = DB::table('portfolios')->get();
        foreach ($portfolios as $portfolio) {
            $imageFields = ['image', 'image_one', 'image_two', 'image_three', 'image_four', 
                           'image_five', 'image_six', 'image_seven', 'image_eight', 'image_nine', 'image_ten'];
            foreach ($imageFields as $field) {
                if ($portfolio->$field) {
                    // Sanitize filename (colons to underscores)
                    $filename = str_replace(':', '_', $portfolio->$field);
                    $path = public_path('uploads/portfolios/' . $filename);
                    
                    if (!File::exists($path)) {
                        $issues[] = [
                            'type' => 'Portfolio',
                            'id' => $portfolio->id,
                            'field' => $field,
                            'filename' => $portfolio->$field,
                            'path' => $path
                        ];
                        
                        if ($fix) {
                            DB::table('portfolios')->where('id', $portfolio->id)->update([$field => null]);
                            $fixed++;
                            $this->line("  ✓ Fixed: Portfolio #{$portfolio->id} - {$field}");
                        } else {
                            $this->line("  ✗ Missing: Portfolio #{$portfolio->id} - {$field}: {$portfolio->$field}");
                        }
                    }
                }
            }
        }

        // Check Services
        $this->info('Checking Services...');
        $services = DB::table('services')->get();
        foreach ($services as $service) {
            if ($service->image) {
                $path = public_path('uploads/services/' . $service->image);
                if (!File::exists($path)) {
                    $issues[] = [
                        'type' => 'Service',
                        'id' => $service->id,
                        'field' => 'image',
                        'filename' => $service->image,
                        'path' => $path
                    ];
                    
                    if ($fix) {
                        DB::table('services')->where('id', $service->id)->update(['image' => null]);
                        $fixed++;
                        $this->line("  ✓ Fixed: Service #{$service->id} - image");
                    } else {
                        $this->line("  ✗ Missing: Service #{$service->id} - image: {$service->image}");
                    }
                }
            }
        }

        // Check Categories
        $this->info('Checking Categories...');
        $categories = DB::table('categories')->get();
        foreach ($categories as $category) {
            if ($category->image) {
                $path = public_path('uploads/categories/' . $category->image);
                if (!File::exists($path)) {
                    $issues[] = [
                        'type' => 'Category',
                        'id' => $category->id,
                        'field' => 'image',
                        'filename' => $category->image,
                        'path' => $path
                    ];
                    
                    if ($fix) {
                        DB::table('categories')->where('id', $category->id)->update(['image' => null]);
                        $fixed++;
                        $this->line("  ✓ Fixed: Category #{$category->id} - image");
                    } else {
                        $this->line("  ✗ Missing: Category #{$category->id} - image: {$category->image}");
                    }
                }
            }
        }

        // Check Clients
        $this->info('Checking Clients...');
        $clients = DB::table('clients')->get();
        foreach ($clients as $client) {
            if ($client->image) {
                // Sanitize filename (colons to underscores)
                $filename = str_replace(':', '_', $client->image);
                $path = public_path('uploads/clients/' . $filename);
                
                if (!File::exists($path)) {
                    $issues[] = [
                        'type' => 'Client',
                        'id' => $client->id,
                        'field' => 'image',
                        'filename' => $client->image,
                        'path' => $path
                    ];
                    
                    if ($fix) {
                        DB::table('clients')->where('id', $client->id)->update(['image' => null]);
                        $fixed++;
                        $this->line("  ✓ Fixed: Client #{$client->id} - image");
                    } else {
                        $this->line("  ✗ Missing: Client #{$client->id} - image: {$client->image}");
                    }
                }
            }
        }

        $this->newLine();
        
        if (empty($issues)) {
            $this->info('✓ All image associations are valid!');
            return 0;
        }

        if ($fix) {
            $this->info("✓ Fixed {$fixed} image association(s).");
        } else {
            $this->warn("Found " . count($issues) . " missing image(s).");
            $this->info("Run with --fix flag to automatically fix these issues.");
        }

        return 0;
    }
}

