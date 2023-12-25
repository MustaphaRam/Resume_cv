<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    protected $fillable = ['city','address','phone1','phone2','email','linkedin','cv_id'];
    protected $hidden = ['created_at','updated_at'];

    public function __construct()
    {
        $this->attributes['phone2'] = "";
        $this->attributes['linkedin'] = "";
    }

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
