<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_type_id', 'name', 'tax', 'price'
    ];

    public function menuType()
    {
        return $this->hasOne('App\MenuType', 'id','menu_type_id');
    }
}
