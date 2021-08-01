@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">


                 @if ($posts->count()>0)



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
                @foreach($posts as $post)
                <tr>
                <th scope="row"> <img src="{{ $post->featured }}" alt="error" class="img-thumbnail" width="200px" height="200px">
                                </th>
                <th scope="row">{{$post->title}}</th>
              <td>  <a class="" href="{{route('post.edit' ,['id'=>$post->id])}}">
                <i class="fas fa-edit"></i>                   </a>    </td>

                <td><a class="" href="{{route('post.delete' ,['id'=>$post->id])}}">
                <i class="fas fa-trash-alt"></i>                  </a></td>

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
