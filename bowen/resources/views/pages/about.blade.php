@extends('layouts.main')
@section('nav')
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/index" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/comments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/gallery" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galerija</a>
        <a href="/reg" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Registracija</a>
        <a href="/about" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">O autoru</a>
        <hr/>
        <form action="/login" method="post">
            @csrf
            <input type="text" name="login_email" placeholder="email" class="form-control" />
            <br/>
            <input type="password" name="login_pass" placeholder="password" class="form-control"/>
            <br/>
            <input type="submit" value="login" class="form-control" style="width:70px;"/>
        </form>
        <br/>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        @if(session('poruka'))
            {{session('poruka')}}
        @endif
    </div>
@endsection
@section('content')
    <div class="w3-container" id="services" style="margin-top:75px;min-height: 530px;">
        <h1>O autoru</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <div class="row">
            <div class="col-md-4">
                <img src="{{'images/me.png'}}" alt="slika"/>
            </div>
            <div class="col-md-8">
                <p>
                    Moje ime je Nikola Crvenkov. Rodjen u Pančevu 1997 godine u kojem i dan danas živim.
                    Pohađam Visoku ICT školu, smer Internet Tehnologije i trenutno sam na trećoj i završnoj godini.
                    Ovo je moj sajt za potrebe predmeta Web Programiranje PHP2. Nadam se da Vam se svideo.

                </p>
                <br/>
                <b>Kontakt email:</b>  nikolacrvenkov@gmail.com
                <br/>
                <br/>
                <b>Dokumentacija:</b>  <a href="{{asset('DokumentacijaBowen.pdf')}}">Dokumentacija</a>
            </div>
        </div>



    </div>
@endsection