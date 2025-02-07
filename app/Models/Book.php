<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        'title',
        'author_id',
        'published_at',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class, 'book_id');
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, Rental::class,'book_id','id','id','user_id');
    }
}
