<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bookDetail(): BelongsTo
    {
        return $this->belongsTo(BookDetail::class);
    }
}
