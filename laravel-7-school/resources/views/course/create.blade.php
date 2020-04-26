@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a course</h1>
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
      <form method="post" action="{{ route('course.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="duration">Duration:</label>
              <input type="number" class="form-control" name="duration"/>
          </div>

          <div class="form-group">
              <label for="professor">Professor:</label>
              <input type="text" class="form-control" name="professor"/>
          </div>
          <div class="form-group">
              <label for="fees">Fees:</label>
              <input type="number" class="form-control" name="fees"/>
          </div>                 
          <button type="submit" class="btn btn-primary-outline">Add course</button>
      </form>
  </div>
</div>
</div>
@endsection
