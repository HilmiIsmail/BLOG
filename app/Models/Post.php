<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'contenido', 'disponible', 'imagen', 'category_id', 'user_id'];

    //relacion 1:N con Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    //relacion 1:N con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //accessors y mutators
    public function titulo(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst($value),
        );
    }
    public function contenido(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst($value),
        );
    }
}
