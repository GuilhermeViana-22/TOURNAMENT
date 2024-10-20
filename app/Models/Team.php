<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'leader_id', 'member_id'];

    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_id');
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
}
