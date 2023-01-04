@extends('home.layouts.main')

@section('content')
    <!-- -----------------------navbar--------------------------- -->
    @include('home.layouts.navbar')
    <!-- -----------------------------navbar end------------------------ -->
    
  <main id="main">

    <!-- breadcumber -->
    @include('home.layouts.breadcumber')
    <!-- breadcumber end -->

    <!-- -------------------------Sekilas Karya--------------------------------------- -->
    @include('home.layouts.sekilas')
    <!-- -------------------------Sekilas Karya end----------------------------------- -->

  </main>
    
  <!-- --------------------------------Footer------------------------------------ -->
  @include('home.layouts.footer')
  <!-- --------------------------------Footer end-------------------------------- -->
@endsection

@section('js')
    <script src="/assets/isotope-layout/isotope.pkgd.min.js"></script>
@endsection