<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayPalConfig extends Model
{
    use HasFactory;

    protected $table = 'config_paypal';

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
