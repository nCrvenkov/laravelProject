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
    <div class="w3-container" style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1><b>Galerija</b></h1>
        <br/>
        <div class="row">
            @foreach($data as $d)
                @if($d->position === 'horizontally')
                    <div class="column">
                        <img src="{{asset('images/' . $d->path)}}" width="150px" alt="slika" onclick="myFunction(this);">
                    </div>
                @else
                    <div class="column">
                        <img src="{{asset('images/' . $d->path)}}" height="150px" alt="slika" onclick="myFunction(this);">
                    </div>
                @endif
            @endforeach

        </div>

        <!-- The expanding image container -->
        <div class="container">
            <!-- Close the image -->
            <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

            <!-- Expanded image -->
            <img id="expandedImg" style="width:100%">

        </div>
        <script>
            function myFunction(imgs) {
                // Get the expanded image
                var expandImg = document.getElementById("expandedImg");
                // Use the same src in the expanded image as the image being clicked on from the grid
                expandImg.src = imgs.src;
                // Show the container element (hidden with CSS)
                expandImg.parentElement.style.display = "block";
            }
        </script>
    </div>
@endsection