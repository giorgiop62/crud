<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use App\Http\Requests\BeerRequest;


class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$beers = Beer::all(); per far stampare tutte le birre
        // se volessi usare l'impaginazione:
        $beers = Beer::paginate(20);
        $direction = 'desc';
        return view('beers.index', compact('beers','direction'));
    }

    public function orderby($column, $direction){

        $direction = $direction === 'desc' ? 'asc' : 'desc';

        $beers = Beer::orderby($column, $direction) -> paginate(20);

        return view('beers.index', compact('beers','direction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeerRequest $request)
    {
        $form_data = $request ->all();
        $new_beer = new Beer();
        $new_beer -> fill($form_data);
        $new_beer -> save();

        return redirect()-> route('beers.show', $new_beer);



    }

    /**
     * Display the specified resource.
     */
    public function show(Beer $beer)
    {
        return view ('beers.show', compact('beer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beer $beer)
    {
        $route = route('beers.update', $beer);
        $method = 'PUT';
        $title = $beer->name;
        return view('beers.create',compact('beer','route', 'method','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeerRequest $request, Beer $beer)
    {
        $form_data = $request->all();
        $beer->update($form_data);

        return redirect()->route('beers.show', $beer);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();

        return redirect()->route('beers.index')->with('deleted', 'Eliminazione correta!');

    }
}
