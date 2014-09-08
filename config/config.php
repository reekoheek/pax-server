<?php

/**
 * Bono App Configuration
 *
 * @category  PHP_Framework
 * @package   Bono
 * @author    Ganesha <reekoheek@gmail.com>
 * @copyright 2013 PT Sagara Xinix Solusitama
 * @license   https://raw.github.com/xinix-technology/bono/master/LICENSE MIT
 * @version   0.10.0
 * @link      http://xinix.co.id/products/bono
 */

use Norm\Schema\String;

return array(
    'app.about' => array(
        'title' => 'PAX',
    ),
    'bono.providers' => array(
        '\\Norm\\Provider\\NormProvider' => array(
            'datasources' => array(
                'mongo' => array(
                    'driver' => '\\Norm\\Connection\\MongoConnection',
                    'database' => 'xpax',
                ),
            ),
            'collections' => array(
                'mapping' => array(
                    'Package' => array(
                        'schema' => array(
                            'name' => String::create('name'),
                            'repository' => String::create('repository'),
                        ),
                    ),
                ),
            ),
        ),
        '\\Xinix\\Pax\\Provider\\AppProvider',
    ),
    'bono.middlewares' => array(
        '\\Bono\\Middleware\\ControllerMiddleware' => array(
            'default' => '\\Norm\\Controller\\NormController',
            'mapping' => array(
                '/package' => null,
            ),
        ),
        '\\Bono\\Middleware\\ContentNegotiatorMiddleware' => array(
            'extensions' => array(
                'json' => 'application/json',
            ),
            'views' => array(
                'application/json' => '\\Bono\\View\\JsonView',
            ),
        ),
        '\\ROH\\BonoAuth\\Middleware\\AuthMiddleware' => array(
            'driver' => '\\ROH\\BonoAuth\\Driver\\OAuth',
            'debug' => true,
            'baseUrl' => 'https://account.dev.xinix.co.id/index.php',
            'authUrl' => '/oauth/auth',
            'tokenUrl' => '/oauth/token',
            'revokeUrl' => '/oauth/revoke',
            'clientId' => 'pax-fjdksl94fds0dew09cdf',
            'clientSecret' => 'dh983hf89rhd89rh3rhjfde9fewn89fewur89dejc9eer',
            'redirectUri' => \Bono\Helper\URL::site('/login'),
            'scope' => 'user',
        ),
        '\\Bono\\Middleware\\NotificationMiddleware',
        '\\Bono\\Middleware\\SessionMiddleware',
    ),
    'bono.theme' => array(
        'class' => '\\Xinix\\Theme\\NakedTheme',
        'overwrite' => true,
    ),
);
