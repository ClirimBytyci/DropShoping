<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Media extends Model
{
    use HasFactory;
//    public function product()
//    {
//        return $this->belongsTo(Product::class, 'product_media_id');
//    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;
    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'url_main',
        'url_additional',

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
