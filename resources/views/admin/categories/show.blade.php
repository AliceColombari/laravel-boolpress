@extends ("admin.layouts.base")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Dettagli categoria</h1>
                <div><strong>Name: </strong>{{$category->name}}</div>
                <div><strong>Slug: </strong> {{$category->slug}}</div>

                <a href="{{route('admin.categories.index')}}" class="btn mt-3" style="background-color: #0073aa; color: #fff;">Torna alla lista</a>
            </div>
        </div>
    </div>
@endsection
