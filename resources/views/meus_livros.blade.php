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
<div class="card card-secondary">
    <div class="card-header">
        <h3> Meus Livros </h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><span class="fas fa-fw fa-book"> </th>
                    
                    <th> Nome</th>
                    <th> Nota</th>
                    <th> Review</th>
                    <th> Status</th>
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
                            @if($book->status === 1)
                            <span class="fas fa-fw fa-check text-green " title="Lido">
                                                           
                            @elseif($book->status === 2)
                                <span class="fas fa-fw fa-history text-blue " title="Lendo">
                            @elseif($book->status === 3)
                                <span class="fas fa-fw fa-thumbs-up text-orange " title="Quero Ler">
                             @else
                            <span class="fas fa-fw fa-thumbs-down" title="Abandonado">
                            @endif
                            @if($book->fav === 1)
                            <span class="fas fa-fw fa-heart text-red" title="Favoritado">
                            @endif
                                
                        </span></td>
                        
                    </tr>
                    @endforeach
            </tbody>
        </table>

    </div>
</div>


    @endsection

  