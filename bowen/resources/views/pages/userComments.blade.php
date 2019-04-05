@extends('layouts.main')
@section('nav')
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/indexUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/userComments/{{session()->get('user')[0]->id}}" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/galleryUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galerija</a>
        <hr/>
        <a href="/userPage/{{session()->get('user')[0]->id}}" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">User Page</a>
        <a href="/appointments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Zakazi termin</a>
        <a href="/logout" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
    </div>
@endsection
@section('content')
    <div class="w3-container"  style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1><b>Komentari</b></h1>
        <br/>
        <span class="w3-right">{{ $comments->links() }}</span>
        <br/>
        <br/>
        @foreach($comments as $c)
            <div>
                <a href="/userPage/{{$c->acc_id}}"><h3>{{$c->first_name}} {{$c->last_name}} </h3></a>
                @if($c->acc_id == session()->get('user')[0]->id)
                    <i class="material-icons w3-right w3-xxlarge" id="deleteComment" data-id="{{$c->id}}" style="cursor:pointer;">close</i>
                @endif
                <h5>{{$c->date}}</h5>
                <p> {{$c->comment}} </p>
            </div>
            <hr/>

        @endforeach


        @if($allow_comment === 0)
        <br/>
        <h5>Već ste postavili komentar</h5>
        @else
            <hr/>
            <h3>Postavite svoj komentar</h3>
            <form class="form-group" action="/postComment" method="post">
                @csrf
                <textarea class="form-control" name="userComment">

            </textarea>
                <br/>
                <input type="submit" class="form-control w3-right" style="width:100px;" value="objavi"/>
                <input type="hidden" value="{{session()->get('user')[0]->id}}" name="user_id"/>
            </form>
        @endif
    </div>
@endsection