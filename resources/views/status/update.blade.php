@extends('index')

@section('content')

<div class="formContainer">
    <span>
        <i class="fa fa-regular fa-arrow-left"></i>
        <a class="redirectLinks" href="/status/list">Home</a>
    </span>
    <h1 class="formHead">Update Status #{{ $status->id }}</h1>
    <form method="POST" action="/status/edit/{{ $status->id }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $status->title) }}">
        </div>
        @if($errors->has('title'))
        <span class="errorText">{{ $errors->first('title') }}</span>
        @endif
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $status->description) }}</textarea>
        </div>
        @if($errors->has('description'))
        <span class="errorText">{{ $errors->first('description') }}</span>
        @endif
        <button type="submit" class="submitBtn">Submit</button>
    </form>
</div>

@stop