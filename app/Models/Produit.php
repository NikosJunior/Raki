<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'prix',
        'quantity',
        'category_id',
        'description',
        'img',
    ];
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
