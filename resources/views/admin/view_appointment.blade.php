@extends('admin.maindesign')

@section('view_appointments')
<div class="table-responsive">
    <table class="table">
    <thead>    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Specialty</th>
        <th>Status</th>
        <th>Action</th>
      </tr></thead>

    <tbody>
        @foreach ($appointments as $appointment)
        <tr>
        <td>{{$appointment->full_name}}</td>
        <td>{{$appointment->email_address}}</td>
        <td>{{$appointment->speciality}}</td>
        <td>{{$appointment->status}}</td>
        <td> <form action="{{route('change.status', $appointment->id)}}" method="POST">
            @csrf
        <select name="status" id="status">
            <option value="{{$appointment->status}}">{{$appointment->status}}</option>
            <option value="accept">accept</option>
            <option value="in porgress">in progress</option>
        </select>
        <button name="submit" type="submit" class="btn btn-info">submit</button>
        </form></td>
        </tr>
        @endforeach

</tbody>

</table>
</div>
@endsection
