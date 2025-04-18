<?php

namespace App\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class EditUserRequest extends FormRequest
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
      'user_level_id'              => ['required', 'exists:user_levels,id'],
      'name'                       => ['required', 'string', 'max:255'],
      'email'                      => ['required', 'email', 'unique:users,email,' . $this->route('userId')]
    ];
  }

  public function messages()
  {
    return [
      'role.required_with'          => 'Cargo é obrigatório.',
      'admission_date.required_with' => 'Data de admissão é obrigatória.',
      'email'                       => 'Formato do e-mail inválido',
      'email.unique'                => 'E-mail já cadastrado',
      'password'                    => 'A senha precisa seguir estes requisitos:
                                          Mínimo de 8 caracteres, 
                                          Letras maíusculas e minúsculas, 
                                          Números,
                                          Caracteres especiais
                                        ',
      'level_id.integer'            => 'O nível de usuário precisa ser um número',
      'hash'                        => 'A hash deve ter no mínimo 4 e no máximo 255 caracteres',
      'password_confirmation.same'  => 'As senhas precisam ser iguais',
      //
      'name'                        => 'O nome é obrigatório e deve ter no máximo 255 caracteres.'
    ];
  }

  protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
  {
    $response = new Response([
      'error'      => 'Invalid params',
      'code'       => 422,
      'validation' => $validator->errors()
    ], 422);

    throw new ValidationException($validator, $response);
  }
}
