@extends('templates.main')

@section('style')
<style>
main {
    width: 100%;
}

.main-section {
    width: fit-content;
    max-width: 50em;
    margin: 0 auto;
    overflow-x: hidden;
}

.img-cover {
    max-width: 50em;
}

.title {
    font-size: 4rem;
    font-weight: 700;
}

hr {
    display: block;
    width: 50em;
    margin: 2em 0;
    background: var(--color-light);
    border-style: inset;
    border-width: 2px;
    border-color: var(--color-light);
}

.body-section {
    padding-bottom: 4em;
}

.discover-section {
    max-width: 50em;
    margin: 0 auto;
}
</style>
@endsection

@section('content')
<main>
<div class="main-section">
<img src="{{ asset('storage/'. $post->image) }}" class="img-cover" alt="">
    <div class="body-section">
        <h1 class="title">{{ $post->judul }}</h1>
        <hr>
        <div class="content-section">{!! $post->content !!}</div>
    </div>
</div>

<div class="discover-section">
    <h2 class="discover-title">Discover</h2>

    <div class="row">
   @foreach ($another as $item)
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/'. $item->image) }}" class="img-fluid" alt="">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>
                                <a href="/blog/p/{{ $item->id }}" class="text-decoration-none text-dark">{{ $item->judul }}</a>
                            </h5>
                            <p class="card-text">{!! Str::limit(strip_tags($item->konten), 150) !!}</p>
                            <a href="/blog/p/{{ $item->id }}" class="text-decoration-none">Read more ..</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
</div>
</main>
@endsection
