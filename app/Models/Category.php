<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];

    //indicar la relacion 1:N con Post
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class); // this Category has many posts
    }

    //accessors y mutators
    public function nombre(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst($value),
        );
    }
    public function descripcion(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst($value),
        );
    }
}
