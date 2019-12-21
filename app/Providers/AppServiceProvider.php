<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
	    /*if(!Collection::hasMacro('paginate')){

	    }
	    Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
		    $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
		    return new LengthAwarePaginator(
			    $this->forPage($page, $perPage),
			    $total ?: $this->count(),
			    $perPage,
			    $page,
			    [
				    'path' => LengthAwarePaginator::resolveCurrentPath(),
				    'pageName' => $pageName,
			    ]
		    );
	    });*/

	    if (!Collection::hasMacro('paginate')) {
		    Collection::macro('paginate',
			    function ($perPage = 15, $page = null, $options = []) {
				    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
				    return (new LengthAwarePaginator($this->forPage($page, $perPage), $this->count(), $perPage, $page, $options))
                    ->withPath('');
            });
	    }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
