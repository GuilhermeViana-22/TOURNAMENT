<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nickname1',
        'nickname2',
        'team_name',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
