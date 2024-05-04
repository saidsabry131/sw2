<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

  


// protected function userType(): Attribute
// {
//     return Attribute::make(
//         get: fn ($value) => match($value) {
//             0 => 'admin',
//             1 => 'student',
//             2 => 'doctor',
            
//         }
//     );
// } 


protected function type(): Attribute
    {
        return new Attribute(
        get: fn ($value) => ["admin", "student", "doctor"][$value],
        );
    }


    protected function typee(): Attribute
{
    return new Attribute(
        get: fn ($value) => $value, // Return the value as is
    );
}

}
