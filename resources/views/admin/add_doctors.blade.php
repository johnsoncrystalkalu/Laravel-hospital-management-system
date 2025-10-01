@extends('admin.maindesign')
@section('add_doctors')

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Doctor form</h4>
          <p class="card-description"> Add your doctors here</p>

          @if(session('success_message'))
          <div class="bg bg-success">
              {{ session('success_message') }}
          </div><br/>
          @endif

          <form class="forms-sample" action="{{route('post.adddoctors')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Doctor's name</label>
              <input type="text" name="doctors_name" class="form-control" id="" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="">Doctor's Phone number</label>
              <input type="text" name="doctors_phone" class="form-control" id="" placeholder="Phone">
            </div>
            <div class="form-group">
              <label for="">Speciality</label>
              <input type="text" name="specialty" class="form-control" id="" placeholder="Speciality">
            </div>
            <div class="form-group">
              <label for="">Room number</label>
              <input type="text" name="room_number" class="form-control" id="" placeholder="Room num">
            </div>

            <div class="form-group">
                <label for="">Doctor Image</label>
                <input type="file" name="doctors_image" class="form-control" id="">
              </div>

            <button type="submit" name="submit" value="add_doctor" class="btn btn-success me-2">Update</button>
            <button class="btn btn-dark">Cancel</button>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection
