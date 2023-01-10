@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group row">
            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
            <select class="form-control" name="category_id" id="category_id">
                <option selected>Select one</option>
                @foreach ($data as $row)
                    <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="title" id="title" placeholder="Blog Title">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputName"></label>
            <div class="col-sm-12">
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputName"></label>
            <div class="col-sm-12">
                <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </div>
    </form>
</div>    
@endsection