<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome' => ['required', 'min:3'],
            'seasonQty' => ['required', 'numeric'],
            'episodesForSeason' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome precisa de pelo menos :min caracteres',
            'seasonQty.numeric' => 'O campo temporada precisa ser numérico',
            'seasonQty.required' => 'O campo temporada é obrigatório',
            'episodesForSeason.numeric' => 'O campo episodes precisa ser numérico',
            'episodesForSeason.required' => 'O campo episodes é obrigatório',
        ];
        
    }
        
    
}
