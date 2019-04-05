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
    </div>
@endsection
@section('content')
    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1><b>Registration</b></h1>
        <br/>
        <br/>
        <br/>
        <form class="form-group" action="/registration" method="post">
            @csrf
            <label>First Name:</label>
            <input type="text" class="form-control" name="first_name"/>
            <br/>
            <label>Last Name:</label>
            <input type="text" class="form-control" name="last_name"/>
            <br/>
            <label>E-mail:</label>
            <input type="text" class="form-control" name="email"/>
            <br/>
            <label>Password:</label>
            <input type="password" class="form-control" name="password"/>
            <br/>
            <input type="submit" value="submit" class="form-control w3-right" style="width:100px;"/>
        </form>
        <br/>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
    </div>

@endsection