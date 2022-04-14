<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Doctrine\Inflector\Rules\Word;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mostra elenco di tutti i post
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // voglio ottenere tutte le categorie e poter tornare tutte le categorie del db
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // funzione validazione dati
        $request->validate(
            [
                'title'=>'required|min:5',
                'content'=>'required|min:10',
                'category_id' => 'nullable|exists:categories,id',
                'tags' => 'nullable|exists:tags,id',

                'image' => 'nullable|image|max:2048'
            ]
        );

            // TITOLO: Lavoro futuro
            // SLUG: lavoro-futuro

            // tutti i dati richiesti dentro data
            $data = $request->all();

            // importo per fare upload file 
            // ho il percorso completo dato da post cover e il nome dell'image salvata
            // Storage::put -> non tiene traccia del nome originale ma un hash 
            // - sequenza alfanumerica di caratteri e lettere che identificano il file in maniera univoca
            if(isset($data['image'])) {
                $cover_path = Storage::put('post_covers', $data['image']);
                $data['cover'] = $cover_path;
            }
            



            $slug = Str::slug($data['title']);

            
            $counter = 1;

            // cerca title post se già esiste un post con questo slug generane uno diverso
            while(Post::where('slug', $slug)->first()) {
                // lavoro-futuro-1
                $slug = Str::slug($data['title']) . '-' . $counter;
                $counter++;
            };

            $data['slug'] = $slug;

            $post = new Post();
            $post->fill($data);
            $post->save();

            // voglio che siano create le varie voci
            $post->tags()->sync($data['tags']);

            return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // implementazione di CARBON
        // scopri e visualizza data e ora della pubblicazione del post
        $now = Carbon::now();

        $postDateTime = Carbon::create($post->created_at);

        $diffInDays = $now->diffInDays($postDateTime);

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // funzione validazione dati aggiornati
        $request->validate(
            [
                'title'=>'required|min:5',
                'content'=>'required|min:10',
                'category_id' => 'nullable|exists:categories,id',
                'image' => 'nullable|image|max:2048'
            ]
            );

            $data = $request->all();

            if(isset($data['image'])) {

                if($post->cover) {
                    Storage::delete($post->cover);
                }
                
                $cover_path = Storage::put('post_covers', $data['image']);
                $data['cover'] = $cover_path;
            }
            
            $slug = Str::slug($data['title']);

            if ($post->slug != $slug) {

                $counter = 1;

                // cerca title post se già esiste un post con questo slug generane uno diverso
                while(Post::where('slug', $slug)->first()) {
                    $slug = Str::slug($data['title']) . '-' . $counter;
                    $counter++;
                }

                $data['slug'] = $slug;

            }
            
            $post->update($data);
            $post->save();
            
            return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // eliminare la foto in upload
        if($post->cover) {
            Storage::delete($post->cover);
        }
        

        // Eliminazione post
        // cancellazione elemento su db
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
