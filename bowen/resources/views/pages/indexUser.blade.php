@extends('layouts.main')
@section('nav')
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/indexUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/userComments/{{session()->get('user')[0]->id}}" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/galleryUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galerija</a>
        <hr/>
        <a href="/userPage/{{session()->get('user')[0]->id}}" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">User strana</a>
        <a href="/appointments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Zakazi termin</a>
        <a href="/logout" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
    </div>
@endsection
@section('content')
    <div class="w3-container" id="services" style="margin-top:75px">
        <h1 class="w3-xxxlarge"><b>O bowenu</b></h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <p>Naše telo je u konstantnom kretanju i svoj balans održava stalnim protokom informacija sa periferije tela do centralnog nervnog sistema i nazad ka periferiji. Istovremeno, mehanizam po kome funkcioniše je podešen tako da se svi disbalansi u telu popravljaju čim ih telo uoči (npr. zarastanje površinskih rana). Međutim, ponekad je stanje takvo da mozak, zbog stresa ili različitih spoljašnjih uticaja, ne može da prepozna kom delu tela je potrebna njegova intervencija.
            Zbog tog prekida u komunikaciji dolazi do poremećaja funkcije tela koje se brine za normalizaciju stanja (održavanje homeostaze) kod različitih disbalansa. Posledice toga mogu biti bol, smanjena funkcija određenog dela tela, različite bolesti, problemi sa spavanjem, osećaj nezadovoljstva, umora itd...
        </p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('images/bwt.jpg')}}" alt="slika"/>
        </div>
        <div class="col-md-6">
            <p>Bowen terapeutska tehnika, kao tehnika komplementarne medicine, primenjuje se zajedno sa propisanim oblicima lečenja
                (a ne umesto njih) ili samostalno u vidu preventivnih postupaka u cilju očuvanja zdravlja. Bowen terapija je holistička terapija,
                potpuno prirodna, neinvazivna , bez kontraindikacija. Može se primenjivati kod osoba svih uzrasta (od beba do starijih osoba).
                Njenom primenom se aktiviraju mehanizmi u telu koje se primljenim porukama podstiče da samo sebe dovede u ravnotežu i to na fizičkom,
                emotivnom i mentalnom nivou.</p>
            </p>
        </div>
    </div>
    <br/>
    <br/>
    <h1><b>Šta Bowen tehnika može uraditi za Vas?</b></h1>
    <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
    <br/>

    <table class="table">
        <tr>
            <th>Mišićno-skeletni problemi:</th>
            <td>bolovi u ledjima, bratu, ramenima, teniski lakat, problemi sa kukovima, kolenima, stopalima, čukljevima, degenerativna reumatološka stanja..</td>
        </tr>
        <tr>
            <th>Problemi sa endokrinim sistemom:</th>
            <td>dijabetes, hiper i hipo funkcija štitne žlezde, ostali hormonski problemi</td>
        </tr>
        <tr>
            <th>Neurološka stanja:</th>
            <td>išijalgija, diskus hermija, moždani udar, Parkinsonova bolest, multipla skleroza, cerebralna paraliza</td>
        </tr>
        <tr>
            <th>Ginekološki problemi:</th>
            <td>sterilitet, neregularni menstrualni ciklus, PMS, ciste, fibromi na jajnicima, fibrocistične dojke</td>
        </tr>
        <tr>
            <th>Problemi sa unutrašnjim organima:</th>
            <td>astma, alsergije, bronhitis, sinuzitis, opstipacija, dijareja, grčevi, gastritis, problemi sa jetrom, žučnom kesom, zadržavanje tečnosti, kamen i pesak u bubregu, problemi sa kardio-vaskularnim sistemom..</td>
        </tr>
        <tr>
            <th>Kod beba:</th>
            <td>kolike(grčevi), refluks(bljuckanje), uznemirene bebe, bebe sa problemom ishrane, simptomi astme, tortikolis, hemipareza, hipertonus, cerebralna paraliza</td>
        </tr><tr>
            <th>Ostalo:</th>
            <td>poremećaji imunog sistema, sindrom hroničnog umora, tegobe vezane za stres, depresija, vrtoglavica, noćno mokrenje, ADD/ADHA kod dece...</td>
    </table>
    <h3>i još mnogo toga !</h3>

    <br/>
    <br/>
    <h1><b>Istorija tehnike</b></h1>
    <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
    <br/>

    <div class="row">
        <div class="col-md-7">
            <p>Ovu tehniku razvio je Tom Bowen (1916-1982) iz Viktorije u Australiji. Iako je bio veoma jednostavan i skroman čovek,
                njegova ljubav i želja da pomogne svakome kome je to potrebno dovele su do otkrića ove jedinstvene terapeutske metode.
                Tom je proučavao mnogobrojne metode komplementarne medicine i intuitivno integrisao ono što je osećao da je najefikasnije.
                Bio je nadaren, čovek sa iskrenim razumevanjem za ljudske patnje i za otkrivanje uzroka njihovih problema.
                Zato je i postao proslavljeni terapeut za koga zvanični statistički podaci kažu da je tretirao dnevno čak 60 pacijenata (oko 13.000 godišnje).
                Kada bi ga u toku noći pozvali zbog nekog kritičnog slučaja, bez oklevanja bi se uputio u kućnu posetu a svoj tretman nikada nije hteo da naplati deci i
                odraslima sa posebnim potrebama kao ni osobama koje to nisu mogle da priušte.
                Najvećom nagradom je smatrao olakšsanje i oporavak kod osoba kojima je bila potrebna pomoć. </p>
        </div>
        <div class="col-md-5">
            <img src="{{asset('images/tom.jpg')}}" width="400px" alt="slika"/>
        </div>
    </div>
    <br/>
    <p>
        Tokom 1974. godine Tom je pozvao Oswalda Rentscha da vežba sa njim i da dokumentuje ono što on radi.
        Od ukupno šest ljudi na koje je preneo svoje znanje o tehnici Tom je samo njega odabrao da podučava i nastavi sa širenjem tehnike širom sveta.
        Četiri godine nakon Tomove smrti, 1986. Oswald i njegova supruga su počeli ovu tehniku da prenose ljudima na nekoliko kontinenata.
        Bowen tehnika je u Australiji priznata od strane državnog i mnogih privatnih zdravstvenih osiguranja,
        a do polovine osamdesetih godina se podučava i primenjuje u mnogim zemljama širom sveta.
        Bowen tehnika je sada jedna od metoda komplementarne terapije koja u Evropi beleži najbrži rast.
    </p>
@endsection