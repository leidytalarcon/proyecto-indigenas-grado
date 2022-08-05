<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class RegisterAuthRequest extends FormRequest
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
            'documento' => 'required|string|unique:users',
            'nombre' => 'required|string',
            'telefono' => 'required',
            'fk_id_tipo_documento' => 'required',
            'fk_id_rol' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:20'
        ];
    }
}