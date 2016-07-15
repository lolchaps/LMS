@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash.message')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Returned Book List</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Book Details</td>
                            <td>Borrower Details</td>
                            <td>Date Return</td>
                            <td>Due Date</td>
                            <td>Date Returned</td>
                            <td>Violation</td>
                            <td>Status</td>
                        </tr>

                        @foreach($users as $user)
                            @foreach($user->returned as $returned)
                                <tr>
                                    <td>{{ $returned->name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $returned->pivot->borrowed_date }}</td>
                                    <td>{{ $returned->pivot->return_date }}</td>
                                    <td>{{ $returned->pivot->returned_date }}</td>
                                    <td></td>
                                    <td>
                                        @if($returned->pivot->status)
                                            <span class="label label-success">Returned</span>
                                        @else
                                            <span class="label label-warning">Not Returned</span>
                                        @endif
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
