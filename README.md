# Generate Many to Many Migrations

When you want to make a [many to many](https://laravel.com/docs/8.x/eloquent-relationships#many-to-many) relationship in Laravel, you need to create a pivot table. This package gives you a command to generate the migration for that pivot table automatically.
## Installation

You can install the package via composer:

```bash
composer require iamkevinmckee/many-to-many
```

## Usage

When you need to create a pivot table for a many to many relationship, just run the following command:
``` php
php artisan many-to-many FirstModel SecondModel
```

For example:

``` php
php artisan many-to-many tag post
```

This will generate a migration with the following `up` method:

```php
public function up()
{
    Schema::create('post_tag', function (Blueprint $table) {
        $table->unsignedBigInteger('post_id');
        $table->unsignedBigInteger('tag_id');
        $table->foreign('post_id')->references('id')->on('users')
            ->onDelete('cascade');
        $table->foreign('tag_id')->references('id')->on('roles')
            ->onDelete('cascade');
    });
}
```
Then you only need to run the migrate command and add the relationship to the models.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mckee.kevin@gmail.com instead of using the issue tracker.

## Credits

- [Kevin McKee](https://github.com/iamkevinmckee)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
