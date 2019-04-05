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
    <div style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1>Poruke za administratora</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <br/>
        <table class="table">
            <tr>
                <th>
                    Ime
                </th>
                <th>
                    Prezime
                </th>
                <th>
                    Poruka
                </th>
                <th>
                    Datum
                </th>
                <th>
                </th>
                <th>

                </th>
            </tr>
            @foreach($data as $d)
            <tr>
                <td>
                    {{$d->first_name}}
                </td>
                <td>
                    {{$d->last_name}}
                </td>
                <td>
                    {{$d->message}}
                </td>
                <td>
                    {{$d->date}}
                </td>
                <td>
                    <input type="button" class="form-control answerMessage" value="odgovori" data-id="{{$d->acc_id}}"/>
                </td>
                <td>
                    <input type="button" class="form-control answerMessage" value="obrisi" data-id="{{$d->id}}"/>
                </td>
            </tr>
            @endforeach
        </table>
        <br/>
        <br/>
        <div style="visibility:hidden" id="answerDiv">
            <form action="/answer" method="post">
                @csrf
                <textarea class="form-control" name="answerMessage">

                </textarea>
                <br/>
                <input type="hidden" name="acc_id" id="acc_id" />
                <input type="submit" value="odgovori" class="form-control w3-right" style="width:100px;"/>
            </form>
        </div>
    </div>
@endsection