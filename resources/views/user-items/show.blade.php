@extends('layouts.app')

@section('content')
    <div class="UserItemDetails">
    <v-container class="Container u--flex u--flexWrap" v-cloak>
        <div class="Column Column--left">
            <v-img src="{{ asset($user_item_user->thumbnail) }}"></v-img>
        </div>
        <div class="Column Column--right">
            <v-header class="Header Header--user-item-details">
                <h1 class="u--alignSelfCenter">{{ $user_item_user->name }}</h1>
                <div class="UserDetails">
                    <a href="{{ url('/user/' . $user_item_user->user_id) }}">{{ $user_item_user->user_name }}</a>
                    <div class="Header__avatar-container u--floatLeft">
                    <v-avatar class="Avatar Avatar--default" src="{{ $user_item_user->avatar }}&width=32&height=32"></v-avatar>
                    </div>
                    <div class="Rating"><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></div>
                    <div class="u--cf"></div>
                </div>
                <span class="UserItem__price">€{{  number_format($user_item_user->price,2) }} per dag</span>
            </v-header>
            @if($owned)
            <div>
                <v-button class="Button Button--default Button--blue u--block u--linkClean" href="{{ url('user-item/' . $user_item_user->id . '/edit')}}">Item bewerken</v-button>
            </div>
            @else
            @if ($errors->any())
            <div class="Errors">
                <h3>Verzoek niet verstuurd</h3>
                <ul>
                    @foreach ($errors->all() as $message)
                    <li><p>{{ $message }}</p></li> 
                    @endforeach
                </ul>
            </div>
            @elseif(Session::has('alert-success'))
            <div class="Alert-success">
                <h3>Verzoek verstuurd.</h3>
                <p>Je verzoek is succesvol verstuurd. Bekijk al jou <a href="{{ url('requests/outgoing')}}"> uitgaande verhuurverzoeken</a>.</p>
            </div>
            @endif
            <v-form class="Form Form--request u--flex u--flexWrap" action="{{ url('request')}}" method="post">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- Put in value field here the item_id -->
                <input type="hidden" name="user_id" value="{{ $user_item_user->user_id }}">
                <input type="hidden" name="user_item_id" value="{{ $user_item_user->id }}">
                <v-form-item>
                    <input class="Input Input--text-default" type="text" name="start" id="start_date" placeholder="Van">
                </v-form-item>
                <v-form-item>
                    <input class="Input Input--text-default" type="text" name="end" id="end_date" placeholder="Tot">
                </v-form-item>
                <v-button class="Button Button--default Button--blue u--block">Verzoek versturen</v-button>
            </v-form>
            @endif
            
            <div class="Subhead Subhead--spacious">
                <h2 clas="Subhead__heading">Huur dit product</h2>
            </div>

            <h3>Uitgeleend op</h3>
            <p>Nog niet uitgeleend.</p>

            <div class="Subhead Subhead--spacious">
                <h2 clas="Subhead__heading">Meer informatie</h2>
            </div>

            @if($user_item_user->description)
            <p>{{ $user_item_user->description }}</p>
            @else
            <p>Geen beschrijving beschikbaar.</p>
            @endif
            
        </div>
            </v-container>
    </div>
    @endsection