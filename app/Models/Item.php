<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin Eloquent
 */
class Item extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'item_id';

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
        'item_image'
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
