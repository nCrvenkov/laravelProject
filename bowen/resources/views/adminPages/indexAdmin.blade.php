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
        <h1>Ip adrese koje se loguju na admin stranu:</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <ul>
            @foreach($ip as $i)
                <li>
                    <h5>
                        {{$i->ip}}
                    </h5>
                </li>
            @endforeach
        </ul>
        <br/>
        <hr/>
        <br/>
        <h1>Zakazani termini</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <table class="table">
            <tr>
                <th>
                    Ime
                </th>
                <th>
                    Prezime
                </th>
                <th>
                    Datum
                </th>
                <th>
                    Vreme
                </th>
            </tr>
            @foreach($termini as $t)
            <tr>
                <td>
                    {{$t->first_name}}
                </td>
                <td>
                    {{$t->last_name}}
                </td>
                <td>
                    {{$t->date}}
                </td>
                <td>
                    {{$t->termin}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection