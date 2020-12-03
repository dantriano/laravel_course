<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    //protected $redirectRoute = 'post.create' //ruta definida en alguno de los archivos de la carpeta routes
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth)
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
            'name'=>'required|max:10',
            'email'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Por favor introduce un nombre',
            'name.max'=>'Ese nombre es demasiado largo',
            'username.required' => 'El :attribute es obligatorio!!!',
            'username.min' => 'El :attribute debe ser mínimo 5'
        ];
    }
    public function attributes()
    {
        return [
            'username' => 'nombre de usuario',
        ];
    }
    /**
     *  AJAX Response 
     *
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }*/
}
