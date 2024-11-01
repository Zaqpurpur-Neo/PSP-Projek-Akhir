@extends('templates.main')

@section('style')
<style>
:has(.category, .category-mini) button {
    background: #dedede;
    border-radius: 20px;
    padding: .5em .75em;
    border: 1px solid white;
}
:has(.category, .category-mini) button.selected {
    border: 1px solid black;
}

.round-crn {
    overflow: hidden;
    transition: all 0.4s ease;
    position: relative;
    padding: 1em 0;
}

.round-crn:hover {
    transition: all 0.4s ease;
    transform: scale(1.05);
    z-index: 4;
}

.thumbnail {
    border-radius: 10px;
    max-width: 25em;
    border: none;
}

.card-type {
    cursor: pointer;
}

.grid-layout {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-auto-rows: minmax(100px, auto);
}

.layout {
    width: 100%;
}

.layout.first {
    grid-column: 1/ -1;
    margin-bottom: 2em;
}

.layout.first .thumbnail {
    max-width: 40em;
}

.layout.first .card-type {
    display: flex;
    gap: 1em;
    justify-content: space-between;

    & .card-title {
        display: flex;
        flex-direction: column;

        & .wrapper {
            justify-self: flex-end;
        }
    }
}

.card-body .card-title {
    height: 100%;
}

.layout.first .card-type .card-body {
    & h3 {
        font-size: 4rem;
    }

    & .wrapper {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

}

</style>
@endsection

@section('content')
<div class="container">
    <h2 class="mb-4">What's New</h2>

    @if($count > 0)
    <div class="grid-layout">
        @foreach ($posts as $item)
            <div class="layout {{ $loop->iteration === 1 ? 'first' : '' }} {{ $loop->iteration === 2 ? 'seconds' : '' }}" value="/blog/p/{{ $item->id }}">
                <div class="card-type round-crn">
                    <img src="{{ asset('storage/'. $item->image) }}" class="thumbnail" alt="">
                    <div class="card-body">
                        <span class="category-mini">
                            <form action="/blog" style="display: inline;" role="category"><button name="category" type="search" value="{{ $item->category_id }}">{{ $category->where("id", "=", $item->category_id)->first()->nama }}</button></form>
                        </span>
                        <div class="card-title">
                            <h3>
                                <a href="/blog/p/{{ $item->id }}" class="text-decoration-none text-dark">{{ $item->judul }}</a>
                            </h3>
                            <a href="/blog/p/{{ $item->id }}" class="text-decoration-none">Read more ..</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="no-post">
        <h1>No Post Yet</h1>
    </div>

    @endif
</div>

<script>
    const layout = document.querySelectorAll(".layout")

    layout.forEach(item => item.addEventListener("click", ev => {
        const href = item.getAttribute('value')
        location.href = href
    }))


</script>
@endsection
