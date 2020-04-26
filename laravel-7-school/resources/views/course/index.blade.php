@extends('base')

@section('main')
<div class="row">
 
    <div class="col-sm-8">
      <h1 class="display-3">Courses</h1> 
    </div>

    <div class="col-sm-4">
      <a href="{{ route('course.create')}}" class="btn btn-primary">Add Course</a>
   </div>  

    <div class="col-sm-12"> 
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Duration</td>
          <td>Professor</td>
          <td>Fees</td>
          <td colspan = 3>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($course as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->cname}}</td>
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
            <td>
                <a href="{{ route('course.show',$c->id)}}" class="btn btn-primary">View Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  {!! $course ?? ''->links() !!}
</div>
@endsection
