<?php

namespace App\Trident\Workflows\Validations;

use Illuminate\Foundation\Http\FormRequest;
use Route;

class SessionUpdateRequest extends FormRequest
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
            'episode_id' => 'integer',
            'user_id' => 'integer',
            'hook' => 'string',
            'public_description' => 'string',
            'private_description' => 'string',
            'starts_at' => 'string|date_format:Y-m-d H:i',
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
            'episode_id' => 'T::string()',
            'user_id' => 'T::string()',
            'hook' => 'T::string()',
            'public_description' => 'T::string()',
            'private_description' => 'T::string()',
            'starts_at' => 'T::string()',
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
        $data['id'] = (int)$this->route('Session');
        $data['user_id'] = (int)auth()->user()->id;
        $data['episode_id'] = (int)$data['episode_id'];
        return $data;
    }

}