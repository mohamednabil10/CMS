@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create post</div>

                <div class="card-body">

                      @if($errors->count()>0)

                <ul class="navbar-nav mr-auto">
            @foreach ($errors->all() as $error)

        <li class= "nav-item active">

                {{$error}}

        </li>

        @endforeach


        </ul>


               @endif




                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                         {{csrf_field()}}

                    <div class="form-group">
                    <label for="category_id">category</label>
                    <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $category)

                    <option value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach
                    </select>
                    </div>

                    <div class="form-check">
                        @foreach ( $tags as $tag )


                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          {{ $tag->tag }}
                        </label> <br>
                        @endforeach
                      </div>


                    <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="type here">
                    </div>

                    <div class="form-group">
                    <label for="content">Descreption</label>
                    <textarea class="form-control" name="content" rows="10" cols="10"></textarea>
                    </div>


                    <div class="form-group">
                    <label for="featured">photo</label>
                    <input type="file" class="form-control" name=featured>
                    </div>
                    <button type="submit" class="btn btn-primary">save</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
