<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth' => 'datetime',
        'rip' => 'datetime',
    ];    

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }     

}
