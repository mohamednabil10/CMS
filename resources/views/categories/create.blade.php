@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create category</div>

                <div class="card-body">
                    
                      @if(count($errors)>0) 

                <ul class="navbar-nav mr-auto">
            @foreach ($errors->all() as $error)

        <li class= "nav-item active">
        
                {{$error}}
        
        </li> 
        
        @endforeach
        
        
        </ul>
                    

               @endif




                    <form action="{{route('category.store')}}" method="POST" >
                         {{csrf_field()}}
                    <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" name="name" placeholder="type here">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">save</button>
                    
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
