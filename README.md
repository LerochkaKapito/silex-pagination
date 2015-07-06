# SilexPagination

A simple [pagination](https://github.com/Kilte/pagination) provider for [Silex](http://silex.sensiolabs.org)

[![Build Status](https://img.shields.io/travis/Kilte/silex-pagination.svg?style=flat-square)](https://travis-ci.org/Kilte/silex-pagination)
[![Downloads](https://img.shields.io/packagist/dt/kilte/silex-pagination.svg?style=flat-square)](https://packagist.org/packages/kilte/silex-pagination)
[![License](https://img.shields.io/packagist/l/kilte/silex-pagination.svg?style=flat-square)](http://opensource.org/licenses/MIT)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/7b926516-ab4d-446c-970c-7aa74817e7d2.svg?style=flat-square)](https://insight.sensiolabs.com/projects/7b926516-ab4d-446c-970c-7aa74817e7d2)

## Requirements

- PHP >= 5.3.3

## Usage

```php
$app->register(new \Kilte\Silex\Pagination\PaginationServiceProvider);
$pages = $app['pagination'](100, 500);
```

More information available [here](https://github.com/Kilte/pagination)

### Options

- `'pagination.per_page'` - Items per page (20 by default)
- `'pagination.neighbours'` - Number of neighboring pages at the left and the right sides (4 by default)

### How to use it in the my "views"?

See example for more information.

### Traits

`\Kilte\Silex\Pagination\PaginationTrait` adds the following shortcut:

`object pagination(int $total[, int $current[, int $perPage[, int $neighbours = 4]]])` - is alias for `$app['pagination']()`

## Tests

```
$ composer install
$ vendor/bin/phpunit
```

## Changelog

### 1.1.1 \[31.08.14\]

- Added unit tests
- Other small improvements

### 1.1.0 \[29.06.2014\]

- Updated pagination to 1.1.0

### 1.0.1 \[26.02.2014\]

- Moved pagination service to another library

### 1.0.0 \[31.12.2013\]

- First release

## Contributing

- Fork it
- Create your feature branch (git checkout -b awesome-feature)
- Make your changes
- Write/update tests, if necessary
- Update README.md, if necessary
- Push your branch to origin (git push origin awesome-feature)
- Send pull request
- ???
- PROFIT!!!

Do not forget merge upstream changes:

    git remote add upstream https://github.com/Kilte/silex-pagination
    git checkout master
    git pull upstream
    git push origin master

Now you can to remove your branch:

    git branch -d awesome-feature
    git push origin :awesome-feature

# LICENSE

The MIT License (MIT)
