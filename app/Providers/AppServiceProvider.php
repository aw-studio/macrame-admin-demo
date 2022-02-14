<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // $page = new Page();

        // $user = new User();

        // $user->grant($page);
        // $user->deny($page);
        // $user->isOwner($page);
        // $user->hasAccess($page);
        // $user->granted_pages;

        // $file->save();

        // // FileManager
        // $collection->addFile($file);

        // // Page
        // $page->addFile($file);

        // // ------------

        // // Page controller
        // $file->group = 'foo';
        // $file->save();

        // $page->addFileCollection($collection);
    }
}
