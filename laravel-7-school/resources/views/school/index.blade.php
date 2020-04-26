@extends('base')

@section('main') 
<div class="row">
    <div class="col-sm-6">
      <h1 class="display-3">Schools</h1> 
    </div>

    <div class="col-sm-2">
      <a href="{{ route('school.create')}}" class="btn btn-primary">Add School</a>
   </div>  

   <div class="col-sm-4">
    <form action="/search" method="POST" role="search">
      {{ csrf_field() }}
      <div class="input-group">
      <input type="text" class="form-control" name="q"
            placeholder="Search school"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
      </div>
    </form>
  </div>
</div>

<div class="col-sm-12"> 

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Number</td>
          <td>Location</td>
          <!-- <td>Trustee</td> -->
          <td colspan = 3>Actions</td>
        </tr>
    </thead>
    <tbody>
    @if(isset($details))
    @foreach($details as $sc)
        <tr>
            <td>{{$sc->id}}</td>
            <td>{{$sc->name}}</td>
            <td>{{$sc->email}}</td>
            <td>{{$sc->number}}</td>
            <td>{{$sc->location}}</td>
            <!-- <td>{{$sc->trustee}}</td> -->
            <td>
                <a href="{{ route('school.edit',$sc->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('school.destroy', $sc->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td>
                <a href="{{ route('school.show',$sc->id)}}" class="btn btn-primary">View Details</a>
            </td>
        </tr>
    @endforeach
    @else
        @foreach($school as $sc)
        <tr>
            <td>{{$sc->id}}</td>
            <td>{{$sc->name}}</td>
            <td>{{$sc->email}}</td>
            <td>{{$sc->number}}</td>
            <td>{{$sc->location}}</td>
            <!-- <td>{{$sc->trustee}}</td> -->
            <td>
                <a href="{{ route('school.edit',$sc->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('school.destroy', $sc->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td>
                <a href="{{ route('school.show',$sc->id)}}" class="btn btn-primary">View Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
{!! $school ?? ''->links() !!}
@endif
@endsection
