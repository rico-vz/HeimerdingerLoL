<?php

namespace App\Console\Commands;

use App\Models\Champion;
use App\Models\ChampionSkin;
use App\Models\SummonerIcon;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sheets\Facades\Sheets;

class GenerateSitemapCommand extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate XML sitemaps for all pages';

    private const MAX_URLS_PER_SITEMAP = 50000;
    private const MAX_FILE_SIZE_MB = 50;

    public function handle(): void
    {
        $this->info('Generating sitemaps...');

        $baseUrl = config('app.HEIMER_URL', 'https://heimerdinger.lol');
        $urls = [];

        $this->info('Collecting static pages...');
        $urls = array_merge($urls, $this->getStaticPages($baseUrl));

        $this->info('Collecting posts...');
        $urls = array_merge($urls, $this->getPosts($baseUrl));

        $this->info('Collecting icons...');
        $urls = array_merge($urls, $this->getIcons($baseUrl));

        $this->info('Collecting skins...');
        $urls = array_merge($urls, $this->getSkins($baseUrl));

        $this->info('Collecting champions...');
        $urls = array_merge($urls, $this->getChampions($baseUrl));

        $totalUrls = count($urls);
        $this->info("Total URLs: {$totalUrls}");

        if ($totalUrls > self::MAX_URLS_PER_SITEMAP) {
            $this->info('Splitting into multiple sitemaps...');
            $this->generateMultipleSitemaps($urls, $baseUrl);
        } else {
            $this->info('Generating single sitemap...');
            $this->generateSingleSitemap($urls, $baseUrl);
        }

        $this->info('Sitemap generation complete!');
    }

    private function getStaticPages(string $baseUrl): array
    {
        $staticPages = [
            ['url' => route('home'), 'priority' => 1.0, 'changefreq' => 'daily'],
            ['url' => route('champions.index'), 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url' => route('skins.index'), 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url' => route('assets.icons.index'), 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url' => route('assets.emotes.index'), 'priority' => 0.8, 'changefreq' => 'weekly'],
            ['url' => route('assets.index'), 'priority' => 0.8, 'changefreq' => 'weekly'],
            ['url' => route('posts.index'), 'priority' => 0.9, 'changefreq' => 'daily'],
            ['url' => route('sales.index'), 'priority' => 0.8, 'changefreq' => 'daily'],
            ['url' => route('about.index'), 'priority' => 0.7, 'changefreq' => 'monthly'],
            ['url' => route('about.faq.leagueoflegends'), 'priority' => 0.7, 'changefreq' => 'monthly'],
            ['url' => route('about.faq.heimerdinger'), 'priority' => 0.7, 'changefreq' => 'monthly'],
            ['url' => route('contact.index'), 'priority' => 0.6, 'changefreq' => 'monthly'],
            ['url' => route('donate'), 'priority' => 0.6, 'changefreq' => 'monthly'],
            ['url' => route('roadmap'), 'priority' => 0.6, 'changefreq' => 'monthly'],
        ];

        $urls = [];
        foreach ($staticPages as $page) {
            $urls[] = Url::create($page['url'])
                ->setLastModificationDate(now())
                ->setChangeFrequency($page['changefreq'])
                ->setPriority($page['priority']);
        }

        return $urls;
    }

    private function getPosts(string $baseUrl): array
    {
        $posts = Sheets::all()->filter(fn($post) => !$post->hidden);
        $urls = [];

        foreach ($posts as $post) {
            $date = Carbon::parse($post->date);
            $urls[] = Url::create(route('posts.show', $post->slug))
                ->setLastModificationDate($date)
                ->setChangeFrequency('monthly')
                ->setPriority(0.8);
        }

        return $urls;
    }

    private function getIcons(string $baseUrl): array
    {
        $icons = SummonerIcon::select('slug', 'updated_at')->get();
        $urls = [];

        foreach ($icons as $icon) {
            $lastmod = $icon->updated_at ? Carbon::parse($icon->updated_at) : now();
            $urls[] = Url::create(route('assets.icons.show', $icon->slug))
                ->setLastModificationDate($lastmod)
                ->setChangeFrequency('monthly')
                ->setPriority(0.6);
        }

        return $urls;
    }

    private function getSkins(string $baseUrl): array
    {
        $skins = ChampionSkin::select('slug', 'updated_at', 'release_date')->get();
        $urls = [];

        foreach ($skins as $skin) {
            $lastmod = $skin->updated_at 
                ? Carbon::parse($skin->updated_at) 
                : ($skin->release_date && $skin->release_date !== '' ? $this->parseReleaseDate($skin->release_date) : now());
            $urls[] = Url::create(route('skins.show', $skin->slug))
                ->setLastModificationDate($lastmod)
                ->setChangeFrequency('monthly')
                ->setPriority(0.7);
        }

        return $urls;
    }

    private function getChampions(string $baseUrl): array
    {
        $champions = Champion::select('slug', 'updated_at', 'release_date')->get();
        $urls = [];

        foreach ($champions as $champion) {
            $lastmod = $champion->updated_at 
                ? Carbon::parse($champion->updated_at) 
                : ($champion->release_date && $champion->release_date !== '' ? $this->parseReleaseDate($champion->release_date) : now());
            $urls[] = Url::create(route('champions.show', $champion->slug))
                ->setLastModificationDate($lastmod)
                ->setChangeFrequency('monthly')
                ->setPriority(0.8);
        }

        return $urls;
    }

    private function parseReleaseDate(string $dateString): Carbon
    {
        try {
            return Carbon::parse($dateString);
        } catch (\Exception $e) {
            return now();
        }
    }

    private function generateSingleSitemap(array $urls, string $baseUrl): void
    {
        $sitemap = Sitemap::create();

        foreach ($urls as $url) {
            $sitemap->add($url);
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }

    private function generateMultipleSitemaps(array $urls, string $baseUrl): void
    {
        $chunks = array_chunk($urls, self::MAX_URLS_PER_SITEMAP);
        $sitemapFiles = [];
        $index = 1;

        foreach ($chunks as $chunk) {
            $filename = $index === 1 ? 'sitemap.xml' : "sitemap-{$index}.xml";
            $filepath = public_path($filename);

            $sitemap = Sitemap::create();
            foreach ($chunk as $url) {
                $sitemap->add($url);
            }
            $sitemap->writeToFile($filepath);

            $sitemapFiles[] = $baseUrl . '/' . $filename;
            $index++;
        }

        if (count($sitemapFiles) > 1) {
            $sitemapIndex = SitemapIndex::create();
            foreach ($sitemapFiles as $sitemapFile) {
                $sitemapIndex->add($sitemapFile);
            }
            $sitemapIndex->writeToFile(public_path('sitemap.xml'));
        }
    }
}
