@extends('admin.maindesign')

@section('view_appointments')
<div class="table-responsive">
    <table class="table">
    <thead>    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Specialty</th>
      </tr></thead>

    <tbody>
        @foreach ($appointments as $appointment)
        <tr>
        <td>{{$appointment->full_name}}</td>
        <td>{{$appointment->email_address}}</td>
        <td>{{$appointment->speciality}}</td>
        </tr>
        @endforeach

</tbody>

</table>
</div>
@endsection
