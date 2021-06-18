<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class Setting extends Model
{
    use Translatable;
    /**
     * the relaions to eager load on every query
     *
     * @var array
     */
    protected $with = ['translations'];
    public $translatedAttributes=['value'];
    /**
     * the attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['key','is_translatable','plain_value'];
    /**
     * the attributes that should be cast to native types
     *
     * @var array
     */
    protected $casts = ['is_translatable' => 'boolean'];

    /**
     * set the given setting
     *
     * @param array $settings
     * @return void
     */
    public static function setMany( array $settings)
    {
        foreach ($settings as $key => $value)
        {
            self::set($key , $value);
        }
    }

    /**
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public static function set( $key, $value)
    {
        if($key === 'translatable'){
            return static::setTranslatableSettings($value);
        }
        if(is_array($value))
        {
            $value = json_encode($value);
        }
        static::updateOrCreate(['key' => $key],['plain_value' => $value]);
    }

    /**
     * Set a translatable settings.
     * @param array $settings
     *@return void
     */
    public static function setTranslatableSettings($settings = [])
    {
        foreach ($settings as $key => $value){
            static::updateOrCreate(['key' => $key],[
                'is_translatable' => true,
                'value' => $value
            ]);
        }
    }
}









