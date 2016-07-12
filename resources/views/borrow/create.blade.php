@extends('layouts.app')

@section('content')
<div class="container">

    @include('flash.message')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add Borrow</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/borrows', 'class' => 'form-horizontal']) !!}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" class="control-label col-sm-1" for="name">Book:</label>
                            <div class="col-sm-9">
                                {{ Form::select('book', $books, null, ['class' => 'form-control book', 'placeholder' => 'Pick a book']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('member') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="member">Member:</label>
                            <div class="col-sm-9">
                                {{ Form::select('member', $users, null, ['class' => 'form-control member', 'placeholder' => 'Select the member']) }}

                                @if ($errors->has('member'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="date">Date Due:</label>
                            <div class="col-sm-9">
                                {!! Form::text('date', date('Y-m-d'), ['class' => 'form-control', 'id' => 'datepicker', 'placeholder' => date('m/d/Y')]) !!}

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-9">
                                {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        })
        
        $(".book").select2({
            placeholder: "Select a book",
            allowClear: true
        });

        $(".member").select2({
            placeholder: "Select a member",
            allowClear: true
        });
    });
</script>
@endsection
