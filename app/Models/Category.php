<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;
    use HasFactory;
    /**
     * the relaions to eager load on every query
     *
     * @var array
     */
    protected $with = ['translations'];


    public $translatedAttributes=['name'];

    /**
     * the attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['parent_id','slug','is_active'];
    /**
     * the attributes that should be hidden for serialization
     *
     * @var array
     */
    protected $hidden = ['translations'];
    /**
     * the attributes that should be cast to native types
     *
     * @var array
     */
    protected $casts = ['is_active' => 'boolean'];

}
