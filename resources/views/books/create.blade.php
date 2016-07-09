@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash.message')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Book</div>
                <div class="panel-body">
                    <form action="{{ url('/books') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Book:</label>
                            <input type="text" class="form-control" name="name" placeholder="Book">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('author') ? ' has-error' : '' }}">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" name="author" placeholder="Author">

                            @if ($errors->has('author'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('author') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('publisher') ? ' has-error' : '' }}">
                            <label for="publisher">Publisher:</label>
                            <input type="text" class="form-control" name="publisher" placeholder="Publisher">

                            @if ($errors->has('publisher'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('publisher') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('edition') ? ' has-error' : '' }}">
                            <label for="edition">Edition:</label>
                            <input type="text" class="form-control" name="edition" placeholder="Edition">

                            @if ($errors->has('edition'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('edition') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label for="stock">Stock:</label>
                            <input type="text" class="form-control" name="stock" placeholder="Stock">

                            @if ($errors->has('stock'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('stock') }}</strong>
                                </span>
                            @endif
                        </div>

                      <button type="submit" class="btn btn-default">Add Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
