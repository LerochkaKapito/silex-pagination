<?php

/**
 * Part of the SilexPagination
 *
 * @author Kilte <nwotnbm@gmail.com>
 * @package SilexPagination
 */

use Kilte\Silex\Pagination\PaginationServiceProvider;
use Kilte\View\ViewServiceProvider;
use Silex\Application;
use Silex\Provider\TwigServiceProvider;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application(array('debug' => true));

$app->register(new PaginationServiceProvider, array('pagination.per_page' => 5))
    ->register(new ViewServiceProvider, array('view.path' => __DIR__ . '/views/'))
    ->register(new TwigServiceProvider, array('twig.path' =>__DIR__ . '/views/'))
;
$app->get(
    '/',
    function () use ($app) {
        /** @var \Kilte\Silex\Pagination\PaginationService $pagination */
        $pagination = $app['pagination'](100, 10);
        $pages = $pagination->build();
        $rawPHPView = $app['view']('pagination', array('pages' => $pages));
        /** @var $twig \Twig_Environment */
        $twig = $app['twig'];
        $twigView = $twig->render('pagination.twig', array('pages' => $pages, 'current' => $pagination->currentPage()));
        return $rawPHPView . $twigView;
    }
);

$app->run();