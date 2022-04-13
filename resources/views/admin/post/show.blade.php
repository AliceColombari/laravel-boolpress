@extends('admin.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Visualiazza post</h1>
            <div><strong>Titolo: </strong>{{$post->title}}</div>
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