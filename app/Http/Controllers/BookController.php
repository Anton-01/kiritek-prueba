<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function index($page = 0 ){
        $response = Http::get('localhost:8585/api/books/all/page/'.$page)->json();
        //dd($response);
        return view('books', compact('response'));
    }

    public function show($id){
        $book = Http::get('http://localhost:8585/api/books/'.$id)->json();
        $comments = Http::get('http://localhost:8585/api/comments/')->json();
        return view('book-show', compact('book', 'comments'));
    }

    public function create(){
        return view('create-book');
    }

    public function store( Request $request){

        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'sinopsis' => 'required',
        ]);
        $response = Http::post('http://localhost:8585/api/books/post', [
            'titulo' => $validatedData['nombre'],
            'sinopsis' => $validatedData['sinopsis'],
            'publicacion' => Carbon::now(),
            'portada' => 'sin foto'
        ]);

        return redirect()->route('books');
    }
}
