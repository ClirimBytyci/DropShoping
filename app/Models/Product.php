<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;


class Product extends Model
{
    use HasFactory;

    public function mediaUrls()
    {
        return $this->belongsTo(Media::class, 'product_media_id')->select(['id', 'url_main', 'url_additional']);
    }

    protected $primaryKey = 'id';

    protected $fillable = [
//        'id',
        'name',
        'description',
        'stock',
        'product_number',
        'active',
//        'parent_id',
        'tax_status',
//        'product_manufacturer_id',
//        'product_media_id',
        'price',
        'custom_fields',
    ];

    protected $casts = [
        'id' => 'string'
    ];
    protected $guarded = [
        'id',
        'parent_id',
        'product_manufacturer_id',
        'product_media_id'
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
