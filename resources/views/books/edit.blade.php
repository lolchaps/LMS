@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit: {{ $book->name }}</div>

                <div class="panel-body">
                    <form action="{{ action('BooksController@update', $book->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{  $book->name }}">
                        </div>

                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" name="author" value="{{ $book->author }}">
                        </div>

                        <div class="form-group">
                            <label for="publisher">Publisher:</label>
                            <input type="text" class="form-control" name="publisher" value="{{ $book->publisher }}">
                        </div>

                        <div class="form-group">
                            <label for="edition">Edition:</label>
                            <input type="text" class="form-control" name="edition" value="{{ $book->edition }}">
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock:</label>
                            <input type="text" class="form-control" name="stock" value="{{ $book->stock }}">
                        </div>

                      <button type="submit" class="btn btn-default">Update Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
