<div class="sidebar">
    <div class="upper">
        <h2>Dashboard</h2>
    </div>

    @php
        $route = request()->route()->uri
    @endphp

    <div class="lower">
        <ul class="navigator">
            <li class="navbg {{ $route === 'dashboard' ? 'active' : null }}"><a class="navlink" href="/dashboard"><span class="material-symbols-outlined">Overview</span></a></li>
            <li class="navbg {{ $route === 'post' ? 'active' : null }}"><a class="navlink" href="/post">Post</a></li>
            <li class="navbg {{ $route === 'category' ? 'active' : null }}"><a class="navlink" href="/category">Category</a></li>
            <li><a class="navlink" href="/">Back To Home Page</a></li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="navlink" type="submit">Sign out</button>
                </form>
            </li>
        </ul>
    </div>
</div>
