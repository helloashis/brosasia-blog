@extends('admin.layout')
@section('title','Dashboard')
@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body row justify-content-center">
               <div class="col-md-12">
                  <h2 class="card-title ">{{ date('l, F jS') }}</h2>
                  <h1 class="display mb-5">
                     <b>
                        <script type="text/javascript">
                           var day = new Date();
                           var hr = day.getHours();
                           if (hr >= 0 && hr < 12) {
                               document.write("Good Morning!");
                           } else if (hr == 12) {
                               document.write("Good Noon!");
                           } else if (hr >= 12 && hr <= 17) {
                               document.write("Good Afternoon!");
                           } else {
                               document.write("Good Evening!");
                           }
                        </script>
                     </b>
                     <br>
                     <span>{{ Auth::user()->name }}</span>
                  </h1>
                  <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
               </div>

            </div>
         </div>
      </div>
   </div>
   </div>
</section>

@endsection
