@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a school</h1>
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
      <form method="post" action="{{ route('school.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>

          <div class="form-group">
              <label for="number">Number:</label>
              <input type="text" class="form-control" name="number"/>
          </div>
          <div class="form-group">
              <label for="location">Location:</label>
              <input type="text" class="form-control" name="location"/>
          </div>
          <div class="form-group">
              <label for="trustee">Trustee:</label>
              <input type="text" class="form-control" name="trustee"/>
          </div>                      
          <button type="submit" class="btn btn-primary">Add School</button>
      </form>
  </div>
</div>

@endsection
