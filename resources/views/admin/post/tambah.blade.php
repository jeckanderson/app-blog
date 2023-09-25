@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-lg-7">
            <h3>Form Tambah Postingan</h3>
            <form action="/postingan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required value="{{ old('title') }}">
                </div>
             
                {{-- <div class="mb-3">
                    <label for="title">Tanggal Postingan</label>
                    <input type="date" name="tgl_posting" class="form-control" id="title" required value="{{ old('tgl_posting') }}">
                </div> --}}
                <div class="mb-3">
                    <label for="title">Kategory</label>
                    <select class="form-select form-control" name="category_id" aria-label="Default select example" required value="{{ old('category_id') }}">
                        @foreach(@$categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        {{-- <option value="Python">Python</option> --}}
                        {{-- <option value="PHP">PHP</option>
                        <option value="Java">Java</option>
                        <option value="Codeigniter">Codeigniter</option>
                        <option value="Android">Android</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="CPP">CPP</option> --}}
                    </select>

                    {{-- <select class="form-select form-control" name="category_id">
                        @foreach ($categories as $category)
                            @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select> --}}

                </div>
                <div class="mb-3">
                    <label for="title">Deskripsi</label>
                    <div class="form-floating">
                        <textarea class="form-control" id="body" name="body"></textarea required value="{{ old('body') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title">Images</label>
                    <input type="file" name="images" class="form-control" id="title">
                </div>
                <div class="mb-3">
                   <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>                 
        </div>
    </div>
@endsection