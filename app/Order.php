<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'order_number', 'menu_item_id', 'net_price'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }

    public function menuItem()
    {
        return $this->hasOne('App\MenuItem', 'id','menu_item_id');
    }
}
