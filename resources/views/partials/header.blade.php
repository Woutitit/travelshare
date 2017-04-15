<v-header class="header--main" v-cloak>
    <v-logo class="logo--header">   
    </v-logo>
    <v-nav class="nav--float-right nav--header">
        <v-ul class="list--flex list--vertically-centered list--nav">
            <v-li class="list__item--nav">
                <v-link link="#" class="link--white">Categorie</v-link>
            </v-li>
            @if (Auth::check())
            <v-li class="list__item--nav">
                <v-button class="button--borderless button--no-padding button--transparent button--no-lh" v-on:click="toggleUserActions">
                    <v-avatar class="avatar--header" src="{{ Auth::user()->avatar }}">           
                    </v-avatar>
                </v-button>
            </v-li>
            @else
            <v-li class="list__item--nav">
                <v-link class="link--white" link="{{ url('/login') }}">Aanmelden</v-link>
            </v-li>
            @endif
        </v-ul>
    </v-nav>
    <v-search-box class="search-box search-box--white search-box--float-left search-box--full-width search-box--header search-box--rounded">
            
    </v-search-box>
    @if (Auth::check())
    <v-popover :show="showUserActions">
        <v-ul>
            <v-li>
                <v-link class="link--UserActions" link="{{ url('me/profile') }}">Profiel</v-link>
            </v-li>
            <v-li>
                <v-link class="link--UserActions" link="{{ url('me/requests') }}">Verzoeken</v-link>
            </v-li>
            <v-li>
                <v-link class="link--UserActions" link="{{ url('me/transactions') }}">Transacties</v-link>
            </v-li>
            <v-li>
                <v-link class="link--UserActions" link="{{ url('/logout') }}">Afmelden</v-link>
            </v-li>
        </v-ul>
    </v-popover>
    @endif
</v-header>
