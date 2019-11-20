# Ability to attach users as authors to any content

## Installation

`composer require dewsign/laravel-authors`

## Usage

Attach the trait to any model which you want to be Author-able. E.g. `Article`.

```php
// App\Article.php
...
use Dewsign\LaravelAuthors\Traits\HasAuthors;
...
```

If you are not using the default `User` model for your Authors, you can specify the model you are using in the `laravel-authors.php` config.

You can now use the Many to Many `authors` relationship on your `Article` model to manage authors on this model.

## Known issues

An additional trait to define the inverse relationship on your Author (User) model, `IsAuthor` is included, however for some reason this isn't working. You can define your own inverse to specific models in the meantime.
