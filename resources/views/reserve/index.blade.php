@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash.message')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Reserved Book List</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Book Details</td>
                            <td>Borrower Details</td>
                            <td>Date Reserved</td>
                            <td>Status</td>
                            <td></td>
                        </tr>

                        @foreach($users as $user)
                          @foreach($user->pending as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $book->pivot->reserved_date }}</td>
                                <td>
                                    @if($book->pivot->status)
                                      <span class="label label-success">Approved</span>
                                    @else
                                      <span class="label label-primary">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs">Settings</button>
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ action('ReserveController@update', [$user->id, $book->id, $book->pivot->id]) }}">Approved</a></li>
                                            <li><a href="#">Cancel</a></li>
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