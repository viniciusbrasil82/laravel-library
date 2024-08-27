<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year' => 'integer',
    ];       

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }    
}
//título, ano de publicação