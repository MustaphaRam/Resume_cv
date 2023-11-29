<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'profile';
    protected $fillable = ['title_pro','name','lastname','date_birth','gender','image_profile','country','my_profile','hobbies'];
    protected $hidden = ['created_at','updated_at'];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
