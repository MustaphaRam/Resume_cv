<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Intervention\Image\Facades\Image;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';
    protected $fillable = ['title_pro','name','lastname','date_birth','gender','image_profile','country','my_profile','hobbies'];
    protected $hidden = ['created_at','updated_at'];

    public function __construct()
    {
        $this->attributes['image_profile'] = null;
        $this->attributes['my_profile'] = "";
        $this->attributes['hobbies'] = "";
        $this->attributes['title_pro'] = "";
    }
    public function setImage_profile($value)
    {
        $this->attributes['image_profile'] = $value;

    }

    public function getImage_profile()
    {
        return $this->attributes['image_profile'];
    }

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
