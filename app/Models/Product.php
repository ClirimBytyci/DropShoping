<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_number',
        'description',
        'stock',
        'active',
        'parent_id',
        'tax_status',
        'product_manufacturer_id',
        'product_media_id',
        'price',
        'custom_fields'
    ];

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($model) {
//            $model->id = Str::uuid()->toString();
//        });
//    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $uuid = Uuid::uuid4();
            $model->id = $uuid->toString();
        });
    }
    public function media()
    {
        return $this->hasOne(Media::class);
    }
}
