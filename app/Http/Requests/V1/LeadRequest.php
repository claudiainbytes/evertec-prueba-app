<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LeadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:leads',
                'phone' => 'required',
                'website' => 'required',
                'companyname' => 'required',

        ];
    }
}
