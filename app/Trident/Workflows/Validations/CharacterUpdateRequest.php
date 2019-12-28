<?php

namespace App\Trident\Workflows\Validations;

use Illuminate\Foundation\Http\FormRequest;
use Route;

class CharacterUpdateRequest extends FormRequest
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
            'id' => 'integer',
            'player_id' => 'integer',
            'name' => 'string',
            'race' => 'string',
            'class' => 'string',
            'level' => 'string',
            'unique_thing' => 'string',
            'focus' => 'string',
            'start_date' => 'string|date_format:Y-m-d',
            'death_date' => 'string|date_format:Y-m-d',
            'notes' => 'string',
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
            'player_id' => 'T::string()',
            'name' => 'T::string()',
            'race' => 'T::string()',
            'class' => 'T::string()',
            'level' => 'T::string()',
            'unique_thing' => 'T::string()',
            'focus' => 'T::string()',
            'start_date' => 'T::string()',
            'death_date' => 'T::string()',
            'notes' => 'T::string()',
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
        $data['id'] = (int)$this->route('character');
        $data['player_id'] = (int)$data['player_id'];
        return $data;
    }

}