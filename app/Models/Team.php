<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nickname_user',    
        'nickname_team',   
        'duo_name',    
        'contact_phone', 
        'discord',       
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
