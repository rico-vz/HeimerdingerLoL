<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemapCommand extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Command description';

    public function handle(): void
    {
        SitemapGenerator::create('https://heimerdinger.lol')
            ->writeToFile(public_path('sitemap.xml'));
    }
}
