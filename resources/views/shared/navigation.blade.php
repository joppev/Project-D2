<nav class="navbar navbar-expand-md shadow-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                @auth
                    @if(auth()->user()->isAdmin or auth()->user()->isReceptionist)


                        <li class="nav-item">
                            <a class="nav-link" href="/admin/users">Overzicht gebruikers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/kades">Overzicht kades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/plannings">Overzicht planning</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/bedrijven">Overzicht bedrijven</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/nummerplaats">Overzicht nummerplaten</a>
                        </li>
                    @endif

                @endauth
            </ul>
            {{--  Auth navigation  --}}
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i>Inloggen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><i class="fas fa-signature"></i>Registreren</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown">
                            {{ auth()->user()->naam }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/user/profile"><i class="fas fa-user-cog"></i>Profiel aanpassen</a>
                            <a class="dropdown-item" href="/user/password"><i class="fas fa-key"></i>Paswoord aanpassen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i>Uitloggen</a>


                        </div>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
