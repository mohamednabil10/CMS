@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tags</div>

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

                @foreach($tags as $tag)
                <tr>
                <th scope="row">{{$tag->tag}}</th>
                <td>  <a class="" href="{{route('tag.edit' ,['id'=>$tag->id])}}">

                <i class="fas fa-edit"></i>                   </a>    </td>
                <td><a class="" href="{{route('tag.delete' ,['id'=>$tag->id])}}">

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
