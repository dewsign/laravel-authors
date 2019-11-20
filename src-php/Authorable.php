<?php

namespace Dewsign\LaravelAuthors;

class Authorable
{
    public static function user()
    {
        return config('laravel-authors.user-model');
    }
}
