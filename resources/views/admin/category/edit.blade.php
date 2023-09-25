@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-lg-7">
            <h3>Form Tambah Kategory</h3>
            <form action="/tambah_category" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name">Nama Kategory</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feeback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
             
                <div class="mb-3">
                   <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>                 
        </div>
    </div>
@endsection