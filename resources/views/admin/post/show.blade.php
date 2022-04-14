@extends('admin.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Visualiazza post</h1>


            {{-- aggiunta per visualizzare image --}}
            @if ($post->cover)
                <img class="img-fluid mt-3 mb-3" src="{{asset('storage/' . $post->cover)}}" alt="{{$post->title}}">
            @else
                <img class="img-fluid mt-3 mb-3" src="{{asset('img/error.png')}}" alt="{{$post->title}}">
            @endif



            <h3><strong>Titolo: </strong>{{$post->title}}</h3>
            <div><strong>Contenuto: </strong>{!! $post->content !!}</div>
            <div><strong>Slug: </strong>{{$post->slug}}</div>
            <div><strong>Categoria: </strong> {{$post->category->name}}</div>

            {{-- <div><strong>Il post è stato scritto</strong> {{$diffInDays}} giorni fa</div> --}}
            
            <div>
                @foreach ($post->tags as $tag)
                    <span class="badge badge-primary mt-3">{{$tag->name}}</span>
                @endforeach
            </div>

            <a href="{{route('admin.posts.index')}}" class="btn mt-3" style="background-color: #0073aa; color: #fff;">Torna alla lista</a>
        </div>
    </div>
</div>

@endsection