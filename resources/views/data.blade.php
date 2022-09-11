@foreach($students as $student)
<div class="card text-center">
  <div class="card-header">
    Student Details
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$student->name}}</h5>
    <p class="card-text">{{$student->email}}</p>
    <p class="card-text">{{$student->phone}}</p>
    <button class="btn btn-primary">Read more...</button>
  </div>
  <div class="card-footer text-muted">
  {{$student->created_at}}
  </div>
</div>
@endforeach