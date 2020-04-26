@extends('base')

@section('main')
<div class="row">
<div>
    <a style="margin: 19px;" href="{{ route('school.create')}}" class="btn btn-primary">Add school</a>
</div>  
<div class="col-sm-12">
    <h1 class="display-3">Schools</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Number</td>
          <td>Location</td>
          <td>Trustee</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($school as $sc)
        <tr>
            <td>{{$sc->id}}</td>
            <td>{{$sc->name}}</td>
            <td>{{$sc->email}}</td>
            <td>{{$sc->number}}</td>
            <td>{{$sc->location}}</td>
            <td>{{$sc->trustee}}</td>
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
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
{!! $school->links() !!}

@endsection
