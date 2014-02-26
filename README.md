# SilexPagination

A simple pagination provider for [Silex](http://silex.sensiolabs.org)

# Requirements

- PHP >= 5.3.3

# Usage

## Registration

    $app->register(new \Kilte\Silex\Pagination\PaginationServiceProvider);

## Usage

    /** @var \Kilte\Pagination\Pagination $pagination */
    $pagination = $app['pagination'](100, 10, 5);
    /*
    Arguments:
    int $totalItems  Total items (100 in the example)
    int $currentPage Number of the current page (10 in the example)
    int $perPage     Items per page (5 in the example)
    int $neighbours  Number of neighboring pages at the left and the right sides (4 by default)
    */
    $offset = $pagination->offset(); // Get offset
    $limit = $pagination->limit();   // Get limit
    $listing = $someService->listing($offset, $limit);

    $pages = $pagination->build(); // Contains the associative array with numbers of the pages
    // For example:
    /*
        [1 => 1,
        5 => "...",
        6 => 6, // This interval
        7 => 7, // defined
        8 => 8, // by
        9 => 9, // $neighbours argument
        10 => false, // Current page
        11 => 11,
        12 => 12,
        13 => 13,
        14 => 14,
        15 => "...",
        20 => 20
        ]
    */

### Options

- `'pagination.per_page'` - Items per page (20 by default)
- `'pagination.neighbours'` - Number of neighboring pages at the left and the right sides (4 by default)

## How to use it in the my "views"?

See example for more information.

## Traits

`\Kilte\Silex\Pagination\PaginationTrait` adds the following shortcut:

`object pagination(int $total[, int $current[, int $perPage[, int $neighbours = 4]]])` - is alias for `$app['pagination']()`

# LICENSE

The MIT License (MIT)