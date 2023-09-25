@extends('admin.app')

@section('content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Post Kategory</h4>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-6" role="alert">
        {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive col-lg-6">
    <a href="/c_tambah" class="btn btn-primary mb-3">Tambah Kategory</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Kategory</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name }}</td>
          <td>
              <a href="{{ url('edit/' .$category->id) }}" class="badge bg-warning">Edit</a>
              <form action="{{ url('hapus/'.$category->id) }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @endsection

