<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;


class StoreUpdateUserForm extends FormRequest
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
        $id = $this->id ?? '';

        $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3'
            ],
            'user' => [                
                "unique:users,user,{$id},id",
                'required',
                'max:255',
                'min:3'
            ],
            'password' => [
                'required',
                'min:6',
                'max:25',
            ],
            'occupation' => [
                'required',
                'string',
                'max:255',
            ],
            
        ];
        
      
        
        if($this->method('PUT')){
            $rules['password'] = [
                'nullable',
                'min:6',
                'max:25',
            ];
            $rules['user'] =
             Rule::unique('users')->where(fn ($query) => $query->where('id', $id));
         
        }

        return $rules;
    }
}
