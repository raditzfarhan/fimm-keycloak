# FIMM Keycloak

A simple keycloak package for FIMM to manage the access control. This package will contain the Role middleware so that each route can be configured to be accessed by certain roles only.

## Installation

You can install the package via composer:

```bash
composer require raditzfarhan/fimm-keycloak
```

## Configuration
First you will need to add the role middleware to the Kernel in route middleware section.
```php
protected $routeMiddleware = [
    ...
    'role' => \RaditzFarhan\FimmKeycloak\Middleware\KeycloakRole::class,
];
```

Then set the default Client ID in .env
```
FIMM_KEYCLOAK_CLIENT_ID=fimm-app
```

## Usage
Then you can start using the `role` middleware in your route.
```php
// The routes in this group will only be accessible by consultant role
Route::middleware(['role:consultant'])->group(function () {
    // your routes here
});

// The routes in this group will only be accessible by fimm_admin or consultant role
Route::middleware(['role:fimm_admin|consultant'])->group(function () {
    // your code here
});

// If by any reason you need to use a different client, just append the client name using @ symbol
// The routes in this group will only be accessible by distributor_admin role from another-app client
Route::middleware(['role:distributor_admin@another-app'])->group(function () {
    // your code here
});
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

If you discover any security related issues, please email raditzfarhan@gmail.com instead of using the issue tracker.

## Credits

-   Farhan - <raditzfarhan@gmail.com>

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
