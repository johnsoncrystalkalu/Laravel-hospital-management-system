@extends('admin.maindesign')


@section('view_content')
<div class="table-responsive">
    <table class="table">
    <thead style="background: white">
         <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Specialty</th>
        <th>Room</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
        @foreach ($doctors as $doctor)
        <tr>
        <td>{{$doctor->doctors_name}}</td>
        <td>{{$doctor->doctors_phone}}</td>
        <td>{{$doctor->specialty}}</td>
        <td>{{$doctor->room_number}}</td>
        <td><img src="{{asset('project_images/'.$doctor->doctors_image.'')}}" width="200"></td>
        <td><a class="btn btn-info" href="{{route('update.doctor', $doctor->id)}}">Edit</a>
         <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('delete.doctor', $doctor->id)}}">Delete</a></td>
    </tr>
        @endforeach

</tbody>

</table>
</div>
@endsection
