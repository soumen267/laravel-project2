@extends('layouts.app')
@section('content')
@push('style')
<style>
    :root {
      box-sizing: border-box;
    }
    h1 {
      font-family: cursive;
    }
    
    .container {
      display: flex;
      width: 100%;
    }
    
    .column-1 {
      flex-shrink: 0; /* shrinks to 0 to apply 70% width*/
      flex-basis: 70%; /* sets initial width to 70%*/
    }
    
    .box {
      /* background-color: rgb(245, 215, 160); */
      padding: 10px;
      border-radius: 2px;
      /* border: 1px solid rgb(116, 113, 113); */
      margin: 1rem;
      /* box-shadow: 1px 1px 1px #000; */
    }
    
    @media only screen and (max-width: 900px) {
      .container {
        flex-direction: column;
      }
    
      .box {
        margin: 0 0 1rem;
      }
      .box5{
        border: 1px solid black;
      }
    }
</style>
@endpush

<div class="container">
      <div class="column-2 box">
        <h4>Setting</h4>
        <a href="http://">Profile</a><br/>
        <a href="http://">Account</a><br/>
        <a href="http://">Import</a><br/>
      </div>
      <div class="column-1 box">
        <h3 style="border: 1px solid black;background-color: cornflowerblue;" class="px-2">Edit Profile</h3>
        <a class="d-flex align-self-center" href="#">
            @if($userData->image)
            <img src="{{ asset("public/image/".$userData->image) }}" alt="Img">
            @else
            <img src="{{ asset("storage/user_images.jpg") }}" alt="Img">
            @endif
        </a>
        <form action="{{ route("user.update") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="media-body">
            @if(isset($userData->firstname))
            <h5>{{ ucfirst($userData->firstname) ?? '' }}</h5>
            @endif
            @if(isset($userData->id))
            <input type="hidden" name="id" value="{{ $userData->id }}">
            @endif
            <input type="file" name="image" id="image" accept="image/*"><br/><br/>
            <input type="submit" value="Edit" class="btn btn-primary">
        </div>
        </form>
      </div>
</div>
@endsection