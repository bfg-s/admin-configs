<?php

namespace Admin\Extend\AdminConfigs\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Admin\Extend\AdminConfigs\Models\ConfigModel
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigModel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfigModel whereValue($value)
 * @mixin \Eloquent
 */
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
