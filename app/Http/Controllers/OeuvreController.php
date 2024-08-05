<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Salle;
use Illuminate\Http\Request;

class OeuvreController extends Controller
{
    public function index() {

    }

    public function show(int $id) {
        return view('oeuvres.show', ['oeuvre' => Oeuvre::findOrFail($id)]);
    }

    public function create() {
        $salles = Salle::all();
        return view('oeuvres.create' , ['images'=>$salles]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'titre' => 'required',
            'auteur' => 'required',
            'style' => 'required',
            'description' => 'required',
            'images' =>'required',
            'img' => 'required',
            'thumbnail' => 'required',
            'x' => 'required',
            'y' => 'required',
            'date' => 'required'

        ]);

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $img = $request->file('img');
        } else {
            // TODO TRUCS
            return redirect()->route('oeuvres.show',1 );
        }
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $thb = $request->file('thumbnail');
        } else {
            // TODO TRUCS
            return redirect()->route('oeuvres.show',2);
        }

        $nom1 = 'oeuvre';
        $now = time();
        $nom1 = sprintf("%s_%d.%s", $nom1, $now, $img->extension());

        $img->storeAs('images/oeuvres', $nom1);

        $nom = 'thumbnail';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $thb->extension());

        $thb->storeAs('images/thumbnails',$nom);

        $oeuvre = new Oeuvre();
        $oeuvre->nom = $request->titre;
        $oeuvre->media_url = 'images/oeuvres/'.$nom1;
        $oeuvre->thumbnail_url = 'images/thumbnails/'.$nom;
        $oeuvre->description = $request->description;
        $oeuvre->style = $request->style;
        $oeuvre->coord_x = $request->x;
        $oeuvre->coord_y = $request->y;
        $oeuvre->auteur = $request->auteur;
        $oeuvre->salle_id = $request->salles;
        $oeuvre->date_creation = $request->date;

        $oeuvre->save();

        return redirect()->route('oeuvres.show',$oeuvre->id);



    }

    public function edit() {

    }

    public function destroy() {

    }
}
