<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Item extends Model
{
    use HasFactory, Notifiable;

    /**
     * Attributes yang bisa diisi nilainya
     * @var array
     */
    protected $fillable = [
        'item_id',
        'item_name',
        'description',
        'category_id',
        'sku',
        'barcode',
        'price',
        'item_image',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
