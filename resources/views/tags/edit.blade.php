@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create tag</div>

                <div class="card-body">





                    <form action="{{route('tag.update', ['id' => $tags->id ])}}" method="POST" >
                         {{csrf_field()}}
                    <div class="form-group">
                    <label for="tag">Title</label>
                    <input type="text" class="form-control" name="tag" value="{{$tags->tag}}">
                    </div>

                    <button type="submit" class="btn btn-primary">update</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
