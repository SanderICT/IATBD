<header class="header">
        <div class="logo">
            <img src="{{ asset('media/logo/logo.png') }}" alt="PassenOpJeDier Logo">
        </div>
        <nav class="nav">
            <ul>
                <li><a class="navbar" href="/dashboard">Home</a></li>
                <li><a class="navbar" href="/profile">Mijn Profiel</a></li>
                <li><a class="navbar" href="/pets">Mijn Huisdieren</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button class="navbar" type="submit" style="font-size: 1rem;" >Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>