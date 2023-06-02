@extends('index')

@section('content')

<div class="formContainer">
    <span>
        <i class="fa fa-regular fa-arrow-left"></i>
        <a class="redirectLinks" href="/">Home</a>
    </span>
    <h1 class="formHead">Update Task #{{ $task->id }}</h1>
    <form method="POST" action="/task/edit/{{ $task->id }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}">
        </div>
        @if($errors->has('title'))
        <span class="errorText">{{ $errors->first('title') }}</span>
        @endif
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $task->description) }}</textarea>
        </div>
        @if($errors->has('description'))
        <span class="errorText">{{ $errors->first('description') }}</span>
        @endif
        <div>
            <label for="status">Status</label>
            <select name="status" id="status" value="{{ old('status', $task->status) }}">
                @foreach($statuses as $status)
                <option {{ $task->status->id == $status->id ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->title }}</option>
                @endforeach
            </select>
        </div>
        @if($errors->has('status'))
        <span class="errorText">{{ $errors->first('status') }}</span>
        @endif
        <button type="submit" class="submitBtn">Submit</button>
    </form>
</div>

@stop