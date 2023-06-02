@extends('index')

@section('content')

<div class="viewContainer">
    <span class="gobackBtn">
        <i class="fa fa-regular fa-arrow-left"></i>
        <a class="redirectLinks" href="/">Home</a>
    </span>
    <span class="viewField">
        <h2>Status Id:</h2>
        <p class="textAns">{{ $status->id }}</p>
    </span>
    <span class="viewField">
        <h2>Status Title:</h2>
        <p class="textAns">{{ $status->title }}</p>
    </span>
    <span class="viewField">
        <h2>Status Description:</h2>
        <p class="textAns">{{ $status->description }}</p>
    </span>
    <span class="viewField">
        <h2>Status Slug:</h2>
        <p class="textAns">{{ $status->slug }}</p>
    </span>
</div>

@stop