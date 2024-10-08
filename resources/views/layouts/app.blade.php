<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <title>Starr Farm</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/0e3980ab7c.js" crossorigin="anonymous"></script>

        <!-- Styles & Scripts -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="/assets/css/app.css">
        @livewireStyles
    </head>
    <body>
        <div class="navigation">
            <div class="row full-row -light-bg">
                <div class="four columns push_eight">
                    @if (Route::has('login'))
                        <div class="-padding-right" style="float:right;display:flex;">
                            @auth
                                <a href="{{ route('profile.edit') }}" class="-padding-5">Profile</a>
                                <span class="-padding-5">|</span>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" class="-padding-5">
                            @csrf

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>

                            @else
                                <a href="{{ route('login') }}" class="-padding-5">Log in</a>
                                <span class="-padding-5">|</span>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="-padding-5">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>

            <div class="row full-row -padding-top-5 -light-bg">
                <div>
                    <div class="one column logo -centering">
                        <a href="/">
                            <svg class="logo" fill="#f55247" height="85px" width="85px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 470 470" xml:space="preserve">
                                <g>
                                <path d="M439.433,250.015C439.795,245.041,440,240.037,440,235c0-10.413-0.793-20.88-2.357-31.111
                                c-0.561-3.664-3.711-6.366-7.414-6.366c-13.518,0.066-26.925,0.729-40.229,1.953v-23.999c0.818,0.29,1.661,0.432,2.494,0.432
                                c2.751,0,5.4-1.52,6.714-4.147c1.853-3.705,0.351-8.21-3.354-10.062l-40-20c-2.111-1.056-4.597-1.056-6.708,0l-40,20
                                c-3.705,1.852-5.207,6.357-3.354,10.062c1.712,3.425,5.689,4.962,9.208,3.711v37.202
                                c-87.625,23.004-167.347,71.496-228.609,140.569c-4.773-5.986-9.192-12.264-13.226-18.806c1.758,0.19,3.508,0.39,5.242,0.606
                                c0.315,0.039,0.627,0.059,0.937,0.059c3.729,0,6.96-2.778,7.433-6.574c0.512-4.11-2.405-7.857-6.515-8.37
                                c-5.202-0.648-10.523-1.18-15.868-1.596c-4.053-8.241-7.524-16.815-10.364-25.67c20.131,0.895,40.179,3.415,59.734,7.542
                                c0.522,0.11,1.042,0.163,1.556,0.163c3.47,0,6.586-2.422,7.331-5.953c0.855-4.053-1.737-8.031-5.79-8.887
                                c-21.923-4.626-44.438-7.304-67.013-8.024c-1.89-8.19-3.236-16.584-4.025-25.137c36.529,0.734,72.611,6.294,107.372,16.568
                                c0.709,0.21,1.425,0.31,2.129,0.31c3.237,0,6.225-2.113,7.189-5.376c1.174-3.972-1.094-8.144-5.067-9.318
                                c-36.391-10.755-74.172-16.532-112.412-17.203C45.021,236.718,45,235.861,45,235c0-7.481,0.441-14.991,1.314-22.403
                                c51.775,0.996,102.327,10.757,150.361,29.043c3.873,1.476,8.205-0.47,9.678-4.341c1.474-3.871-0.47-8.204-4.341-9.678
                                c-51.754-19.702-106.327-29.831-162.203-30.104c-3.739,0-6.89,2.703-7.45,6.366C30.793,214.115,30,224.584,30,235
                                c0,18.025,2.348,35.51,6.737,52.175c12.249,46.51,40.471,86.602,78.42,114.041c0.035,0.026,0.07,0.052,0.106,0.077
                                C148.973,425.634,190.338,440,235,440c29.397,0,57.8-6.123,84.42-18.199c3.772-1.711,5.443-6.156,3.731-9.929
                                c-1.71-3.771-6.154-5.442-9.929-3.731C288.563,419.328,262.246,425,235,425c-2.75,0-5.482-0.072-8.204-0.188
                                c44.738-39.105,100.027-64.814,158.567-73.733c-12.881,16.635-28.622,31.275-46.847,43.165c-3.469,2.263-4.447,6.91-2.184,10.379
                                c1.438,2.205,3.839,3.403,6.289,3.403c1.405,0,2.827-0.395,4.091-1.219c53.88-35.15,87.708-92.526,92.638-155.739
                                C439.399,250.722,439.432,250.373,439.433,250.015z M330,168.042l22.5-11.25l22.5,11.25v33.057c-5.018,0.627-10.018,1.338-15,2.127
                                v-14.819c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v17.451c-5.022,0.966-10.023,2.012-15,3.143V168.042z M96.284,364.69
                                c83.082-94.517,201.724-149.631,327.402-152.087C424.559,220.014,425,227.521,425,235c0,2.537-0.068,5.063-0.168,7.584
                                c-53.443,0.955-105.322,11.879-154.31,32.519c-3.817,1.608-5.608,6.006-4,9.824c1.208,2.866,3.988,4.59,6.915,4.59
                                c0.971,0,1.958-0.19,2.909-0.59c46.773-19.707,96.286-30.224,147.298-31.316c-1.225,10.282-3.264,20.376-6.102,30.193
                                c-50.381,1.98-98.899,13.867-144.295,35.367c-43.874,20.779-82.706,49.505-115.537,85.385c-9.439-4.22-18.469-9.191-27.022-14.831
                                c33.672-38.165,73.647-69.228,118.956-92.375c3.688-1.884,5.151-6.402,3.267-10.091c-1.884-3.689-6.403-5.152-10.091-3.267
                                c-47.446,24.238-89.245,56.85-124.375,96.954C110.536,378.782,103.127,372.005,96.284,364.69z M206.661,422.885
                                c-11.716-1.76-23.083-4.599-34.002-8.402c62.63-66.198,148.923-106.299,239.74-111.41c-4.196,10.926-9.394,21.429-15.527,31.383
                                C325.853,342.162,258.582,373.436,206.661,422.885z"/>
                                <path d="M401.17,68.83C356.785,24.444,297.771,0,235,0S113.215,24.444,68.83,68.83C24.444,113.215,0,172.229,0,235
                                s24.444,121.785,68.83,166.17C113.215,445.556,172.229,470,235,470s121.785-24.444,166.17-68.83
                                C445.556,356.785,470,297.771,470,235S445.556,113.215,401.17,68.83z M235,455c-121.309,0-220-98.691-220-220S113.691,15,235,15
                                s220,98.691,220,220S356.309,455,235,455z"/>
                                <path d="M235,125c26.191,0,47.5-21.309,47.5-47.5S261.191,30,235,30s-47.5,21.309-47.5,47.5S208.809,125,235,125z M235,45
                                c17.92,0,32.5,14.58,32.5,32.5S252.92,110,235,110s-32.5-14.58-32.5-32.5S217.08,45,235,45z"/>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="eleven columns flex -flex-align-baseline -space-between -padding-horizontal">
                        <div>
                            <a href="/"><img src="images/starrfarm.png" alt="logo" class="logo2"/></a>
                        </div>
                        <div class="flex -justify-end navBar">
                            <a class="button -light-bg -minimal -margin-5" href="/flock">Flock</a>
                            <a class="button -light-bg -minimal -margin-5" href="/crops">Crops</a>
                            <a class="button -light-bg -minimal -margin-5" href="/ornamentals">Ornamentals</a>
                            <a class="button -light-bg -minimal -margin-5" href="/friends">Friends</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="pageWrapper">
            @if(isset($slot))
            <main>
                {{ $slot }}
            </main>
        @else
            @yield('content')
        @endif
        </div>
        <div class="row full-row footer">
            <div class="twelve columns">
                <a href="https://austincurran.com/" alt="Link to Portfolio" class="-centering">Curran Concepts © {{ date('Y') }}</a>
            </div>
        </div>
        @livewireScripts
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var accButton = document.querySelector('.accordion-button');
                var accContent = document.querySelector('.accordion-content');

                accButton.addEventListener('click', function() {
                    if (accContent.style.display === "block") {
                        accContent.style.display = "none";
                    } else {
                        accContent.style.display = "block";
                    }
                });
            });
        </script>
    </body>
</html>
