<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Experience extends Model
{
    use HasFactory;
    
    protected $table = 'experiences';
    protected $fillable = ['name_post','name_company','start_date','end_date','city','currently_here','description','cv_id'];
    protected $hidden = ['created_at','updated_at'];

    
    public function setStart_date($value)
    {
        $this->attributes['start_date'] = \Carbon\Carbon::parse($value)->format('Y-m');
    }

    public function getStart_date()
    {
        return $this->attributes['start_date'];
        /* // convert string to date
        $date = DateTime::createFromFormat('m-Y', $this->attributes['start_date']);
        $date= \Carbon\Carbon::parse($date)->format('m-Y');
        return $date; */
    }

    public function setEnd_date($value)
    {
        $this->attributes['end_date'] = \Carbon\Carbon::parse($value)->format('Y-m');
    }

    public function getEnd_date()
    {
        return $this->attributes['end_date'];
        /* $date = DateTime::createFromFormat('m-Y', $this->attributes['end_date']);
        $date = \Carbon\Carbon::parse($date)->format('m-Y');
        return $date; */
    }

    public function setCurrently_here($value)
    {
        $this->currently_here = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * RelationShip ORM
     */
    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
