@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">


                 @if ($users->count()>0)



            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <th scope="row"> <img src="" alt="error" class="img-thumbnail" width="200px" height="200px">
                                </th>
                <th scope="row">{{$user->name}}</th>


                  @if($user->admin)

                  <td><a class="" href="{{route('user.not.admin' ,['id'=>$user->id])}}">
                    delete admin                 </a></td>

                  @else

                  <td>  <a class="" href="{{route('user.admin' ,['id'=>$user->id])}}">
                    admin                   </a>    </td>

                  @endif





                </tr>

                @endforeach

                @else

                <p scope="row" class="text-center">No Posts</p>
                @endif
            </tbody>
            </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
