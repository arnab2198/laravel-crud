@extends('index')

@section('content')

<div class="formContainer">
    <span>
        <i class="fa fa-regular fa-arrow-left"></i>
        <a class="redirectLinks" href="/">Home</a>
    </span>
    <h1 class="formHead">Create Task</h1>
    <form method="POST" action="/task/store">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        @if($errors->has('title'))
        <span class="errorText">{{ $errors->first('title') }}</span>
        @endif
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>
        @if($errors->has('description'))
        <span class="errorText">{{ $errors->first('description') }}</span>
        @endif
        <div>
            <label for="status">Status</label>
            <select name="status" id="status" value="{{ old('status') }}">
                @foreach($statuses as $status)
                <option value="{{ $status->id }}">{{ $status->title }}</option>
                @endforeach

                @if(count($statuses) < 1) <option value="">No status</option>
                    @endif

            </select>
        </div>
        @if($errors->has('status'))
        <span class="errorText">{{ $errors->first('status') }}</span>
        @endif
        <button type="submit" class="submitBtn">Submit</button>
    </form>
</div>

@stop