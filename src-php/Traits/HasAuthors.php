<?php

namespace Dewsign\LaravelAuthors\Traits;

use Dewsign\LaravelAuthors\Authorable;

trait HasAuthors
{
    public function initializeHasAuthors()
    {
        $this->with = array_merge($this->with, [
            'authors',
        ]);
    }

    public function authors()
    {
        return $this->morphToMany(Authorable::user(), 'authorable');
    }
}
