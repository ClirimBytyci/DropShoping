<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Orders extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'order_number',
        'tax_status',
        'shipping_costs',
        'shipping_status',
        'custom_fields',
        'user_id',
    ];

    protected $hidden = [
        'price',
        'amount_total',
        'amount_net',
    ];

    protected $casts = [
        'id' => 'string'
    ];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $uuid = Uuid::uuid4();
            $model->id = $uuid->toString();
        });
    }

}
