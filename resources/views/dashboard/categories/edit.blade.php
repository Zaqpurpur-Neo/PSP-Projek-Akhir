@extends('template_dashboard.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Form Pembuatan Category</h1>
    </div>
    <div class="row">
        <div class="col-8">
            <form action="/category/{{ $category->slug }}/update" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="nama">Nama Category</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $category->nama }}">
                </div>
                <div class="mb-2">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $category->slug }}">
                </div>
                <button type="submit" class="btn btn-primary my-2">
                    Edit Category
                </button>
            </form>
        </div>
    </div>
</main>

<script>
</script>
@endsection
