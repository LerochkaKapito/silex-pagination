<?php

/**
 * Part of the SilexPagination
 *
 * @author  Kilte <nwotnbm@gmail.com>
 * @package SilexPagination
 */

use Kilte\Silex\Pagination\PaginationServiceProvider;
use Silex\Application;
use Silex\Provider\TwigServiceProvider;

require __DIR__ . '/../vendor/autoload.php';
error_reporting(-1);
ini_set('display_errors', 1);
$app = new Application(array('debug' => true));

$app->register(new PaginationServiceProvider, array('pagination.per_page' => 5))
    ->register(new TwigServiceProvider, array('twig.path' => __DIR__ . '/views/'));
$app
    ->get(
        '/{page}',
        function ($page) use ($app) {
            /** @var \Kilte\Pagination\Pagination $pagination */
            $pagination = $app['pagination'](100, $page);
            $pages      = $pagination->build();
            /** @var $twig \Twig_Environment */
            $twig = $app['twig'];

            return $twig->render('pagination.twig', array('pages' => $pages, 'current' => $pagination->currentPage()));
        }
    )
    ->value('page', 1)
    ->convert(
        'page',
        function ($page) {
            return (int) $page;
        }
    );

$app->run();
