<?php

namespace Admin\Extend\AdminConfigs\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'admin_config';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'value',
        'description'
    ];

    /**
     * Set the config's value.
     *
     * @param string|null $value
     */
    public function setValueAttribute($value = null)
    {
        $this->attributes['value'] = is_null($value) ? '' : $value;
    }
}
