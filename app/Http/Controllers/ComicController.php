<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|max:60',
                'description' => 'required|max:2000',
                'thumb' => 'required|url|max:300',
                'price' => 'required|decimal:2',
                'series' => 'required|max:50',
                'sale_date' => 'required',
                'type' => 'required|max:50',

            ],
            [
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
            ]
        );

        $form_info = $request->all();

        $newComic = new Comic();

        $newComic->fill($form_info);
        /*
        $newComic->title = $form_info["title"];
        $newComic->description = $form_info["description"];
        $newComic->thumb = $form_info["thumb"];
        $newComic->price = $form_info["price"];
        $newComic->series = $form_info["series"];
        $newComic->sale_date = $form_info["sale_date"];
        $newComic->type = $form_info["type"];
        */
        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id])->with('status', 'Fumetto aggiunto correttamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {

        $request->validate(
            [
                'title' => 'required|max:60',
                'description' => 'required|max:2000',
                'thumb' => 'required|url|max:300',
                'price' => 'required|decimal:2',
                'series' => 'required|max:50',
                'sale_date' => 'required',
                'type' => 'required|max:50',

            ],
            [
                'title.required' => 'il titolo è obbligatorio',
                'title.max' => 'il titolo deve avere al massimo :max caratteri',
                'description.required' => 'la descrizione è obbligatoria',
                'description.max' => 'la descizione deve avere al massimo :max caratteri',
                'thumb.max' => 'la URL dell\' immagine deve avere al massimo :max caratteri',
                'thumb.required' => 'la Url è obbligatoria',
                'thumb.url' => 'il campo deve contenere un url valido',
                'price.required' => 'il prezzo è obbligatorio',
                'price.decimal' => 'il prezzo deve avere due numeri dopo il punto',
                'series.required' => 'la serie è obbligatoria',
                'series.max' => 'la serie deve avere al massimo :max caratteri',
                'sale_date.required' => 'la data di uscita è obbligatoria',
                'type.required' => 'il genere è obbligatorio',
                'type.max' => 'il genere deve avere al massimo :max caratteri'
            ]
        );
        $form_info = $request->all();
        $comic->update($form_info);
        return redirect()->route('comics.show', ['comic' => $comic->id])->with('status', 'Modifiche effettutate con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
