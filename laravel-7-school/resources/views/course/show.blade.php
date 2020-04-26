@extends('base')

@section('main') 
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-8">
            <h1 class="display-4"><pre>Let's Learn {{$course[0]->cname}}!</h1>
            <div class="row content">
                <div class="col-sm-12"><h4>By Professor: {{$course[0]->professor}}</h4></div>
            </div>
        </div>
        <div class="col-sm-4">
            <h3>Requirements:</h3>
            <div class="col-sm-12"><b>Fees: Rs.{{$course[0]->fees}} Only</div>
            <div class="col-sm-12">Time: {{$course[0]->duration}} Months</div>
        </div>
    </div>
</div>
<hr>

<div class="row">
<div class="col-sm-12">
    <h4 class="bg-dark text-white">You can take this course at following Schools:</h4>    
  <table class="table table-striped">
    <thead class="text-secondary">
        <tr>
          <td>Name</td>
          <td>Email</td>
          <td>Number</td>
          <td>Location</td>
        </tr>
    </thead>
    <tbody>
    @foreach($course as $course)
    <tr>
          <td>{{$course->name}}</td>
          <td>{{$course->email}}</td>
          <td>{{$course->number}}</td>
          <td>{{$course->location}}</td>
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
