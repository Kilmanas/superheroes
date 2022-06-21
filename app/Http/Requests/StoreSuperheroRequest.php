<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuperheroRequest extends FormRequest
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
            'name' => 'required|unique:superheroes|max:255',
            'intelligence' => 'required|integer|min:1|max:110',
            'strength' => 'required|integer|min:1|max:110',
            'speed' => 'required|integer|min:1|max:110',
            'durability' => 'required|integer|min:1|max:110',
            'power' => 'required|integer|min:1|max:110',
            'combat' => 'required|integer|min:1|max:110',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'image' => 'required|image|mimes:png|dimensions:min_width=1000,min_height=1000,max_width=1000,max_height=1000',
            'aliases' => 'required|max:255',
        ];
    }
}
