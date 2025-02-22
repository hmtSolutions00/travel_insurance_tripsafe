<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $currentRoute = request()->route() ? request()->route()->getName() : '';

            // **1️⃣ Generate Breadcrumb**
            $breadcrumb = [];
            if ($currentRoute) {
                $routeParts = explode('.', $currentRoute);
                
                if ($routeParts[0] === 'admin') {
                    array_shift($routeParts);
                }

                $path = '';

                foreach ($routeParts as $key => $part) {
                    $path .= ($key > 0 ? '.' : '') . $part;
                    $routeName = 'admin.' . $path;

                    $breadcrumb[] = [
                        'name' => Str::title(str_replace('_', ' ', $part)),
                        'route' => Route::has($routeName) 
                            ? (Str::contains($routeName, ['edit', 'update', 'show', 'destroy']) 
                                ? null  // Jangan buat route jika butuh ID tapi tidak ada ID
                                : route($routeName)) 
                            : null
                    ];
                }
            }

            // **2️⃣ Tentukan Sidebar yang Aktif Berdasarkan Prefix Route**
            $activeSidebar = [
                'master_tipe_perjalanan' => Str::startsWith($currentRoute, 'admin.master.tipe_perjalanan.'),
                'master_wilayah' => Str::startsWith($currentRoute, 'admin.master.wilayah.'),
                'master_tipe_asuransi' => Str::startsWith($currentRoute, 'admin.master.tipe_asuransi.'),
                // 'tipe_customer' => Str::startsWith($currentRoute, 'admin.master.tipe_customer.'),
                // 'paket_asuransi' => Str::startsWith($currentRoute, 'admin.master.paket_asuransi.'),
                'master_pesanan_asuransi' => Str::startsWith($currentRoute, 'admin.data.pesanan_asuransi.'),
            ];

            // Kirim data ke semua tampilan
            $view->with([
                'breadcrumb' => $breadcrumb,
                'activeSidebar' => $activeSidebar
            ]);
        });
    }

    public function register()
    {
        //
    }
}
