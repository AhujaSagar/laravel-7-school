@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Get courses</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('courses_offered.store') }}">
          @csrf
          <div class="form-group">
              <label for="course">Course:</label>
              <input type="text" class="form-control" name="course"/>
          </div>

          <div class="form-group">
              <label for="school">School:</label>
              <input type="text" class="form-control" name="school"/>
          </div>                 
          <button type="submit" class="btn btn-primary">Add course</button>
      </form>
  </div>
</div>
@endsection
