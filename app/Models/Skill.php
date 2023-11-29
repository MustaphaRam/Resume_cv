<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table = 'skills';
    protected $fillable = ['name','level','cv_id'];
    protected $hidden = ['created_at','updated_at'];


    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
