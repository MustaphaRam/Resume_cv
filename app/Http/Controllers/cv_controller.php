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

    // cv/home
    public function home() {
        if (Auth::check()) {
            return view('home/home', ['cvs'=>Auth::user()->user_cvs()->orderBy('created_at', 'DESC')->get()]);
        }
        return redirect('home');
    }

    // cv/create
    public function create()
    {
        $cv = new Cv();
        $cv->save();
        
        return redirect()->route('cv.form', ['id' => $cv->getId()]);
    }

    // cv/create/id
    public function form($id)
    {
        $cv = CV::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$cv) {
            return redirect()->route('home')->with('error', 'CV not found.');
        }

        $cv->relactions_cv();
        return view('cv.form',['cv' => $cv])->render();
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
        //dd($request);
        // create cv object
        /* $cv = new Cv();
        $cv->setTitle($request->fields['title']);
        $cv->save(); */
        $id = $request->input('fields.id');

        $cv = CV::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$cv) {
            return redirect()->route('home')->with('error', 'CV not found.');
        }
        
        $cv->setTitle($request->fields['title']);
        $cv->save();

        if($cv->templet === null){
            $tmp = new Templet();
            $cv->templet()->save($tmp);
        }
        
        //design
        //$templet = new Templet();
        $cv->templet->name = $request->template['temp'];
        $cv->templet->color = $request->template['color'];
        $cv->templet->size_font = $request->template['size_font'];
        $cv->templet->family_font = $request->template['font_fami'];
        $cv->templet->save();
        //dd($cv->templet);
        
        if($cv->profile === null){
            $tmp = new Profile();
            $cv->profile()->save($tmp);
        }

        //profile
        //$profile = new Profile();
        $cv->profile->title_pro = $request->input('fields.title');
        $cv->profile->name = $request->input('fields.name');
        $cv->profile->lastname = $request->input('fields.lastName');
        $cv->profile->date_birth = $request->input('fields.date_birth');
        $cv->profile->gender = $request->input('fields.gender');
        $cv->profile->hobbies = $request->input('fields.hobbies');        
        $cv->profile->country = $request->input('fields.country');
        $cv->profile->my_profile = $request->input('fields.my_profile');
        
        // traitment image profile
        if($request->hasfile('fields.image_profile'))
        {   
            // remove old image
            if($cv->profile->image_profile)
            {
                $this->deleteImage($cv->profile->image_profile);
            }

            $image = $request->file('fields.image_profile');
            $imagename = date("YmdHis") .'-'. Uuid::uuid4().'.jpg';
            // Make image and resize & save in public/upload/images
            $img = Image::make($image->getRealPath())->resize(350, 350)->save(public_path('/Upload/images/'. $imagename));
            $cv->profile->image_profile = $imagename;
            //$profile->setImage_profile($imagename);
        }
        $cv->profile->save();


        if($cv->contact === null){
            $tmp = new Contact();
            $cv->contact()->save($tmp);
        }
        //$cont = new Contact();
        $cv->contact->address = $request->input('fields.address');
        $cv->contact->city = $request->input('fields.city');
        $cv->contact->phone1 = $request->input('fields.phone1');
        $cv->contact->phone2 = $request->input('fields.phone2', "");
        $cv->contact->email = $request->input('fields.email');
        $cv->contact->linkedin = $request->input('fields.linkedin');

        //save contact
        $cv->contact->save();

        //Education
        foreach($request->certificates as $key => $value)
        {
            if (isset($cv->education[$key]))
            {
                $cv->education[$key]->certificate    = $request->certificates[$key]['name'];
                $cv->education[$key]->institute_name = $request->certificates[$key]['institute_name'];
                $cv->education[$key]->Specialty_name = $request->certificates[$key]['Specialty_name'];
                $cv->education[$key]->date_obtaining = $request->certificates[$key]['date_obtaining'];
                $cv->education[$key]->description    = $request->certificates[$key]['description'];
                $cv->education[$key]->save();
            } else
            {
                $edu = new Education([
                    'certificate' => $request->certificates[$key]['name'],
                    'institute_name' => $request->certificates[$key]['institute_name'],
                    'Specialty_name' => $request->certificates[$key]['Specialty_name'],
                    'date_obtaining' => $request->certificates[$key]['date_obtaining'],
                    'description' => $request->certificates[$key]['description'],
                ]);
                $cv->education()->save($edu);
            }
        }
        foreach (array_slice($cv->education->toArray(), count($request->certificates)) as $excessEducation) {
            Education::destroy($excessEducation['id']);
        }        

        //Experience
        foreach($request->experiences as $key => $value){
            if (isset($cv->experience[$key]))
            {
                $tmp = $cv->experience[$key];
                $tmp->name_post =  $request->experiences[$key]['name_post'];
                $tmp->name_company =  $request->experiences[$key]['name_company'];
                $tmp->setStart_date($request->experiences[$key]['start_date']);
                if(!$tmp->setCurrently_here($request->experiences[$key]['currently_here']) ) 
                {
                    $tmp->setEnd_date($request->experiences[$key]['end_date']);
                }
                $tmp->setCurrently_here($request->experiences[$key]['currently_here']);
                $tmp->city =  $request->experiences[$key]['city'];
                $tmp->description =  $request->experiences[$key]['description'];
                $tmp->save();

            } else {
                $tmp = new Experience();			
                $tmp->name_post =  $request->experiences[$key]['name_post'];
                $tmp->name_company =  $request->experiences[$key]['name_company'];
                $tmp->setStart_date($request->experiences[$key]['start_date']);
                if(!$tmp->setCurrently_here($request->experiences[$key]['currently_here'])) {
                    $tmp->setEnd_date($request->experiences[$key]['end_date']);
                }
                $tmp->city = $request->experiences[$key]['city'];
                $tmp->setCurrently_here($request->experiences[$key]['currently_here']);
                $tmp->description =  $request->experiences[$key]['description'];
                $cv->experience()->save($tmp);
            }
        }
        foreach (array_slice($cv->experience->toArray(), count($request->experiences)) as $excessExperience) {
            Experience::destroy($excessExperience['id']);
        }

        
            
        // skill
        if ($request->has('skills')) 
        {
            foreach($request->skills as $key => $value)
            {
                if (isset($cv->skill[$key]))
                {
                    $cv->skill[$key]->name = $request->skills[$key]['name'];
                    $cv->skill[$key]->level = $request->skills[$key]['level'];
                    $cv->skill[$key]->save();
                } else {
                    if ($request->skills[$key]['name'])
                    {
                        $skill = new Skill();
                        $skill->name =  $request->skills[$key]['name'];
                        $skill->level = $request->skills[$key]['level'];
                        $cv->skill()->save($skill);
                    }
                }
            }
            foreach (array_slice($cv->skill->toArray(), count($request->skills)) as $excessSkill) {
                Skill::destroy($excessSkill['id']);
            }
        }
        
        // language
        if ($request->has('languages')) 
        {
            foreach($request->languages as $key => $value)
            {
                if (isset($cv->language[$key]))
                {
                    $cv->language[$key]->language_name =  $request->languages[$key]['name'];
                    $cv->language[$key]->level = $request->languages[$key]['level'];
                    $cv->language[$key]->save();
                } else {
                    if ($request->languages[$key]['name'])
                    {
                        $lang = new Language();
                        $lang->language_name =  $request->languages[$key]['name'];
                        $lang->level = $request->languages[$key]['level'];
                        $cv->language()->save($lang);
                    }
                }
            }
            foreach (array_slice($cv->language->toArray(), count($request->languages)) as $excessLanguage) {
                Language::destroy($excessLanguage['id']);
            }
        }

        
        //dd($cv);
        //$cv->save();

        //return redirect()->route('home')->with('success', );

        return response(['success' => 'CV has been successfully submitted!'], 200)->header('Content-Type', 'text/plain');
    }

    public function deleteImage($imageName)
    {
        $imagePath = base_path('/Upload/images/') . $imageName;

        // Check if the file exists
        if (file_exists($imagePath)) {
            // Delete the file
            unlink($imagePath);
            
        }
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

        $html = Blade::compileString(view('template.'.$cv->templet['name']."base", ['cv' => $cv])->render());

        $tempFilePath = tempnam(base_path('tmp'), 'html');
        file_put_contents($tempFilePath, $html);
        //dd(basename($tempFilePath));
        $namefile = escapeshellarg(basename($tempFilePath));

        // Execute the Node.js script with the arguments
        shell_exec("node ../script_node/script.js $id $tempFilePath");

        // Clean up the temporary file
        unlink($tempFilePath);

        // Return the PDF file
        $namefile = $id.".pdf";
        return response()->file(base_path('Document/'.$namefile));

        // Return the PDF content as a response
        /* return response($pdfContent)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="'.$namefile.'.pdf"'); */
        /* 
        <script>
        downloadPDF() {
            const id = "963347ea-f4ba-4a78-abf0-d6d39314ec34";
            axios.get(`/generatePDF?id=${id}`)
                .then(response => {
                    const blob = new Blob([response.data], { type: 'application/pdf' });
                    const link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'your-pdf.pdf';
                    link.click();
                })
                .catch(error => {
                    console.error('Error downloading PDF:', error);
                });
        } 
        </script>
        */
    }


    // /cv/{id}/detail
    public function detail($id)
    {
        $cv = CV::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$cv) {
            return redirect()->route('home')->with('error', 'CV not found.');
        }

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

        $cv_data = $cv->relactions_cv();
        return view('cv.form', ['cv' => $cv_data])->render();
    }
}
