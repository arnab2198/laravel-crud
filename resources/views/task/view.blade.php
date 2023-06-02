@extends('index')

@section('content')

<div class="viewContainer">
    <span class="gobackBtn">
        <i class="fa fa-regular fa-arrow-left"></i>
        <a class="redirectLinks" href="/">Home</a>
    </span>
    <span class="viewField">
        <h2>Task Id:</h2>
        <p class="textAns">{{ $task->id }}</p>
    </span>
    <span class="viewField">
        <h2>Task Title:</h2>
        <p class="textAns">{{ $task->title }}</p>
    </span>
    <span class="viewField">
        <h2>Task Description:</h2>
        <p class="textAns">{{ $task->description }}</p>
    </span>
    <span class="viewField">
        <h2>Task Status:</h2>
        <p class="textAns">
            @if($task->status === 'PENDING')
            <td>Pending</td>
            @elseif($task->status === 'IN_PROGRESS')
            <td>In Progress</td>
            @elseif($task->status === 'COMPLETED')
            <td>Completed</td>
            @endif
        </p>
    </span>
</div>

@stop