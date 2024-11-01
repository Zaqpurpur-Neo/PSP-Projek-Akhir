@extends('templates.main')

@section('style')
<style>
.category-list {
    width: 100%;
    padding: 2em 0;
    margin-bottom: -2em;
}

.category-list ul {
    display: flex;
    gap: .5em;
    list-style: none;
    overflow: auto;
}

.category-list ul {
    -webkit-mask-image: linear-gradient(90deg, white 95%, transparent);
}

.category-list ul::-webkit-scrollbar {
    display: none;
}

ul .category{
    flex-shrink: 0;
    flex-grow: 0;
    cursor: pointer;
}

:has(.category, .category-mini) button {
    background: #efefef;
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

.category-list:hover .info-scroll {
    transform: scale(1);
    transition: all 0.2s ease;
}

.info-scroll {
    text-align: center;
    transform: scale(0);
    transition: all 0.2s ease;
    margin-top: .5em;
}

.sub-vision {
    width: 100%;

    & * {
        text-align: center;
    }
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="category-list splide__track">
        <ul class="cg-controll splide__list">
        @foreach ($category as $cg)
            <li class="category">
                <form style="display: inline;" role="category"><button name="category" type="search" value="{{ $cg->id }}">{{ $cg->nama }}</button></form>
            </li>
        @endforeach
        </ul>
        <p class="info-scroll">Scroll To Swipe Category</p>
    </div>
    <div class="sub-vision">
        <h1>{{ $category->first()->nama }}</h1>
    </div>
    <div class="grid-layout">
        @foreach ($posts as $item)
        <div class="layout {{ $loop->iteration === 1 ? 'first' : '' }} {{ $loop->iteration === 2 ? 'seconds' : '' }}" value="/blog/p/{{ $item->id }}">
                <div class="card-type round-crn">
                    <img src="{{ asset('storage/'. $item->image) }}" class="thumbnail" alt="">
                    <div class="card-body">
                        <div class="card-title">
                           <span class="category-mini">
                               @if($category->where("id", "=", $item->category_id)->first())
                               <form style="display: inline;" role="category"><button name="category" type="search" value="{{ $item->category_id }}">{{ $category->where("id", "=", $item->category_id)->first()->nama }}</button></form>
                               @else
                               <button value="null">Unknown</button>
                               @endif

                           </span>
                            <h3>
    <a href="/blog/p/{{ $item->id }}" class="text-decoration-none text-dark">{{ $item->judul }}</a>
                            </h3>
                            <p class="card-text">{!! Str::limit(strip_tags($item->konten), 150) !!}</p>
                            <div class="wrapper">
                                <a href="/blog/p/{{ $item->id }}" class="text-decoration-none">Read more ..</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="row justify-content-center overflow-hidden">
    <div class="col-md-6">
        <div class="d-flex flex-column justify-content-center">
            {{ $posts->links("vendor.pagination.bootstrap-5") }}
        </div>
    </div>
</div>

<script lang="js">
    const cg = document.querySelector(".cg-controll")
    const item = Array.from(cg.querySelectorAll("li"))
    const subvision = document.querySelector(".sub-vision")
    const cardType = document.querySelector(".card-type")
    const layout = document.querySelectorAll(".layout")

    console.log(layout)

    layout.forEach(item => item.addEventListener("click", ev => {
        const href = item.getAttribute('value')
        location.href = href
    }))

    cg.addEventListener('wheel', e => {
        e.preventDefault();
        cg.scrollLeft += e.deltaY
    })

    const params = new URL(location.href).searchParams
    const category = params.get("category")
    if(category === null) subvision.style.setProperty('display', 'none')

    document.addEventListener('DOMContentLoaded', ev => {
        item.forEach((item, idx) => {
            const btn = item.querySelector("button")
            if(btn.value === category) {
                btn.classList.add("selected")
                btn.addEventListener("click", ev => {
                    ev.preventDefault()
                    location.href = location.origin + "/blog"
                })
            }

        })
    })

</script>
@endsection
