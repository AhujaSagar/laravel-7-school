@extends('base')

@section('main')
<div class="row"> 
    <div class="col-sm-8">
      <h1 class="display-3">Courses Offered</h1> 
    </div>

    <div class="col-sm-4">
      <a href="{{ route('courses_offered.create')}}" class="btn btn-primary">Enroll Course</a>
    </div>  

    <div class="col-sm-12">
      <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Course</td>
            <td>School</td>
          </tr>
      </thead>
      <tbody>
          @foreach($result as $i)
          <tr>
              <td>{{$i->id}}</td>
              <td>{{$i->course_id}}</td>
              <td>{{$i->school_id}}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  {!! $result ?? ''->links() !!}
</div>
@endsection
