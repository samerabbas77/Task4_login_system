<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class updateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public $request;

    // public function __construct(Request $request)
    // {
    //     $this->request = $request;
    
    // }



    public function authorize(): bool
    {
       return Auth::check();//return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
      
            if($this->password == null)
            {
                $this->request->remove('password');
                
            }   
            
        return [
           'name' => [ 'string', 'max:255'],
           'email' => ['sometimes','string','email','max:255', Rule::unique('users')->ignore($this->route('admin'))],
           'password' => 'confirmed|min:6'  
            
        ];

    }
}
