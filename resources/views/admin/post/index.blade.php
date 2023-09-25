@extends('admin.app')

@section('content')
    <a href="/tambah" class="btn btn-primary mb-4">Tambah Postingan</a>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success'); }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    {{-- <th scope="col">Tanggal Posting</th> --}}
                    {{-- <th scope="col">Kategory</th> --}}
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Images</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $post->title }}</td>
                      {{-- <td>{{ $post->created_at->diffForHumans() }}</td>  --}}
                      {{-- <td>{{ $data->name }}</td> --}}
                      <td>{{ substr($post->body, 0, 200)}}</td>
                      <td><img src="{{ asset('storage/' . $post->images) }}" alt="img" width="60" class="img-fluid"></td>
                      <td>
                          <a href="/ubah/{{ $post->id }}/edit" class="badge bg-warning">Ubah</a>
                          <form action="{{ url('hapus_post/'.$post->id) }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">Hapus</button>
                          </form>
                      </td>
                    </tr>
                    @endforeach


                </tbody>
              </table>
        </div>
    </div>
@endsection