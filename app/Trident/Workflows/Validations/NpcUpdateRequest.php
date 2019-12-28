<?php

namespace App\Trident\Workflows\Validations;

use Illuminate\Foundation\Http\FormRequest;
use Route;

class NpcUpdateRequest extends FormRequest
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
            'id' => 'integer|required',
            'name' => 'string|required',
            'description' => 'string',
            'public_notes' => 'string',
            'private_notes' => 'string',
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id' => 'T::string()',
            'name' => 'T::string()',
            'description' => 'T::string()',
            'public_notes' => 'T::string()',
            'private_notes' => 'T::string()',
        ];
    }

    /**
     * Add parameters to be validated (for GET parameters)
     * 
     * @return array
     */
    public function all($keys = null) 
    {
        $data = parent::all($keys);
        $data['id'] = (int)$this->route('npc');
        return $data;
    }

}