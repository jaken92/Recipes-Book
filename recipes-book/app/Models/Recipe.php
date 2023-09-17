<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'instructions',
    ];

    public function recipeIngredients()
    {
        return $this->hasMany(Ingredients::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function category()
    {
        return $this->hasOne(Categories::class);
    }
}
