@extends('layouts.app')

@section('content')
    <h1 class="my-5">{{ $character->name }}</h1>
    <img src="{{ $character->image  }}" alt="{{ $character->name }}"> <br>
    <img width="150" src="{{ asset('storage/' . $character->thumb_path) }}" alt="{{ $character->name }}">
    <p>Specie: {{ $character->species }}</p>
    <p>Type: {{ $character->type }}</p>
    <p>Gender: {{ $character->gender }}</p>
    <p>Original Name: {{ $character->origin_name }}</p>
    <p>Location Name: {{ $character->location_name }}</p>


@endsection
