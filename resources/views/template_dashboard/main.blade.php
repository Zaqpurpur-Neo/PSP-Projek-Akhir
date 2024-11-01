<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

        <script defer src="{{ asset('js/alpine.min.js') }}"></script>
        <style>
            :root {
                /*
                --color-dark: #08090d;
                --color-semi-dark: #12141c;
                */
                --color-dark: #e8e8e8;
                --color-semi-dark: #f2f2f2;
                --color-line: rgba(255, 255, 255, 0.4);
                --color-purple: #7520f5;
                --color-light: #08090d
            }

            ::-webkit-scrollbar {
                display: none;
            }

            * {
                padding: 0;
                margin: 0;
            }

            body {
                font-family: 'Outfit', sans-serif;
                background-image: linear-gradient(rgba(0, 0, 0, 0.05) 1px, transparent 1px), linear-gradient(to right, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
                background-size: 32px 32px;
                background-color: var(--color-dark);
                color: #08090d;
            }

            .rower {
                display: flex;
            }

            .sidebar {
                padding: 1.5em;
                height: 100%;
                position: fixed;
                background: var(--color-semi-dark);
                border-right: 1px solid var(--color-light);
            }

            .right-side {
                position: relative;
                margin-left: 14em;
                width: 100%;
            }

            .upper h2 {
                font-size: 2rem;
            }

            .divider {
                position: relative;
                width: 100px;
                height: 2px;
                background: var(--color-line);
            }

            .lower {
                margin-top: 2em;
            }

            .navigator {
                list-style: none;
            }

            .navlink {
                text-decoration: none;
                color: var(--color-light);
                background: none;
                border: none;
                font-size: 1.2rem;
                font-family: 'Outfit', sans-serif;
            }

            .navbg {
                width: 100%;
                padding: .5em;
            }

            .navbg:not(.active):hover {
                outline: 1px solid var(--color-line);
                box-sizing: border-box;
                border-radius: 10px;
            }

            .navbg.active {
                background: var(--color-light);
                box-sizing: border-box;
                border-radius: 10px;

                & .navlink {
                    color: var(--color-dark);
                }
            }


            .navigator {
                display: flex;
                flex-direction: column;
                gap: 1.2em;

            }

            main {
                padding: 2em;
                box-sizing: border-box;
            }

            .overview {
                opacity: 0.7;
                font-weight: 400;
            }
        </style>

        @yield('style')
    </head>
    <body>
    @include('template_dashboard.header')
        <div class="conta">
            <div class="rower" >
            @include('template_dashboard.sidebar')

                <div class="right-side">
                @yield('content')
                </div>
            </div>
        </div>


    <script src="{{ asset('js/dashboard.js') }}"></script>

    </body>
</html>
