@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash.message')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Books</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>#</td>
                            <td>Book</td>
                            <td>Author</td>
                            <td>Publisher</td>
                            <td>Edition</td>
                            <td>Stock</td>
                            <td></td>
                        </tr>

                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->edition }}</td>
                            <td>{{ $book->stock }} - {{ $book->instock }} in stock</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs">Settings</button>
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ action('ReserveController@store', $book->id) }}">Reserve</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection