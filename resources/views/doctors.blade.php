@extends('maindesign')
@section('title', 'Doctors page')

@section('all_doctors')

        <div class="page-section bg-light">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-10">

                  <div class="row">

@foreach ( $doctors as $doctor )


<div class="col-md-6 col-lg-4 py-3 wow zoomIn">
    <div class="card-doctor">
      <div class="header">
        <img src="{{asset('project_images/'.$doctor->doctors_image.'')}}" alt="{{$doctor->image}}">
        <div class="meta">
          <a href="#"><span class="mai-call"></span></a>
          <a href="#"><span class="mai-logo-whatsapp"></span></a>
        </div>
      </div>
      <div class="body">
        <p class="text-xl mb-0">{{$doctor->doctors_name}}</p>
        <span class="text-sm text-grey">{{$doctor->speciality}}</span>
      </div>
    </div>
  </div>

@endforeach


      </div>
    </div>
  </div>
            </div>
        </div>

@endsection
