<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
            'title' => 'required|max:60',
            'description' => 'required|max:2000',
            'thumb' => 'required|url|max:300',
            'price' => 'required|decimal:2',
            'series' => 'required|max:50',
            'sale_date' => 'required',
            'type' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'il titolo è obbligatorio',
            'title.max' => 'il titolo deve avere al massimo :max caratteri',
            'description.required' => 'la descrizione è obbligatoria',
            'description.max' => 'la descizione deve avere al massimo :max caratteri',
            'thumb.max' => 'la URL dell\' immagine deve avere al massimo :max caratteri',
            'thumb.required' => 'la Url è obbligatoria',
            'thumb.url' => 'il campo deve contenere un url valido',
            'price.required' => 'il prezzo è obbligatorio',
            'price.decimal' => 'il prezzo deve avere due numeri dopo la virgola',
            'series.required' => 'la serie è obbligatoria',
            'series.max' => 'la serie deve avere al massimo :max caratteri',
            'sale_date.required' => 'la data di uscita è obbligatoria',
            'type.required' => 'il genere è obbligatorio',
            'type.max' => 'il genere deve avere al massimo :max caratteri'
        ];
    }
}
