@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Book Details</td>
                            <td>Borrower Details</td>
                            <td>Date Borrowed</td>
                            <td>Date Due</td>
                            <td>Date Returned</td>
                            <td>Violation</td>
                            <td>Status</td>
                        </tr>

                        @foreach($users as $user)
                            @foreach($user->books as $book)
                                <tr>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $book->pivot->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $book->pivot->return_date }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
