<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function store( Request $request){

        $validatedData = $request->validate([
            'comentario' => 'required|max:255',
            'id' => 'required',
        ]);
        $response = Http::post('http://localhost:8585/api/books/post', [
            'comentario' => $validatedData['comentario'],
            'book_id' => $validatedData['id'],
        ]);

        if($response){
            redirect()->back()-with('validation', '');
        }else{
            dd('fuera del if');
        }

        return redirect()->back();
    }
}
