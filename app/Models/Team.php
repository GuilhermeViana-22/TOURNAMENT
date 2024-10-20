<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'user_id', 'member_id'];

    public function leader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public static function userHasTeam($userId)
    {
        return self::where('user_id', $userId)->exists();
    }
}
