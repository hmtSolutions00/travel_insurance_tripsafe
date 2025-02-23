<?php

namespace App\Providers;

use App\Models\SocialMedia;
use App\Models\WebsiteConfig;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class WebsiteConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
                // Ambil data website config dari database
                $websiteConfig = WebsiteConfig::first();

                // Ambil data social media yang statusnya 'active'
                $socialMedias = SocialMedia::where('status', 'active')->get();
                // Bagikan data ke semua view
                View::share([
                    'websiteConfig' => $websiteConfig,
                    'socialMedias' => $socialMedias
                ]);;
    }
}
