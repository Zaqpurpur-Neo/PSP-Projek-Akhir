@extends('template_dashboard.main')

@section('style')
<style>
    .card-blog {
        display: flex;
        flex-direction: column;
        gap: 1em;
        position: relative;
        width: 24em;
        border: 1px solid rgba(0, 0, 0, 1);
        overflow: hidden;
        border-radius: 1em;
    }

    .card-info {
        position: relative;
        box-sizing: border-box;
        padding: .5em .75em;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: var(--color-dark);
    }

    .post-content {
        display: flex;
        flex-grow: 3;
        flex-wrap: wrap;
        gap: 1.75em;
        margin-top: 2em;
    }

    .desc * {
       text-overflow: ellipsis;
       overflow: hidden;
       white-space: nowrap;
       font-weight: 200;
    }

    .desc {
        margin-bottom: 1.25em;
        max-height: 2em;
        overflow: hidden;
    }

    .modal-list {
        margin-top: 2em;
    }

    .modal-create {
        position: relative;
        border: none;
        font-family: 'Outfit', sans-serif;
        font-size: 1.5rem;
        background: var(--color-light);
        color: var(--color-dark);
        padding: .75em 1.5em;
        font-weight: bold;
        border-radius: 4em;
        text-decoration: none;
    }

    .modal-create:hover {
        text-decoration: none;
    }

    .form-edit {
        display: flex;
        gap: .5em;
        align-items: center;
    }

    .btn-edit {
        text-decoration: none;
        background: var(--color-light);
        color: white;
        font-size: 1rem;
        padding: .5em 1em;
        border-radius: 4em;
    }

    .btn-delete {
        text-decoration: none;
        color: black;
        font-family: 'Outfit', sans-serif;
        font-size: 1rem;
        border: 1px solid var(--color-light);
        padding: .5em 1em;
        border-radius: 4em;
    }
</style>
@endsection

@section('content')
<main>
    <h4 class="overview">Post</h4>
    <h1>Post Sections</h1>
    <h4 class="overview">Total Post {{ $count }}</h4>
    <div class="container-post">
        <div class="modal-list">
            <a href="/post/create" class="modal-create">Create Post</a>
        </div>
        <div class="post-content">
        @foreach ($contents as $post)
            <div class="card-blog">
                <img class="cover" src="{{ asset('storage/' . $post->image) }}">
                <div class="card-info">
                    <div class="top">
                        <h3>{{ $post->judul }}</h3>
                        <div class="desc">
                            {!! $post->content !!}
                        </div>
                    </div>
                    <div class="form-edit">
                        <a href="/post/{{ $post->id }}/edit" class="btn-edit">Edit</a>
                        <form action="/post/{{ $post->id }}" style="display: inline" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn-delete">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</main>

@endsection


