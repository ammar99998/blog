@extends('layout')


@section('content')
<div class="card container pt-5" style="padding-top:12%" >

    <div >you can update your blog</div>
  </div>
<div class="container">
    <form action="{{route('update',$blog->id)}}" methed="POST" >
        @csrf
        @method('PUT') 
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label"> Subject</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="subject" value="{{$blog->subject}}">

        </div>
        <div class="mb-3 " >
          <label for="exampleInputPassword1" class="form-label">Description  </label>
          <textarea type="text" class="form-control" rows="4" id="exampleInputPassword1" name="Description">{{$blog->Description}}</textarea>
        </div>
       
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>


</div>




@endsection