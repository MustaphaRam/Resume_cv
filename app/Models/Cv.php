<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

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
    protected $fillable = ['title','user_id'];
    protected $hidden = ['updated_at'];
    protected $dates = ['deleted_At'];

    /**
     * RelationShips on database
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
