@extends('layout')


@section('content')
<div class="container p-5 my-3 bg-light text-black">
    <h1>All Blogs </h1>
    <p>yout can see all blogs here</p>
    <a class="btn btn-primary" href="{{route('create')}}">New Blog</a>
    <p class=" container text-success">
      @if ($message=Session::get('success'))
      {{$message}}
      @endif 
 
      </p>
  </div>
  <div class="container">
    <table class="table">
        
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">subject</th>
            <th scope="col">description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider table-light">
            @php
                $i=0;
            @endphp
            @foreach($post as $item)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$item->subject}}</td>
                <td>{{$item->Description}}</td>
                <td>
                  <div class="row">
                    <div class="col">
                      <a class="btn btn-success" href="{{route('edit',$item->id)}}">edit</a>
                    </div>
                    
                    <div class="col">
                      <form action="{{route('destroy',$item->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                    </div>
                  </div>
                 
                 
               
                
                </td>
              </tr>
            @endforeach
          
        </tbody>
      </table>


{{!!$post->links()!!}}
  </div>
@endsection