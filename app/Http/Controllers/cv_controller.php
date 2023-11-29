<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthorizesRequests;
use App\Models\Cv;
use App\Models\User;

class cv_controller extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    // index
    public function create(){
        return view('cv/form');
    }
    // form create cv
    public function store(Request $request)
    {
        // Handle the form data
        
        // Perform any additional processing or validation

        // Return a response, e.g., success message
        
        return response()->json(['message' => $request->all()]);
    }

    public function index() {
        if (Auth::check()) {
            return view('home/home', ['cvs'=>Auth::user()->user_cvs()->orderBy('created_at', 'DESC')->get()]);
        }
        return redirect('home');
    }
    

    //store cv
    public function store_Cv(cv_request $request)
    {
        //cv
        $cv = new Cv();
        $cv->title = $request->title;
        $cv->presentation = "";
        $cv->user_id = Auth::user()->id;
        $cv->save();

        //design
        $design = new Design();
        $design->templet = $request->templet;
        $design->color = $request->color;
        $design->size_font = $request->size_font;
        $design->family_font = $request->font_fami;

        //profile
        $profile = new Profile();
        $profile->name = $request->name;
        $profile->lastname = $request->lastname;
        $profile->date_birth = $request->date_birth;
        $profile->gender = $request->gender;
        $profile->situation_family = $request->situation_family;
        $profile->hobbies = $request->hobbies;        
        $profile->country = $request->country;
        $profile->my_profile = $request->my_profile;

        if($request->hasfile('image_profile'))
        {
            $image = $request->file('image_profile');
            $imagename = date("YmdHis"). $image->hashName();
            $img = Image::make($image->getRealPath())->resize(350, 350)->save(public_path('/images/'. $imagename));
            $profile->image_profile = $imagename;
        }

        $cont = new Contact();
        $cont->address = $request->address;
        $cont->phone1 = $request->phone1;
        $cont->phone2 = $request->phone2;
        $cont->email = $request->email;
        $cont->linkedin = $request->linkedin;
        $cont->city = $request->city;

        //Education
        foreach($request->input('certificate','institute_name','Specialty_name','date_obtaining','description') as $key => $value){
            $edu = new Education();
            $edu->certificate=  $request->input('certificate')[$key];
            $edu->institute_name = $request->input('institute_name')[$key];
            $edu->Specialty_name = $request->input('Specialty_name')[$key];
            $edu->date_obtaining = $request->input('date_obtaining')[$key];
            $edu->description = $request->input('description')[$key];
            $listEdu[]=$edu;
        }

        //Experience
        foreach($request->input('namJob','institution','startdate','enddate','city_exp','otherinfo') as $key => $value){
            $exp = new Experience();			
            $exp->name_post =  $request->input('namJob')[$key];
            $exp->name_company =  $request->input('institution')[$key];
            $exp->start_date =  \Carbon\Carbon::createFromFormat('Y-m', $request->input('startdate')[$key])->toDateTimeString();
            $exp->end_date = \Carbon\Carbon::createFromFormat('Y-m', $request->input('enddate')[$key])->toDateTimeString();
            $exp->city =  $request->input('city_exp')[$key];
            $exp->description =  $request->input('otherinfo')[$key];
            $listexp[] = $exp;
        }
        
        //skill
        foreach($request->input('skill','level_skills') as $key => $value){
            $skill = new Skills();
            $skill->name =  $request->input('skill')[$key];
            $skill->level = $request->input('level_skills')[$key];
            //$skill->cv_id = $cv->id;
            $listskill[]= $skill;
        }
        
        //language
        foreach($request->input('language','level_lang') as $key => $value){
            $lang = new Language();
            $lang->language_name =  $request->input('language')[$key];
            $lang->level = $request->input('level_lang')[$key];
            $listlang[]= $lang;
        }

        $cv->profile()->save($profile);
        $cv->contact()->save($cont);
        $cv->education()->saveMany($listEdu);
        $cv->experience()->saveMany($listexp);
        $cv->skill()->saveMany($listskill);
        $cv->language()->saveMany($listlang); 
        $cv->design()->save($design);
        //dd($cv);

        //return $this->showMessage($cv->title,"cv Saved!");
        return $this->test($cv->id);
   }
}
