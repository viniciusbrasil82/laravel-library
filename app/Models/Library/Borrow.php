<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Borrow extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];
    
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }      
    
    public function book(): HasOne
    {
        return $this->hasOne(Book::class);
    }      
}
