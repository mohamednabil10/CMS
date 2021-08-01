@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">categories</div>

                <div class="card-body">
                    

            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($categories as $categotry)
                <tr>
                <th scope="row">{{$categotry->name}}</th>
                <td>  <a class="" href="{{route('category.edit' ,['id'=>$categotry->id])}}">
            
                <i class="fas fa-edit"></i>                   </a>    </td>
                <td><a class="" href="{{route('category.delete' ,['id'=>$categotry->id])}}">
            
                <i class="fas fa-trash-alt"></i>                  </a></td>
                
                </tr>

                @endforeach
            </tbody>
            </table>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
