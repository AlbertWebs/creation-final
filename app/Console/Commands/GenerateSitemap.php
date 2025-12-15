<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Portfolio;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml for SEO';

    public function handle()
    {
        $baseUrl = url('/');
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // 1. Homepage (Highest Priority)
        $sitemap .= $this->addUrl($baseUrl, '1.0', 'daily', now()->format('Y-m-d'));

        // 2. Services (Starting from the first one, ordered by priority)
        $services = Service::orderBy('id', 'asc')->get();
        $servicePriority = 0.9; // Start with high priority for first service
        foreach ($services as $index => $service) {
            // First service gets highest priority, then slightly decrease for others
            $priority = $servicePriority - ($index * 0.05); // Decrease by 0.05 for each subsequent service
            $priority = max(0.7, $priority); // Don't go below 0.7
            $sitemap .= $this->addUrl(
                $baseUrl . '/center-of-excellence/' . $service->slung,
                number_format($priority, 2),
                'monthly',
                $service->updated_at ? $service->updated_at->format('Y-m-d') : now()->format('Y-m-d')
            );
        }

        // Services listing page
        $sitemap .= $this->addUrl($baseUrl . '/center-of-excellence', '0.85', 'weekly', now()->format('Y-m-d'));

        // 3. Portfolio
        $portfolios = Portfolio::all();
        foreach ($portfolios as $portfolio) {
            $sitemap .= $this->addUrl(
                $baseUrl . '/portfolio/' . $portfolio->slung,
                '0.8',
                'monthly',
                $portfolio->updated_at ? $portfolio->updated_at->format('Y-m-d') : now()->format('Y-m-d')
            );
        }
        
        // Portfolio listing page
        $sitemap .= $this->addUrl($baseUrl . '/portfolio', '0.75', 'weekly', now()->format('Y-m-d'));

        // 4. Contact Page
        $sitemap .= $this->addUrl($baseUrl . '/contact-us', '0.7', 'monthly', now()->format('Y-m-d'));

        // Other Static Pages (Lower Priority)
        $staticPages = [
            '/about-us' => '0.6',
            '/careers' => '0.5',
        ];

        foreach ($staticPages as $path => $priority) {
            $sitemap .= $this->addUrl($baseUrl . $path, $priority, 'monthly', now()->format('Y-m-d'));
        }

        // Blogs (Lower Priority)
        $blogs = Blog::all();
        foreach ($blogs as $blog) {
            $sitemap .= $this->addUrl(
                $baseUrl . '/blog/' . $blog->slung,
                '0.5',
                'weekly',
                $blog->updated_at ? $blog->updated_at->format('Y-m-d') : now()->format('Y-m-d')
            );
        }

        // Legal Pages (Lowest Priority, noindex)
        $legalPages = [
            '/copyright' => '0.3',
            '/terms-and-conditions' => '0.3',
            '/privacy-policy' => '0.3',
        ];

        foreach ($legalPages as $path => $priority) {
            $sitemap .= $this->addUrl($baseUrl . $path, $priority, 'yearly', now()->format('Y-m-d'));
        }

        $sitemap .= '</urlset>';

        File::put(public_path('sitemap.xml'), $sitemap);

        $this->info('Sitemap generated successfully at ' . public_path('sitemap.xml'));
    }

    private function addUrl($url, $priority, $changefreq, $lastmod)
    {
        return "  <url>\n" .
               "    <loc>" . htmlspecialchars($url) . "</loc>\n" .
               "    <lastmod>" . $lastmod . "</lastmod>\n" .
               "    <changefreq>" . $changefreq . "</changefreq>\n" .
               "    <priority>" . $priority . "</priority>\n" .
               "  </url>\n";
    }
}

