@extends('base')

@section('main') 
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-8">
            <h1 class="display-4"><pre>Welcome to {{$school[0]->name}}!</h1>
            <div class="row content">
                <div class="col-sm-12"><h4>Founded by: {{$school[0]->trustee}}</h4></div>
            </div>
        </div>
        <div class="col-sm-4">
            <h3>Contact us at:</h3>
            <div class="col-sm-12"><b>Email: {{$school[0]->email}}</div>
            <div class="col-sm-12">Mobile: {{$school[0]->number}}</div>
            <div class="col-sm-12">Location: {{$school[0]->location}}</b></div>
        </div>
    </div>
</div>
<hr>

<div class="row">
<div class="col-sm-12">
    <h4 class="bg-dark text-white">Courses Offered Here:</h4>    
  <table class="table table-striped">
    <thead class="text-secondary">
        <tr>
          <td>Name</td>
          <td>Duration</td>
          <td>Professor</td>
          <td>Fees</td>
        </tr>
    </thead>
    <tbody>
    @foreach($school as $school)
    <tr>
          <td>{{$school->cname}}</td>
          <td>{{$school->duration}} months</td>
          <td>{{$school->professor}}</td>
          <td>{{$school->fees}}</td>
    </tr>
    </tbody>
    @endforeach
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
