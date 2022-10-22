@extends('layouts.app')


@section('content')
<div class="container p-5 my-3 bg-light text-black">
    <h1>All Blogs </h1>
    <p>your can see all blogs here</p>
    
 
      </p>
  </div>
  <div class="container">
    <table class="table ">
        
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">subject</th>
            <th scope="col">description</th>
            
          </tr>
        </thead>
        <tbody class="table table-group-divider table-light ">
            @php
                $i=0;
            @endphp
            @foreach($post as $item)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$item->subject}}</td>
                <td>{{$item->Description}}</td>
               
              </tr>
            @endforeach
          
        </tbody>
      </table>


{{!!$post->links()!!}}
  </div>
@endsection