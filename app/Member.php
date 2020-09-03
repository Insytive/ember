<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends User
{
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
