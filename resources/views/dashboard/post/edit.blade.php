@extends('template_dashboard.main')

@section('style')
<style>
    main {
        position: relative;
        padding: 2em;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        gap: 1em;
        width: 80%;
    }

    form {
        position: relative;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        gap: 2em
    }

    .rower {
        display: flex;
        justify-content: space-between;
        gap: 2em;
    }

    .input {
        display: flex;
        flex-direction: column;
        gap: .75em;
        flex-grow: 1;
    }

    .input label {
        font-size: 1.25rem;
    }

    .input input {
        background: var(--color-semi-dark);
        border: 1px solid rgba(0, 0, 0, 0.4);
        width: 100%;
        padding: .5em;
        font-size: 1.25em;
        font-family: 'Outfit', sans-serif;
    }

    .input select {
        background: var(--color-semi-dark);
        border: 1px solid rgba(0, 0, 0, 0.4);
        width: 100%;
        padding: .5em;
        font-size: 1.25em;
        color: var(--color-light);

        & option {
            background: none;
        }
    }

    .input textarea {
        background: none;
        border: 1px solid rgba(0, 0, 0, 0.4);
        width: 100%;
        padding: .5em;
        font-size: 1.25em;
        color: white;
        font-family: 'Outfit', sans-serif;
    }

    .btn {
        font-family: 'Outfit',  sans-serif;
        color: black;
        padding: .5em;
        font-size: 1.25em;
        width: 8em;
        border: none;
        background: white;
    }

    .is-invalid {
        border: 2px solid red;
    }
</style>
@endsection

@section('content')
<main>
    <h4 class="overview">Post / Edit</h4>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Form Edit Post</h1>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul class="p-2">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
    </div>
    <div class="row">
        <div class="col-8">
            <form action="/post/{{ $post->id }}/update" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                <div class="input">
                    <label for="judul">Judul</label>
                    <input type="text" class="" id="judul" name="judul" value="{{ old('judul', $post->judul) }}">
                </div>

                <div class="rower">
                    <div class="input">
                        <label for="slug">Slug</label>
                        @error('slug')
                            <p>Something is Wrong here</p>
                            <p>{{ $message }}</p>
                        @enderror
                        <input type="text" class="@error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                    </div>
                    <div class="input">
                        <label for="category">Category</label>
                        @error('categoy_id')
                            <p>Something is Wrong here</p>
                            <p>{{ $message }}</p>
                        @enderror
                        <select name="category_id" id="category" class="@error('category_id') is-invalid @enderror">
                            <option disabled>-- Pilih Category --</option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" selected="{{ old('category_id', $post->category_id) == $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="input">
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    <label for="image">Cover</label>
                    @if ($post->image)
                        <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input type="file" accept="image/*" value="{{ old('image', $post->image)}}" class=" @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                </div>

                <div class="input">
                    <label for="content">Konten</label>
                    <textarea name="content" id="konten" cols="30" rows="10" class="">{{ old('konten', $post->content) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary my-2">
                    Ubah Post
                </button>
            </form>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $('#konten').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 200,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
        ]
        });
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
