<?php

namespace Admin\Extend\AdminConfigs;

use Admin\Extend\AdminConfigs\Models\ConfigModel;

class Config
{
    /**
     * Load configure into laravel from database.
     *
     * @return void
     */
    public static function load()
    {
        foreach (ConfigModel::all(['name', 'value']) as $config) {
            config([$config['name'] => $config['value']]);
        }
    }
}
