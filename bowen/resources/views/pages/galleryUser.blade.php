@extends('layouts.main')
@section('nav')
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/indexUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/userComments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/galleryUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galerija</a>
        <hr/>
        <a href="/userPage/{{session()->get('user')[0]->id}}" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">User strana</a>
        <a href="/appointments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Zakazi termin</a>
        <a href="/logout" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
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
