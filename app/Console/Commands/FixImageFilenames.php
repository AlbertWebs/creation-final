<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FixImageFilenames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:fix-filenames {--dry-run : Show what would be changed without making changes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix image filenames in database by removing semicolons and updating to match sanitized filenames';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dryRun = $this->option('dry-run');
        
        if ($dryRun) {
            $this->info('DRY RUN MODE - No changes will be made');
            $this->newLine();
        }

        $this->info('Fixing image filenames in database...');
        $this->newLine();

        $totalFixed = 0;
        $totalSkipped = 0;
        $totalNotFound = 0;

        // Fix Blogs
        $this->info('Processing Blogs...');
        $blogs = DB::table('blogs')->get();
        foreach ($blogs as $blog) {
            $imageFields = ['image', 'image_one', 'image_two', 'image_three', 'image_four', 'image_five'];
            foreach ($imageFields as $field) {
                if ($blog->$field && strpos($blog->$field, ':') !== false) {
                    $sanitized = str_replace(':', '_', $blog->$field);
                    $oldPath = public_path('uploads/blogs/' . $blog->$field);
                    $newPath = public_path('uploads/blogs/' . $sanitized);
                    
                    // Check if sanitized file exists
                    if (File::exists($newPath)) {
                        if (!$dryRun) {
                            DB::table('blogs')->where('id', $blog->id)->update([$field => $sanitized]);
                        }
                        $this->line("  ✓ Blog #{$blog->id} - {$field}: {$blog->$field} → {$sanitized}");
                        $totalFixed++;
                    } elseif (File::exists($oldPath)) {
                        // File exists with old name, rename it
                        if (!$dryRun) {
                            File::move($oldPath, $newPath);
                            DB::table('blogs')->where('id', $blog->id)->update([$field => $sanitized]);
                        }
                        $this->line("  ✓ Blog #{$blog->id} - {$field}: Renamed file and updated DB");
                        $totalFixed++;
                    } else {
                        $this->line("  ✗ Blog #{$blog->id} - {$field}: File not found ({$blog->$field})");
                        $totalNotFound++;
                    }
                }
            }
        }

        // Fix Portfolios
        $this->info('Processing Portfolios...');
        $portfolios = DB::table('portfolios')->get();
        foreach ($portfolios as $portfolio) {
            $imageFields = ['image', 'image_one', 'image_two', 'image_three', 'image_four', 
                           'image_five', 'image_six', 'image_seven', 'image_eight', 'image_nine', 'image_ten'];
            foreach ($imageFields as $field) {
                if ($portfolio->$field && strpos($portfolio->$field, ':') !== false) {
                    $sanitized = str_replace(':', '_', $portfolio->$field);
                    $oldPath = public_path('uploads/portfolios/' . $portfolio->$field);
                    $newPath = public_path('uploads/portfolios/' . $sanitized);
                    
                    if (File::exists($newPath)) {
                        if (!$dryRun) {
                            DB::table('portfolios')->where('id', $portfolio->id)->update([$field => $sanitized]);
                        }
                        $this->line("  ✓ Portfolio #{$portfolio->id} - {$field}: {$portfolio->$field} → {$sanitized}");
                        $totalFixed++;
                    } elseif (File::exists($oldPath)) {
                        if (!$dryRun) {
                            File::move($oldPath, $newPath);
                            DB::table('portfolios')->where('id', $portfolio->id)->update([$field => $sanitized]);
                        }
                        $this->line("  ✓ Portfolio #{$portfolio->id} - {$field}: Renamed file and updated DB");
                        $totalFixed++;
                    } else {
                        $this->line("  ✗ Portfolio #{$portfolio->id} - {$field}: File not found ({$portfolio->$field})");
                        $totalNotFound++;
                    }
                }
            }
        }

        // Fix Services
        $this->info('Processing Services...');
        $services = DB::table('services')->get();
        foreach ($services as $service) {
            if ($service->image && strpos($service->image, ':') !== false) {
                $sanitized = str_replace(':', '_', $service->image);
                $oldPath = public_path('uploads/services/' . $service->image);
                $newPath = public_path('uploads/services/' . $sanitized);
                
                if (File::exists($newPath)) {
                    if (!$dryRun) {
                        DB::table('services')->where('id', $service->id)->update(['image' => $sanitized]);
                    }
                    $this->line("  ✓ Service #{$service->id} - image: {$service->image} → {$sanitized}");
                    $totalFixed++;
                } elseif (File::exists($oldPath)) {
                    if (!$dryRun) {
                        File::move($oldPath, $newPath);
                        DB::table('services')->where('id', $service->id)->update(['image' => $sanitized]);
                    }
                    $this->line("  ✓ Service #{$service->id} - image: Renamed file and updated DB");
                    $totalFixed++;
                } else {
                    $this->line("  ✗ Service #{$service->id} - image: File not found ({$service->image})");
                    $totalNotFound++;
                }
            }
        }

        // Fix Categories
        $this->info('Processing Categories...');
        $categories = DB::table('categories')->get();
        foreach ($categories as $category) {
            if ($category->image && strpos($category->image, ':') !== false) {
                $sanitized = str_replace(':', '_', $category->image);
                $oldPath = public_path('uploads/categories/' . $category->image);
                $newPath = public_path('uploads/categories/' . $sanitized);
                
                if (File::exists($newPath)) {
                    if (!$dryRun) {
                        DB::table('categories')->where('id', $category->id)->update(['image' => $sanitized]);
                    }
                    $this->line("  ✓ Category #{$category->id} - image: {$category->image} → {$sanitized}");
                    $totalFixed++;
                } elseif (File::exists($oldPath)) {
                    if (!$dryRun) {
                        File::move($oldPath, $newPath);
                        DB::table('categories')->where('id', $category->id)->update(['image' => $sanitized]);
                    }
                    $this->line("  ✓ Category #{$category->id} - image: Renamed file and updated DB");
                    $totalFixed++;
                } else {
                    $this->line("  ✗ Category #{$category->id} - image: File not found ({$category->image})");
                    $totalNotFound++;
                }
            }
        }

        // Fix Clients
        $this->info('Processing Clients...');
        $clients = DB::table('clients')->get();
        foreach ($clients as $client) {
            if ($client->image && strpos($client->image, ':') !== false) {
                $sanitized = str_replace(':', '_', $client->image);
                $oldPath = public_path('uploads/clients/' . $client->image);
                $newPath = public_path('uploads/clients/' . $sanitized);
                
                if (File::exists($newPath)) {
                    if (!$dryRun) {
                        DB::table('clients')->where('id', $client->id)->update(['image' => $sanitized]);
                    }
                    $this->line("  ✓ Client #{$client->id} - image: {$client->image} → {$sanitized}");
                    $totalFixed++;
                } elseif (File::exists($oldPath)) {
                    if (!$dryRun) {
                        File::move($oldPath, $newPath);
                        DB::table('clients')->where('id', $client->id)->update(['image' => $sanitized]);
                    }
                    $this->line("  ✓ Client #{$client->id} - image: Renamed file and updated DB");
                    $totalFixed++;
                } else {
                    $this->line("  ✗ Client #{$client->id} - image: File not found ({$client->image})");
                    $totalNotFound++;
                }
            }
        }

        $this->newLine();
        $this->info('Summary:');
        $this->line("  Fixed: {$totalFixed}");
        $this->line("  Not Found: {$totalNotFound}");
        
        if ($dryRun) {
            $this->info('DRY RUN complete. Run without --dry-run to apply changes.');
        } else {
            $this->info('✓ All image filenames have been fixed!');
        }

        return 0;
    }
}

