<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_id', 'price', 'description', 'photo', 'status',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}