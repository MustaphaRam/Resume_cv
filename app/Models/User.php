<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_cvs()
    {
        return $this->hasMany(Cv::class, 'user_id');
    }

    public function cv()
    {
        return $this->hasOne(Cv::class, 'user_id')->latest();
    }

    public function get_cv($id)
    {
        $cv = $this->hasOne(Cv::class, 'user_id')::where('id', $id)->latest();
        /* $cv = CV::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first(); */
        return $cv;
    }

}
