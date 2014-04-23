<?php

namespace Xinix\Pax\Provider;

class AppProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;

        $app->filter(
            'auth.authorize',
            function ($allowed) use ($app) {
                if (is_null($allowed)) {
                    if ($app->request->isGet()) {
                        if ($app->request->getSegments(1) == 'package') {
                            return true;
                        }
                    }
                }
                return $allowed;
            }
        );

        $app->get(
            '/',
            function () use ($app) {
                $app->response->template('home');
            }
        );

    }
}
