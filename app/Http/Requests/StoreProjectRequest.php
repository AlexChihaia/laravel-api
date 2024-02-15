<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:40|unique:projects,title',
            'status' => [
                'required',
                Rule::in(['ongoing', 'completed'])
            ],
            'category' => [
                'required',
                Rule::in(['backend', 'frontend'])
            ],
            'description' => 'nullable|max:999',
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => 'nullable|exists:technologies,id',
        ];
    }
    /*   public function messages(): array
    {
        return [
            'title' => [
                'required' => 'Il campo titolo non può essere vuoto!',
                'max' => 'Non puoi superare i :max caratteri!'
            ],
            'status' => [
                'required' => 'Scegli lo stato attuale del proggetto!',
            ],
            'category' => [
                'required' => 'Scegli la categoria del proggetto!'
            ],
            'thumb' => [
                'image' => 'Il file inserito non è un immagine'
            ],
            'description' => [
                'required' => 'Devi inserire una descrizione',
                'max' => 'Inserisci al massimo :max caratteri!'
            ]
        ];
    }
     */
}
