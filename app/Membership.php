<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function membership_plans()
    {
        return $this->belongsToMany(Membership::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
