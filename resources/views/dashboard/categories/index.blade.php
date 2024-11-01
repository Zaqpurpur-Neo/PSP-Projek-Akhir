@extends('template_dashboard.main')

@section('style')
<style>

    main {
        width: 100%;
    }

    .list {
        width: 100%;
        table-layout: fixed;
        margin-top: 2em;
    }

    .content-box {
        width: 100%;
        display: flex;
        gap: 1em;
        align-items: center;
        margin-bottom: .5em;
        padding: .25em;
        background: var(--color-dark);
        border: 1px solid var(--color-light);
        border-radius: 10px;
        padding-left: 1em;
    }

    .content-box .action {
        flex-grow: 8;
        display: flex;
        justify-content: flex-end;
        gap: .25em;
        padding-right: .5em;
    }

    .content-box p {
        font-size: 16px;
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

    .btn-custom {
        border: 1px solid var(--color-light);
        padding: .5em;
        background: none;
        border-radius: 5px;
        aspect-ratio: 1/1;
    }
</style>
@endsection

@section('content')

<main>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h4 class="overview">Category</h4>
    <h1>Category Sections</h1>
    <h4 class="overview">Total Category {{ $count }}</h4>
    <div class="modal-list">
        <a href="/category/create" class="modal-create">Create Post</a>
    </div>
    <div class="list">
        @foreach ($categories as $category)
            <div class="content-box w-100">
                <p>{{ $loop->iteration }}</p>
                <p>{{ $category->nama }}</p>
                <div class="action">
                    <a href="/category/{{ $category->slug }}/edit" class="btn"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 24 24">
    <path d="M 19.171875 2 C 18.448125 2 17.724375 2.275625 17.171875 2.828125 L 16 4 L 20 8 L 21.171875 6.828125 C 22.275875 5.724125 22.275875 3.933125 21.171875 2.828125 C 20.619375 2.275625 19.895625 2 19.171875 2 z M 14.5 5.5 L 3 17 L 3 21 L 7 21 L 18.5 9.5 L 14.5 5.5 z"></path>
</svg></a>
                    <form action="/category/{{ $category->slug }}" style="display: inline" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn-custom" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 26 26">
<path d="M 11 -0.03125 C 10.164063 -0.03125 9.34375 0.132813 8.75 0.71875 C 8.15625 1.304688 7.96875 2.136719 7.96875 3 L 4 3 C 3.449219 3 3 3.449219 3 4 L 2 4 L 2 6 L 24 6 L 24 4 L 23 4 C 23 3.449219 22.550781 3 22 3 L 18.03125 3 C 18.03125 2.136719 17.84375 1.304688 17.25 0.71875 C 16.65625 0.132813 15.835938 -0.03125 15 -0.03125 Z M 11 2.03125 L 15 2.03125 C 15.546875 2.03125 15.71875 2.160156 15.78125 2.21875 C 15.84375 2.277344 15.96875 2.441406 15.96875 3 L 10.03125 3 C 10.03125 2.441406 10.15625 2.277344 10.21875 2.21875 C 10.28125 2.160156 10.453125 2.03125 11 2.03125 Z M 4 7 L 4 23 C 4 24.652344 5.347656 26 7 26 L 19 26 C 20.652344 26 22 24.652344 22 23 L 22 7 Z M 8 10 L 10 10 L 10 22 L 8 22 Z M 12 10 L 14 10 L 14 22 L 12 22 Z M 16 10 L 18 10 L 18 22 L 16 22 Z"></path>
</svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection
