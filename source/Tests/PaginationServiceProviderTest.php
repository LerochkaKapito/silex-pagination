<?php

/**
 * Part of the SilexPagination.
 *
 * @author  Kilte Leichnam <nwotnbm@gmail.com>
 */
namespace Kilte\Silex\Pagination\Tests;

use Kilte\Silex\Pagination\PaginationServiceProvider;
use Pimple\Container;

/**
 * Class PaginationServiceProviderTest.
 */
class PaginationServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterDefaultValues()
    {
        $app = new Container();
        $app->register(new PaginationServiceProvider());
        $this->assertEquals(20, $app['pagination.per_page']);
        $this->assertEquals(4, $app['pagination.neighbours']);
        /** @var $pagination \Kilte\Pagination\Pagination */
        $pagination = $app['pagination'](100, 5);
        $this->assertInstanceOf('\\Kilte\\Pagination\\Pagination', $pagination);
    }

    public function testRegisterCustomValues()
    {
        $app = new Container();
        $app->register(
            new PaginationServiceProvider(),
            array('pagination.per_page' => 2, 'pagination.neighbours' => 2)
        );
        $this->assertEquals(2, $app['pagination.per_page']);
        $this->assertEquals(2, $app['pagination.neighbours']);
        /** @var $pagination \Kilte\Pagination\Pagination */
        $pagination = $app['pagination'](100, 5);
        $this->assertInstanceOf('\\Kilte\\Pagination\\Pagination', $pagination);
    }
}
