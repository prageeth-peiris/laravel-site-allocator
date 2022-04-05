# Laravel Site Allocator



A Simple Laravel Package to Allow / Disallow  a site to a user. This is useful for projects that uses Site as a main model.
## Installation

You can install the package via composer:

```bash
composer require prageeth-peiris/site-allocator
```
Publish Configuration File
```bash
php artisan vendor:publish --provider="PrageethPeiris\SiteAllocator\SiteAllocatorServiceProvider" --tag="config"
```



## Usage

```php
use "is-site-allocated" middleware in your routes. Should pass the site_id as  a query parameter with request
```


## Documentation

```
API Routes

 - GET /api/sites
 - GET /api/sites/id
 - POST /api/sites {name - string parameter , url string parameter}
 - PUT /api/sites {name - string parameter , url string parameter}
 - DELETE /api/sites/id
 - GET /api/user/id/sites
 - POST /api/user/id/sites  {sites - array parameter}




```





### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email glpspeiris@gmail.com instead of using the issue tracker.

## Credits

-   [Prageeth Peiris](https://github.com/prageeth-peiris)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


