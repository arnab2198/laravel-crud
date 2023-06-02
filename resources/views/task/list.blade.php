@extends('index')

@section('content')

<div class="tableContainer">

    @if($message = Session::get('success'))
    <div class="successFlash">{{ $message }}</div>
    @endif

    @if($errors->has('idNotFound'))
    <div class="errorFlash">{{ $errors->first('idNotFound') }}</div>
    @endif

    <h1 class="listHeading">All Tasks</h1>

    <div class="btnTextContainer">
        <h1 class="totalTaskText">Total task: {{ $total_task }}</h1>
        <span>
            <a class="redirectLinks" href="/task/create">New Task</a>
            <i class="fa fa-regular fa-arrow-right"></i>
        </span>
    </div>
    <table class="listTable">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created At</th>
                <th class="actionCol">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status->title }}</td>
                <td>{{ $task->created_at }}</td>
                <td>
                    <a class="actionLink" href="/task/update/{{ $task->id }}">
                        <i class="fa fa-light fa-pen"></i>
                        Edit
                    </a>
                    <a class="actionLink" href="/task/view/{{ $task->id }}">
                        <i class="fa fa-light fa-eye"></i>
                        View
                    </a>
                    <form class="formAction" method="POST" action="/task/delete/{{ $task->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="deleteBtn" class="actionLink">
                            <i class="fa fa-light fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach

            @if(count($tasks) < 1) <tr class="noDataFound">
                <td class="tdNoData" colspan="6">No task found</td>
                </tr>
                @endif
        </tbody>
    </table>
    <div class="paginationContainer">
        {{ $tasks->links() }}
    </div>
</div>

@stop