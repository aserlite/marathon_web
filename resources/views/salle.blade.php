@extends('layouts.app')

@section('viteLine')
@vite(['resources/scss/app.scss','resources/css/salle.css','resources/css/app.css','resources/js/app.js','resources/js/burger.js'])
@endsection

@section('content')

<div class="content" id="content">
    <a href=""></a>
    <div class="courant">
      <span class="numCourant" id="eltC1">III</span>
        <span class="nomCourant" id="eltC2">{{ $salle->nom }}<span>
        {!! $salle->description !!}
    </div>

    {{-- <a id="img1">
      <img src="images/joconde.jpeg" alt="images" >
    </a> --}}
        @php
            $i = 1;
        @endphp
        @forelse($oeuvres as $oeuvre)
            <a href="{{route('oeuvres.show', $oeuvre->id)}}" id="img{{$i}}">
                <img src="{{ asset('storage/'.$oeuvre->thumbnail_url) }}" alt="Miniature de l'oeuvre">
                {{-- par <a href="?auteur={{$oeuvre->auteur}}">{{ $oeuvre->auteur }}</a>. --}}
            </a>
            @php $i++;@endphp

        @empty
            Aucune œuvres trouvées dans la salle !
        @endforelse

    <ul class="SallesSuivantes">
        @forelse($sallessuivantes as $salle)
            <li>
                <a href="{{ route('salle.show', $salle->id) }}" class="liensSalles">Salle {{ $salle->nom }} ></a>
            </li>
        @empty
            <li>
                <p class="liensSalles">Aucune porte trouvée</p>
            </li>
        @endforelse
    </ul>

@endsection

