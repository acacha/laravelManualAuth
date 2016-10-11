@extends('layouts.app')

@section('htmlheader_title')
    Títol de la pàgina
@endsection

@section('main-content')
    Hola {{ $user->name }} {{ $user->sn1 }}
@endsection