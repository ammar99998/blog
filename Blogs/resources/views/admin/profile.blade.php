@extends('layouts.app')


@section('content')


    <form action="{{route('profile.update',Auth::user()->id)}}" methed="POST" >
      @csrf
      @method('PUT') 
    <div class="container">
        <div class="mb-3">
            <label for="examp_address" class="form-label">Gender</label>
            <input type="text"  name="gender" class="form-control" value="{{$pro->gender}}" id="examp_address" aria-describedby="emailHelp">
            
          </div>
          <div class="mb-3">
            <label for="examp_address" class="form-label">Address</label>
            <input type="text"  name="address" class="form-control" value="{{$pro->address}}" id="examp_address" aria-describedby="emailHelp">
            
          </div>
          
          <div class="mb-3">
            <label for="examplebio" class="form-label">Bio</label>

            <textarea type="text" class="form-control" rows="4" id="examplebio" name="bio">{{$pro->bio}}</textarea>
          </div>
        
          <button type="submit" class="btn btn-primary">save</button>
        </form>
        
    </div>
    

@endsection