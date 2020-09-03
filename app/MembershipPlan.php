<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function memberships()
    {
        return $this->belongsToMany(Membership::class);
    }
}
