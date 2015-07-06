<?php

/**
 * Part of the SilexPagination.
 *
 * @author  Kilte Leichnam <nwotnbm@gmail.com>
 */
namespace Kilte\Silex\Pagination;

/**
 * PaginationTrait Trait.
 */
trait PaginationTrait
{
    /**
     * Returns pagination service instance.
     *
     * @param int $total      Total items
     * @param int $current    Current page
     * @param int $perPage    Items per page
     * @param int $neighbours Number of the neighboring pages at the left and the right sides
     *
     * @return \Kilte\Pagination\Pagination
     * @codeCoverageIgnore
     */
    public function pagination($total, $current, $perPage = null, $neighbours = null)
    {
        return $this['pagination']($total, $current, $perPage, $neighbours);
    }
}
