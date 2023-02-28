<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
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

    public function recipe()
    {
        return $this->hasOne(User::class);
    }

    public function category()
    {
        return $this->hasOne(Categories::class);
    }
}
