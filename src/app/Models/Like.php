<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_id',
    ];

    public function store() {
        return $this->belongsTo(Store::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
