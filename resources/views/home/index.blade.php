@extends('home.layouts.main')

@section('content')
    <!-- -----------------------navbar--------------------------- -->
    @include('home.layouts.navbar')
    <!-- -----------------------------navbar end------------------------ -->

    <!-- ---- -------------------------Carousel-------------------------- -->
    @include('home.layouts.carousel')
    <!-- -------------------Carousel End--------------------------------- -->
    
  <main>

    <!-- -------------------about us------------------------------------- -->
    @include('home.layouts.tentang')
    <!-- -------------------about us end---------------------------------------- -->

    <!-- -------------------------service--------------------------------------- -->
    @include('home.layouts.layanan')
    <!-- -------------------------service end----------------------------------- -->

    <!-- ------------------------------call me---------------------------------- -->
    @include('home.layouts.call-me')
    <!-- ------------------------------call me end------------------------------ -->


    <!-- ------------------------------Team------------------------------------- -->
    @include('home.layouts.tim')
    <!-- ------------------------------Team end---------------------------------- -->

  </main>
    
  <!-- --------------------------------Footer------------------------------------ -->
  @include('home.layouts.footer')
  <!-- --------------------------------Footer end-------------------------------- -->
@endsection