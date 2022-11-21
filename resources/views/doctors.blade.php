@extends('layout')

@section('doctors_active') active @endsection

@section('main_content')

    @foreach($doctors as $doctor)
        {{$doctor->DoctorFIO}}
        {{$doctor->speciality->speciality}}
    @endforeach
@endsection
