<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Templet extends Model
{
    use HasFactory;
    protected $table = 'templet';
    protected $fillable = ['name','color','size_font','family_font','cv_id'];
    protected $hidden = ['created_at','updated_at'];

    public function __construct()
    {
        $this->attributes['name'] = "";
        $this->attributes['color'] = "";
        $this->attributes['size_font'] = "";
        $this->attributes['family_font'] = "";
    }

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
