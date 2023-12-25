<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthorizesRequests;
use \App\Http\Requests\StorePostRequest;
use Exception;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Cv;
use App\Models\Profile;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Templet;
use App\Models\Design;
use Ramsey\Uuid\Uuid;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Blade;
use NigelCunningham\Puphpeteer\Puppeteer;
/* use Spatie\Browsershot\Browsershot; */

use DateTime;


class cv_controller extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    // cv/create
    public function create()
    {
        return view('cv.form');
    }

    // cv/home
    public function home() {
        if (Auth::check()) {
            return view('home/home', ['cvs'=>Auth::user()->user_cvs()->orderBy('created_at', 'DESC')->get()]);
        }
        return redirect('home');
    }

    // getCountries
    public function getCountries()
    {
        $response = Http::get('https://restcountries.com/v3.1/all?fields=name');
        $countries = $response->json();
        $commonNames = collect($countries)->pluck('name.common')->toArray();
        sort($commonNames);
        return $commonNames;
    }

    // get Models cv
    public function getModels($tmp)
    {
        return view('template/{$tmp}');
    }
    

    //store cv cv/store
    public function store(StorePostRequest $request)
    {
        //return response()->json(['message' => $request->input('experiences.0.currently_here')]);
        //dd();
        // create cv object
        $cv = new Cv();
        $cv->setTitle($request->fields['title']);
        $cv->save();

        //design
        $design = new Templet();
        $design->name = $request->template['temp'];
        $design->color = $request->template['color'];
        $design->size_font = $request->template['size_font'];
        $design->family_font = $request->template['font_fami'];
        
        //profile
        $profile = new Profile();
        $profile->title_pro = $request->input('fields.title');
        $profile->name = $request->input('fields.name');
        $profile->lastname = $request->input('fields.lastName');
        $profile->date_birth = $request->input('fields.date_birth');
        $profile->gender = $request->input('fields.gender');
        $profile->hobbies = $request->input('fields.hobbies');        
        $profile->country = $request->input('fields.country');
        $profile->my_profile = $request->input('fields.my_profile');
    
        // traitment image profile
        if($request->hasfile('fields.image_profile'))
        {
            $image = $request->file('fields.image_profile');
            $imagename = date("YmdHis") .'-'. Uuid::uuid4().'.jpg';
            // Make image and resize & save in public/upload/images
            $img = Image::make($image->getRealPath())->resize(350, 350)->save(base_path('/Upload/images/'. $imagename));
            $profile->image_profile = $imagename;
            $profile->setImage_profile($imagename);
        }

        $cont = new Contact();
        $cont->address = $request->input('fields.address');
        $cont->city = $request->input('fields.city');
        $cont->phone1 = $request->input('fields.phone1');
        $cont->phone2 = $request->input('fields.phone2', "");
        $cont->email = $request->input('fields.email');
        $cont->linkedin = $request->input('fields.linkedin');

        //Education
        foreach($request->certificates as $key => $value){
            $edu = new Education();
            $edu->certificate    = $request->certificates[$key]['name'];
            $edu->institute_name = $request->certificates[$key]['institute_name'];
            $edu->Specialty_name = $request->certificates[$key]['Specialty_name'];
            $edu->date_obtaining = $request->certificates[$key]['date_obtaining'];
            $edu->description    = $request->certificates[$key]['description'];
            $listEdu[]=$edu;
        }

        //Experience
        foreach($request->experiences as $key => $value){
            $exp = new Experience();			
            $exp->name_post =  $request->experiences[$key]['name_post'];
            $exp->name_company =  $request->experiences[$key]['name_company'];
            $exp->setStart_date($request->experiences[$key]['start_date']);
            $exp->setEnd_date($request->experiences[$key]['end_date']);
            $exp->city =  $request->experiences[$key]['city'];
            $exp->setCurrently_here($request->experiences[$key]['currently_here']);
            $exp->description =  $request->experiences[$key]['description'];
            $listexp[] = $exp;
        }
        
        //skill
        if ($request->has('skills')) {
            foreach($request->skills as $key => $value){
                $skill = new Skill();
                if ($request->skills[$key]['name'])
                {
                    $skill->name =  $request->skills[$key]['name'];
                    $skill->level = $request->skills[$key]['level'];
                    $listskill[]= $skill;
                }
            }
        }
        
        //language
        foreach($request->languages as $key => $value){
            $lang = new Language();
            if ($request->languages[$key]['name'])
            {
                $lang->language_name =  $request->languages[$key]['name'];
                $lang->level = $request->languages[$key]['level'];
                $listlang[]= $lang;
            }
        }
        

        $cv->profile()->save($profile);
        $cv->contact()->save($cont);
        $cv->education()->saveMany($listEdu);
        $cv->experience()->saveMany($listexp);
        $cv->skill()->saveMany($listskill);
        $cv->language()->saveMany($listlang);
        $cv->templet()->save($design);
        //dd($cv);

        return redirect()->route('home')->with('success', 'cv Saved!');
   }

   // generate pdf
   public function generatePDF($id)
    {
        $cv = CV::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$cv) {
            return redirect()->route('home')->with('error', 'CV not found.');
        }

        //$id = escapeshellarg("963347ea-f4ba-4a78-abf0-d6d39314ec34");

        $html = Blade::compileString(view('template.'.$cv->templet['name'], ['cv' => $cv])->render());

        $tempFilePath = tempnam(base_path('tmp'), 'html');
        file_put_contents($tempFilePath, $html);
        //dd(basename($tempFilePath));
        $namefile = escapeshellarg(basename($tempFilePath));

        // Execute the Node.js script with the arguments
        exec("node ../script_node/script.js $id $tempFilePath");

        // Clean up the temporary file
        unlink($tempFilePath);

        // Return the PDF file
        $file = $id.".pdf";
        
        return response()->file(base_path('Document/'.$file));      
    }


    // /cv/{id}/detail
    public function detail($id)
    {
        $cv = CV::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        //dd($cv);
        if (!$cv) {
            return redirect()->route('home')->with('error', 'CV not found.');
        }
        //dd($cv->relactions_cv());
        return view('template.t1base', ['cv' => $cv]);
    }

    // delete
    public function delete($id)
    {
        $cv = CV::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$cv) {
            return redirect()->back()->with('error', 'CV not found.');
        }

        $cv->forceDelete();
        return redirect()->route('home')->with('success', 'CV deleted successfully.');        
    }

    public function update($id)
    {
        $cv = CV::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$cv) {
            return redirect()->route('home')->with('error', 'CV not found.');
        }

        return view('cv.form', ['cv' => $cv]);
    }
}
