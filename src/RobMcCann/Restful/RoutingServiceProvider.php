<?php

namespace RobMcCann\Restful;

use Illuminate\Routing\RoutingServiceProvider as LaravelRoutingServiceProvider;

class RoutingServiceProvider extends LaravelRoutingServiceProvider {
    /**
     * Register the router instance.
     *
     * @return void
     */
    protected function registerRouter()
    {
        $this->app['router'] = $this->app->share(function($app)
        {
            $router = new Router($app);

            // If the current application environment is "testing", we will disable the
            // routing filters, since they can be tested independently of the routes
            // and just get in the way of our typical controller testing concerns.
            if ($app['env'] == 'testing')
            {
                $router->disableFilters();
            }

            return $router;
        });
    }
}
