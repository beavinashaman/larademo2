<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
             'title' => 'bail | required | alpha',
            // 'title' => 'required | alpha_dash',
            // 'content' => 'required',
            // 'photo' => 'required',
            // 'check' => 'required | array',
            // 'tos' => 'Accepted',
            // 'website' => 'required | active_url',
            // 'start_date' => 'required | date',
            //'end_date' => 'required |date | after:start_date'
           // 'end_date' => 'required |date | after_or_equal:start_date'

        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'title is imp field',
            'content.required' => 'content is imp field'

        ];
    }
   
    public function attributes()
    {
        return[
            'title' => 'title head',
            'content' => 'Web Content',
            'start_date' => 'Start Date',
            'end_date' => 'End Date'

        ];
    }


}
