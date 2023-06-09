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
        'category_id',
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
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $uuid = Uuid::uuid4();
            $model->id = $uuid->toString();
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function media()
    {
        return $this->hasOne(Media::class, 'product_id', 'id');
    }
}
