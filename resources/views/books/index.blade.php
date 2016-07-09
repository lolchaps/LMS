@extends('layouts.app')

@section('content')
<div class="container">
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
                                        <li><a href="{{ action('BooksController@show', $book->id) }}">View</a></li>
                                        <li><a href="{{ action('BooksController@edit', $book->id) }}">Edit</a></li>
                                        <li><a href="{{ action('BooksController@destroy', $book->id) }}" data-method="delete">Delete</a>
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

@section('script')
<script>
(function() {

  var laravel = {
    initialize: function() {
      this.methodLinks = $('a[data-method]');

      this.registerEvents();
    },

    registerEvents: function() {
      this.methodLinks.on('click', this.handleMethod);
    },

    handleMethod: function(e) {
      var link = $(this);
      var httpMethod = link.data('method').toUpperCase();
      var form;

      // If the data-method attribute is not PUT or DELETE,
      // then we don't know what to do. Just ignore.
      if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
        return;
      }

      // Allow user to optionally provide data-confirm="Are you sure?"
      if ( link.data('confirm') ) {
        if ( ! laravel.verifyConfirm(link) ) {
          return false;
        }
      }

      form = laravel.createForm(link);
      form.submit();

      e.preventDefault();
    },

    verifyConfirm: function(link) {
      return confirm(link.data('confirm'));
    },

    createForm: function(link) {
      var form = 
      $('<form>', {
        'method': 'POST',
        'action': link.attr('href')
      });

      var token = 
      $('<input>', {
        'type': 'hidden',
        'name': '_token',
          'value': '<?php echo csrf_token(); ?>' // hmmmm...
        });

      var hiddenInput =
      $('<input>', {
        'name': '_method',
        'type': 'hidden',
        'value': link.data('method')
      });

      return form.append(token, hiddenInput)
                 .appendTo('body');
    }
  };

  laravel.initialize();

})();
</script>
@endsection
