@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $book->name }}</div>

                <div class="panel-body">
                	Name: {{ $book->name }} <br>
                	Author: {{ $book->author }} <br>
                	Publisher: {{ $book->publisher }} <br>
                	Edition: {{ $book->edition }} <br>
                	Stock: {{ $book->stock }} <br>;.
                	InStock: {{ $book->instock }}b/l
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
