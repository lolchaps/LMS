@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash.message')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Borrowed Book List</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Book Details</td>
                            <td>Borrower Details</td>
                            <td>Date Borrowed</td>
                            <td>Due Date</td>
                            <td>Date Returned</td>
                            <td>Violation</td>
                            <td>Status</td>
                            <td>Actions</td>
                        </tr>

                        @foreach($users as $user)
                            @foreach($user->borrowed as $borrowed)
                                <tr>
                                    <td>{{ $borrowed->name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $borrowed->pivot->borrowed_date }}</td>
                                    <td>{{ $borrowed->pivot->return_date }}</td>
                                    <td>{{ $borrowed->pivot->returned_date }}</td>
                                    <td></td>
                                    <td>
                                        @if($borrowed->pivot->status)
                                            <span class="label label-success">Returned</span>
                                        @else
                                            <span class="label label-warning">Not Returned</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs">Settings</button>
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Return</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
