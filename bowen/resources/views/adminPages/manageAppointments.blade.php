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
        <h1>Upravljanje terminima</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <br/>
        <h3>Ubacite novi bowen termin</h3>
        <form action="/insertAppointment" method="post">
            @csrf
            <input type="text" style="width:300px;" class="form-control" placeholder="14:00 - 15:30" name="termin"/>
            <br/>
            <input type="submit" value="ubaci" class="form-control w3-left" style="width:100px;" />
        </form>
        <br/>
        @if($errors->any())
            @foreach($errors->all() as $e)
                <li>{{$e}}</li>
            @endforeach
        @endif
        <br/>
        <hr/>
        <h3>Izbrišite termin</h3>
        <br/>
        <form action="/deleteTermin" method="get">
            <select class="form-control" name="deleteTerminId" style="width:300px;">
                <option>Izaberite termin...</option>
                @foreach($data as $d)
                    <option value="{{$d->id}}">{{$d->termin}}</option>
                @endforeach
            </select>
            <br/>
            <input type="submit" value="izbriši" class="form-control w3-left" style="width:100px;" />
        </form>
        <br/>
        <br/>
        <hr/>
        <h3>Izmenite termin</h3>
        <br/>
        <form action="/updateAppointment" method="post">
            @csrf
            <select class="form-control" name="updateAppId" id="updateAppId" style="width:300px;">
                <option>Izaberite termin...</option>
                @foreach($data as $d)
                    <option value="{{$d->id}}">{{$d->termin}}</option>
                @endforeach
            </select>
            <br/>
            <div id="hiddenDivUpdate" style="visibility:hidden">
                <input type="text" style="width:300px;" placeholder="format -> 14:00 - 15:30" name="termin_update" class="form-control" />
                <br/>
                <input type="submit" value="izmeni" class="form-control w3-left" style="width:100px;" />
            </div>
        </form>
        @if($errors->any())
            @foreach($errors->all() as $e)
                <li>{{$e}}</li>
            @endforeach
        @endif
    </div>
@endsection