<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const VETERAN_VOTER = '1';
    const ROOKIE_VOTER = '0';

    const ACCEPT_TERMS = '1';
    const DECLINE_TERMS = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
        'id_number',
        'birth_date',
        'gender_id',
        'phone',
        'address',
        'town',
        'city',
        'post_code',
        'province_id',
        'station_id',
        'reported_station',
        'terms_conditions',
        'parent_id',
        'first_time_voter',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'id_number',
        'address',
        'verification_token',
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['first_name'] = $name;
    }

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function setSurnameAttribute($surname)
    {
        $this->attributes['last_name'] = $surname;
    }

    public function getSurnameAttribute($surname)
    {
        return ucwords($surname);
    }

    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = $email;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the voting station record associated with the user.
     */
//    public function station()
//    {
//        return $this->hasOne('App\Station');
//    }

    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }

    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    public function isVoter()
    {
        return $this->verified == User::VETERAN_VOTER;
    }

    public function acceptedTerms()
    {
        return $this->verified == User::ACCEPT_TERMS;
    }

    public static function generateVerificationCode()
    {
        return Str::random(40);
    }
}
