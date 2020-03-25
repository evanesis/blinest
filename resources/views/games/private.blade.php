@extends('layouts.app')

@section('title')
  Blind-Test - {{ $game->title }}
@endsection

@section('description')
  Blind-Test - {{ $game->title }}. {{ $game->description }}
@endsection

@section('content')

   @if(Auth::check())
    <multiplayer :game="{{ $game->toJson() }}" :user="{{ Auth::user()->toJson() }}"></multiplayer>
  @else
    <game :game="{{ $game->toJson() }}"></game>
  @endif

  @if( (Auth::check() && Auth::user()->is('moderator')) || (Auth::check() && Auth::user() == $game->user))
    <section class="page-section bg-primary text-white text-center mb-0">
      <div class="container">

        <!-- About Section Heading -->
        <h2 class="page-section-heading text-uppercase">Ajoutes tes morceaux préférés</h2>

        <add-track :game="{{ $game }}"></add-track>
        

      </div>
    </section>
  @endif

@endsection