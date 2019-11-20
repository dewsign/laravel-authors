<?php

namespace Dewsign\LaravelAuthors\Traits;

trait IsAuthor
{
    /**
     * Return the model this author is attached to
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function authorable()
    {
        return $this->morphTo();
    }
}
