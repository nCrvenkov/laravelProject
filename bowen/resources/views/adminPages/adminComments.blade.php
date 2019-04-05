@extends('layouts.main')
@section('nav')
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/indexAdmin" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/adminComments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/manageUsers" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Upravljanje Korisnicima</a>
        <a href="/manageAppointments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Upravljanje Terminima</a>
        <a href="/adminMessages" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Poruke</a>
        <a href="/logout" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
    </div>
@endsection
@section('content')
    <div class="w3-container"  style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1><b>Komentari</b></h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <br/>
        <span class="w3-right">{{ $data->links() }}</span>
        <br/>
        @foreach($data as $c)
            <div>
                <h3>{{$c->first_name}} {{$c->last_name}} </h3>
                <i class="material-icons w3-right w3-xxlarge" id="deleteCommentAdmin" data-id="{{$c->id}}" style="cursor:pointer;">close</i>
                <h5>{{$c->date}}</h5>
                <p> {{$c->comment}} </p>
            </div>
            <hr/>
    @endforeach
    </div>
@endsection