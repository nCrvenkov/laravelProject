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
    <div class="w3-container" style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1>Upravljanje korisnicima</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <br/>
        <h3>Izmenite podatke korisniku</h3>
        <select id="updateUserId" class="form-control" style="width:300px;">
            <option value="0">Izaberi korisnika...</option>
            @foreach($data as $d)
                <option value="{{$d->id}}">{{$d->first_name}} {{$d->last_name}}</option>
            @endforeach
        </select>
        <br/>
        <div id="updateUserDiv"></div>
        <br/>
        <hr/>
        <h3>Izbrišite korisnika</h3>
        <form>
            <select id="deleteUserId" class="form-control" style="width:300px;">
                <option value="0">Izaberi korisnika...</option>
                @foreach($data as $d)
                    <option value="{{$d->id}}">{{$d->first_name}} {{$d->last_name}}</option>
                @endforeach
            </select>
            <br/>
            <input type="button" value="izbriši" id="deleteUser" class="form-control w3-left" style="width:100px;" />
            <br/>
            <br/>
        </form>
        <hr/>
        <h3>Postavite korisnika za admina</h3>
        <br/>
        <form>
            <select id="makeAdminId" class="form-control" style="width:300px;">
                <option value="0">Izaberi korisnika...</option>
                @foreach($data as $d)
                    <option value="{{$d->id}}">{{$d->first_name}} {{$d->last_name}}</option>
                @endforeach
            </select>
            <br/>
            <input type="button" value="postavi" id="makeAdmin" class="form-control w3-left" style="width:100px;" />
        </form>
    </div>
@endsection