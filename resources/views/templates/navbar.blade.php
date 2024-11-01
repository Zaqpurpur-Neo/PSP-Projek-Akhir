<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <a href="/" class="text-dark text-decoration-none">
            <h2 class="mr-2" >La Blog</h2>
        </a>

        <ul class="justify-content-center align-items-center nav">
            <li><a href="/" class="nav-link px-2 {{ $route_name === '/' ? 'link-secondary' : 'link-black' }}">Overview</a></li>
            <li><a href="/blog" class="nav-link px-2 {{ $route_name === '/blog' ? 'link-secondary' : 'link-black' }} ">Blog</a></li>
            <li><a href="/post" class="nav-link px-2">My Post</a></li>
        </ul>

        <div class="d-flex">
            <form action="/blog" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control" name="search" placeholder="Search..." aria-label="Search">
            </form>

            <div class="dropdown text-end">
                <a href="/login" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" width="32" height="32" class="rounded-circle">
                </a>
            </div>
        </div>
      </div>
    </div>
</header>

