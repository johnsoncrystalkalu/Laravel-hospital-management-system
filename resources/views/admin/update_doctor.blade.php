@extends('admin.maindesign')

@section('view_content')

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Doctor form</h4>
          <p class="card-description"> Edit doctor {{$doctor->doctors_name}} data</p>

          @if(session('success_updatemessage'))
          <div class="bg bg-success">
              {{ session('success_updatemessage') }}
          </div><br/>
          @endif

          <form class="forms-sample" action="{{route('edit.adddoctors', $doctor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Doctor's name</label>
              <input type="text" value="{{$doctor->doctors_name}}" name="doctors_name" class="form-control" id="" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="">Doctor's Phone number</label>
              <input type="text" value="{{$doctor->doctors_phone}}" name="doctors_phone" class="form-control" id="" placeholder="Phone">
            </div>
            <div class="form-group">
              <label for="">Speciality</label>
              <input type="text" value="{{$doctor->specialty}}" name="specialty" class="form-control" id="" placeholder="Speciality">
            </div>
            <div class="form-group">
              <label for="">Room number</label>
              <input type="text" value="{{$doctor->room_number}}" name="room_number" class="form-control" id="" placeholder="Room num">
            </div>

            <div class="form-group">
                <label for="">Doctor Image</label>
                @if ($doctor->doctors_image)
                <img src="{{asset('project_images/'.$doctor->doctors_image.'')}}" height="100">
                @endif
                <input type="file" name="doctors_image" class="form-control" id="">
              </div>

            <button type="submit" name="submit" value="add_doctor" class="btn btn-primary me-2">Submit</button>
            <button class="btn btn-dark">Cancel</button>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection


