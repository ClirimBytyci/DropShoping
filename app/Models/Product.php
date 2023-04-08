<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;


class Product extends Model
{
    use HasFactory;
//    public function media()
//    {
//        return $this->belongsTo(Media::class, 'id');
//    }
    public function media()
    {
        return $this->hasMany(Media::class);
    }

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'description',
        'stock',
        'product_number',
        'active',
        'parent_id',
        'tax_status',
        'product_manufacturer_id',
        'product_media_id',
        'price',
        'custom_fields',
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
