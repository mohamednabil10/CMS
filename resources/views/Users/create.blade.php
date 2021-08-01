@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create Usar</div>

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




                    <form action="{{route('user.store')}}" method="POST" >
                         {{csrf_field()}}
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="type here user">
                    </div>

                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="type here user email">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
