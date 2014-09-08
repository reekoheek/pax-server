<?php

namespace Xinix\Pax\Provider;

class AppProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;

        $app->filter('auth.authorize', function ($options) use ($app) {
            if (is_bool($options)) {
                return $options;
            }

            if ($app->request->isGet()) {
                $uri = is_array($options) ? $options['uri'] : $options;
                $segments = explode('/', $uri);
                if (!empty($segments[1]) && $segments[1] == 'package') {
                    return true;
                }
            }
            return $options;
        });

        $app->get('/', function () use ($app) {
            $app->response->template('home');
        });

    }
}
