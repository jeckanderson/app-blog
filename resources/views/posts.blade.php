
@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

    {{-- searching --}}
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts" method="GET">
                {{-- kalau didalam request yg di url, ada category bikin sebuah input yang isinya apapun yg di tuliskan didalam category tdi--}}
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}"> 
            @endif
            @if(request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}"> 
            @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="search.." name="search" value="{{ request("search") }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- hitung isinya ada berapa jumlah postingannya kalau lebih dari 1 true dan jika kurangdari 0 maka kosong --}}
    @if ($posts->count() > 0 )
        <div class="card mb-3">
            {{-- pengecekan gambar --}}
            @if ($posts[0]->image)
                <div style="max-height: 400px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
                </div>
             @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif
            {{-- akhir pengecekan gambar --}}
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                
                <p>
                    <small class="text-muted">
                    By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>

                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
            </div>
        </div>
        
    
    <div class="container">
        <div class="row">
            @foreach($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7); "><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                        {{-- pengecekan gambar --}}
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                        @endif
                        {{-- akhir pengecekan gambar --}}
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p>
                        <small class="text-muted">
                        By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none"></a> {{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                        </small>
                    </p>
                      <p class="card-text">{{ $post->excerpt }}</p>
                      <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- kalau tidak ada postingannya tampilkan else pesan di bawah ini --}}
    @else
    <p class="text-center fs-4">No Posts Found.</p>
@endif

{{-- pagination --}}
<div class="d-flex justify-content-end">
    {{ $posts->links() }}
</div>


@endsection