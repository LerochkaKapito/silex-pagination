<?php

/**
 * Part of the SilexPagination
 *
 * @author  Kilte <nwotnbm@gmail.com>
 * @package SilexPagination
 */

namespace Kilte\Silex\Pagination;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * PaginationServiceProvider Class
 *
 * @package Kilte\Silex\Pagination
 */
class PaginationServiceProvider implements ServiceProviderInterface
{

    /**
     * @{inheritdoc}
     */
    public function register(Application $app)
    {
        $app['pagination.per_page'] = isset($app['pagination.per_page']) ? (int) $app['pagination.per_page'] : 20;
        $app['pagination.neighbours'] = isset($app['pagination.neighbours']) ? (int) $app['pagination.neighbours'] : 4;
        $app['pagination'] = $app->protect(
            function ($total, $current, $perPage = null, $neighbours = null) use($app) {
                if ($perPage === null) {
                    $perPage = $app['pagination.per_page'];
                }
                if ($neighbours === null) {
                    $neighbours = $app['pagination.neighbours'];
                }
                return new PaginationService($total, $current, $perPage, $neighbours);
            }
        );
    }

    /**
     * @{inheritdoc}
     */
    public function boot(Application $app)
    {
    }

}
