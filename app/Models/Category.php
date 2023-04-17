<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'visible',
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
}
