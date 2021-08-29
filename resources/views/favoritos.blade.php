@extends('adminlte::page')  

@section('title','Meus Livros')

@section('content')
<style type="text/css">


.checked{
    color:orange;
}
  </style>
<br/>
<br/>
<div class="card card-danger">
    <div class="card-header">
        <h3> Meus Favoritos </h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><span class="fas fa-fw fa-book"> </th>
                    
                    <th> Nome</th>
                    <th> Nota</th>
                    <th> Review</th>
                    <!--<th> Status</th>-->
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>  </td>
                        
                        <td> {{$book->book_name}} </td>
                        <td> 
                           
                            <span class="fa fa-star @if($book->rating >= 1) {{"checked"}} @endif"></span>
                            <span class="fa fa-star @if($book->rating >= 2) {{"checked"}} @endif"></span>
                            <span class="fa fa-star @if($book->rating >= 3) {{"checked"}} @endif "></span>
                            <span class="fa fa-star @if($book->rating >= 4) {{"checked"}} @endif"></span>
                            <span class="fa fa-star @if($book->rating == 5) {{"checked"}} @endif"></span>
                        </td>
                        <td> {{$book->review}} </td>
                        <td> 
                            
                          
                                
                        </td>
                        
                    </tr>
                    @endforeach
            </tbody>
        </table>

    </div>
</div>


    @endsection

  