<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // autenticazione tramite chiamaat api -- Sanctum / Passport (troppo complesso, ma potente)
        // prima cosa recupero dati - prendi tutti i post
        // $posts = Post::all();

        // mostra tutti i post + categoria abbinata -> ottimizzazione performance 
        // laravel risolve per noi la relazione con category
        // $posts = Post::with(['category'])->get();

        // $posts = Post::paginate(2);
        $posts = Post::with(['category', 'tags'])->paginate(2);

        // return con array di risposta
        return response()->json(
            [
                'results' => $posts,
                'success' => true
            ]
        );
    }

    public function show($slug) {
        $post = Post::where('slug', '=', $slug)->with(['category', 'tags'])->first();

        if ($post) {
            return response()->json([
                'result'=> $post,
                'success'=> true
            ]);
        } else {
            return response()->json([
                'result'=> 'Nessun risultato trovato',
                'success'=> false
            ]);
        }
    }


}