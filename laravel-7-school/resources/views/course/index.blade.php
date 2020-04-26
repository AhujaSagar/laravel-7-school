@extends('base')

@section('main')
<div class="row">
<div>
    <a style="margin: 19px;" href="{{ route('course.create')}}" class="btn btn-primary">Add Course</a>
</div>  
<div class="col-sm-12">
    <h1 class="display-3">Courses</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Duration</td>
          <td>Professor</td>
          <td>Fees</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($course as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->duration}} Months</td>
            <td>{{$c->professor}}</td>
            <td>{{$c->fees}}</td>
            <td>
                <a href="{{ route('course.edit',$c->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('course.destroy', $c->id)}}" method="post">
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
@endsection
