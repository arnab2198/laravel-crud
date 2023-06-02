@extends('index')

@section('content')

<div class="tableContainer">

    @if($message = Session::get('success'))
    <div class="successFlash">{{ $message }}</div>
    @endif

    @if($errors->has('idNotFound'))
    <div class="errorFlash">{{ $errors->first('idNotFound') }}</div>
    @endif

    <h1 class="listHeading">All Status</h1>

    <div class="btnTextContainer">
        <h1 class="totalTaskText">Total status: {{ $total_status }}</h1>
        <span>
            <a class="redirectLinks" href="/status/create">New Status</a>
            <i class="fa fa-regular fa-arrow-right"></i>
        </span>
    </div>
    <table class="listTable">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Created At</th>
                <th class="actionCol">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statuses as $status)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $status->title }}</td>
                <td>{{ $status->description }}</td>
                <td>{{ $status->slug }}</td>
                <td>{{ $status->created_at }}</td>
                <td>
                    <a class="actionLink" href="/status/update/{{ $status->id }}">
                        <i class="fa fa-light fa-pen"></i>
                        Edit
                    </a>
                    <a class="actionLink" href="/status/view/{{ $status->id }}">
                        <i class="fa fa-light fa-eye"></i>
                        View
                    </a>
                    <form class="formAction" method="POST" action="/status/delete/{{ $status->id }}">
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

            @if(count($statuses) < 1) <tr class="noDataFound">
                <td class="tdNoData" colspan="6">No status found</td>
                </tr>
                @endif
        </tbody>
    </table>
    <div class="paginationContainer">
        {{ $statuses->links() }}
    </div>
</div>

@stop