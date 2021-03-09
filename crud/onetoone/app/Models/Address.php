<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['street', 'number', 'postal_code', 'complement'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
