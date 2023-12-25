<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fields.title' => 'required|string|max:50|min:3',
            'fields.name' => 'required|string|max:50|min:3',
            'fields.lastName' => 'required|string|max:50|min:3',
            'fields.image_profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'fields.date_birth' => 'required|date',
            'fields.gender' => 'required|string|in:male,female|max:6',
            'fields.country' => ['required','string','max:50'],
            'fields.my_profile' => ['nullable','string','max:400'],
            'fields.hobbies' => ['nullable','string','max:60'],

            'fields.address' => 'required|string|max:255',
            'fields.city' => 'nullable|string|max:50',
            'fields.email' => 'required|email',
            'fields.phone1' => 'required|string|max:15',
            'fields.phone2' => 'nullable|string|max:15',
            'fields.linkedin' => ['nullable','string','regex:/^((www|\w\w)\.)?linkedin\.com\/in\/([a-zA-Z0-9-]{5,30})\/?/','max:90'],

            'certificates.*.name' => 'nullable|string|max:100',
            'certificates.*.institute_name' => 'nullable|string|max:100',
            'certificates.*.Specialty_name' => 'nullable|string|max:100',
            'certificates.*.date_obtaining' => 'nullable|string|max:4',
            'certificates.*.description' => 'nullable|string|max:400',

            'experiences.*.name_post' => 'nullable|string|max:100',
            'experiences.*.name_company' => 'nullable|string|max:100',
            'experiences.*.start_date' => 'nullable|date',
            'experiences.*.end_date' => 'nullable|date|after:start_date',
            'experiences.*.city' => 'nullable|string|max:50',
            'experiences.*.description' => 'nullable|string|max:400',
            'experiences.*.currently_here' => 'nullable|string|in:true,false',

            'skills.*.name' => 'nullable|string|max:20',
            'skills.*.level' => 'nullable|string|in:Beginner,Moderate,Good,Very good,Fluent',

            'languages.*.name' => 'nullable|string|max:20',
            'languages.*.level' => 'nullable|string|in:Beginner,Moderate,Good,Very good,Fluent',

            //validation design
            'templet.temp' => ['nullable','string','max:15'],
            'templet.color' => ['nullable','string','max:15'],
            'templet.size_font' => ['nullable','string', "max:3"],
            'templet.font_fami' => ['nullable','string','max:25']
        ];
    }
}
