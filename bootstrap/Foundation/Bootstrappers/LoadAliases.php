<?php

namespace Boot\Foundation\Bootstrappers;

class LoadAliases extends Bootstrapper
{
    public function boot()
    {
        $aliases = config('app.aliases');

        array_walk($aliases, fn($points_at, $alias) => class_alias($points_at, $alias, true));

    }
}