<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;

class Cv extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cvs';
    protected $fillable = ['id','title'];
    protected $hidden = ['updated_at','user_id'];
    protected $dates = ['deleted_At'];

    public function __construct() 
    {
        $this->attributes['id'] = Uuid::uuid4();
        $this->attributes['user_id'] = Auth::user()->id;
    }

    public function getUser(){
        return $this->attributes['user_id'];
    }

    public function setTitle($value){
        $this->attributes['title'] = $value;
    }

    public function getTitle(){
        return $this->attributes['title'];
    }

    /**
     * RelationShips ORM
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function relactions_cv(){
        return $this->belongsToMany(Profile::class, Contact::class, Education::class, Experience::class, Language::class, Skill::class, Templet::class, "cv_id");
    }

    public function cv()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function rel_cv()
    {
        return $this->hasMany(Education::class, "cv_id");
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function language()
    {
        return $this->hasMany(Language::class);
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }

    public function templet()
    {
        return $this->hasOne(Templet::class, "cv_id");
    }
}
