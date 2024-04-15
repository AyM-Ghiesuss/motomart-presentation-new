<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GcashConfig extends Model
{
    use HasFactory;

    protected $table = 'config_gcash';

    protected $fillable = [
        'user_id', // Include user_id in the fillable array
        'client_id',
        'secret',
        'sandbox'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


