<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscricao extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'nickname_user',
        'contact_phone',
        'discord',
        'payment_type',
    ];

    // Relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
