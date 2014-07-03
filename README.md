# SilexPagination

A simple [pagination](https://github.com/Kilte/pagination) provider for [Silex](http://silex.sensiolabs.org)

[![Build Status](https://travis-ci.org/Kilte/silex-pagination.svg?branch=master)](https://travis-ci.org/Kilte/silex-pagination)

## Requirements

- PHP >= 5.3.3

## Usage

```php
$app->register(new \Kilte\Silex\Pagination\PaginationServiceProvider);
$pages = $app['pagination'](100, 500);
```

More information available [here](https://github.com/Kilte/pagination)

## Options

- `'pagination.per_page'` - Items per page (20 by default)
- `'pagination.neighbours'` - Number of neighboring pages at the left and the right sides (4 by default)

## How to use it in the my "views"?

See example for more information.

## Traits

`\Kilte\Silex\Pagination\PaginationTrait` adds the following shortcut:

`object pagination(int $total[, int $current[, int $perPage[, int $neighbours = 4]]])` - is alias for `$app['pagination']()`

## LICENSE

The MIT License (MIT)
