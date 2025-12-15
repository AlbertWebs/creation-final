<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanupContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'content:cleanup {--dry-run : Show what would be changed without making changes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove semicolons from content fields in database tables';

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
        }

        $this->info('Starting database cleanup...');
        $this->newLine();

        $tables = [
            'blogs' => ['content'],
            'portfolios' => ['content', 'meta'],
            'services' => ['content', 'content_extra', 'meta'],
            'pages' => ['content'],
        ];

        $totalUpdated = 0;

        foreach ($tables as $table => $columns) {
            $this->info("Processing table: {$table}");
            
            foreach ($columns as $column) {
                // Check if column exists
                try {
                    $count = DB::table($table)
                        ->where($column, 'LIKE', '%;%')
                        ->count();
                    
                    if ($count > 0) {
                        $this->line("  - Found {$count} records with semicolons in '{$column}'");
                        
                        if (!$dryRun) {
                            $updated = DB::table($table)
                                ->where($column, 'LIKE', '%;%')
                                ->update([
                                    $column => DB::raw("REPLACE({$column}, ';', '')")
                                ]);
                            
                            $this->line("  - Updated {$updated} records");
                            $totalUpdated += $updated;
                        } else {
                            $this->line("  - Would update {$count} records");
                        }
                    } else {
                        $this->line("  - No semicolons found in '{$column}'");
                    }
                } catch (\Exception $e) {
                    $this->error("  - Error processing '{$column}': " . $e->getMessage());
                }
            }
            
            $this->newLine();
        }

        if ($dryRun) {
            $this->info('DRY RUN complete. Run without --dry-run to apply changes.');
        } else {
            $this->info("Cleanup complete! Total records updated: {$totalUpdated}");
        }

        return 0;
    }
}

