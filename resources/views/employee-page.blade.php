@extends('layout.app')
@section('content')
    @include('components.list-employee')
    @include('components.create-employee')
    @include('components.edit-employee')
    @include('components.delete-employee')
@endsection