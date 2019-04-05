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
@if($user[0]->id == session()->get('user')[0]->id)
    @section('content')
        <div class="w3-container" style="margin-top:80px" id="showcase">
            <h1><b>{{$user[0]->first_name}} {{$user[0]->last_name}}</b></h1>
            <h4>Registrovan: {{$user[0]->registration_date}}</h4>
            <hr/>
            <br/>
            @if($bookings === 0)
                <h3>Nemate zakazanih termina za bowen tretmane</h3>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            @else
                <h3>Vaši zakazani termini za bowen tretmane</h3>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
                <table class="table">
                    <tr>
                        <th>
                            Datum
                        </th>
                        <th>
                            Vreme
                        </th>
                    </tr>
                    @foreach($bookings as $b)
                        <tr>
                            <td>
                                {{$b->date}}
                            </td>
                            <td>
                                {{$b->termin}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

            <br/>
            <hr/>
            <h3>Vaš komentar</h3>
            <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            @if($comment === 0)
                <b>Niste postavili komentar</b>
                <br/>
            @else
                <div>
                    <i class="material-icons w3-right w3-xxlarge" id="deleteComment" data-id="{{$comment[0]->id}}" style="cursor:pointer;">close</i>
                    <h5>{{$comment[0]->date}}</h5>
                    <p> {{$comment[0]->comment}} </p>
                </div>
            @endif
            <br/>
            <hr/>
            <h3>Izmenite Vaše podatke</h3>
            <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            <form class="form-group" method="post" action="/changeUserData">
                @csrf
                <label>First name</label>
                <input type="text" name="updateFirstName" value={{$user[0]->first_name}} class="form-control"/>
                <br/>
                <label>Last name</label>
                <input type="text" name="updateLastName" value={{$user[0]->last_name}} class="form-control"/>
                <br/>
                <label>E-mail</label>
                <input type="text" name="updateEmail" value={{$user[0]->email}} class="form-control"/>
                <br/>
                <input type="hidden" value="{{$user[0]->id}}" name="dataUserId"/>
                <input type="submit" value="izmeni" class="form-control w3-right" name="btnChangeData" style="width:100px;"/>
                <br/>
            </form>
            <br/>
            <hr/>
            <h3>Izmenite Vašu lozinku</h3>
            <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            <form class="form-group" action="/changePassword" method="post">
                @csrf
                <label>Stara lozinka</label>
                <input type="hidden" id="oldPass" value="{{$user[0]->password}}" />
                <input type="password" id="oldPassConfirm" class="form-control"/>
                <br/>
                <label>Nova lozinka</label>
                <input type="password" name="newPass" id="newPass" disabled class="form-control"/>
                <br/>
                <input type="hidden" value="{{$user[0]->id}}" name="passUserId"/>
                <input type="submit" value="izmeni" class="form-control w3-right" style="width:100px;"/>
            </form>
            <br/>
            <br/>
            <hr/>
            <br/>
            <h3>Poruke:
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            @if(!empty($adminAnswer))
                <h4>Odgovor admina:</h4>
                @foreach($adminAnswer as $a)
                    <label>{{$a->date}}</label><p>{{$a->message}}</p>
                @endforeach
            @endif
            <br/>
            <h4>Pošaljite poruku administratoru</h4>
            <br/>
            <div>
                <form class="form-group" action="/sendMessage" method="post">
                    @csrf
                    <textarea class="form-control" name="message" >

                    </textarea>
                    <br/>
                    <input type="hidden" value="{{session()->get('user')[0]->id}}" name="acc_id"/>
                    <input type="submit" class="form-control w3-right" style="width:100px;" value="posalji"/>
                </form>
            </div>
        </div>
    @endsection
@else
    @section('content')
        <div class="w3-container" style="margin-top:80px;min-height: 530px;" id="showcase">
            <h1><b>{{$user[0]->first_name}} {{$user[0]->last_name}}</b></h1>
            <h4>Registrovan: {{$user[0]->registration_date}}</h4>
            <hr/>
            <br/>
            @if($bookings === 0)
                <h3>Korisnik nema zakazanih termina za bowen tretmane</h3>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            @else
                <h3>Korisnikovi zakazani termini za bowen tretmane</h3>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
                <table class="table">
                    <tr>
                        <th>
                            Datum
                        </th>
                        <th>
                            Vreme
                        </th>
                    </tr>
                    @foreach($bookings as $b)
                        <tr>
                            <td>
                                {{$b->date}}
                            </td>
                            <td>
                                {{$b->termin}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
            <br/>
            <hr/>
            <h3>Komentar</h3>
            <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            @if($comment === 0)
                <b>Korisnik nije postavio komentar</b>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
                <br/>
            @else
                <div>
                    <h5>{{$comment[0]->date}}</h5>
                    <p> {{$comment[0]->comment}} </p>
                </div>
            @endif
        </div>
    @endsection
@endif
