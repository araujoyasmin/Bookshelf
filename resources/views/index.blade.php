@extends('adminlte::page')


@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3> Livros </h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th> ID</th>
                    <th> Nome</th>
                    <th> Autor</th>
                    <th> Gênero</th>
                    <th> Tenho</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td> {{$book->id}} </td>
                        <td> {{$book->name}} </td>
                        <td> {{$book->author}} </td>
                        <td> {{$book->genre}} </td>
                        <td> <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="check_{{$book->id}}">
                            <label class="custom-control-label" for="check_{{$book->id}}"></label>
                          </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection