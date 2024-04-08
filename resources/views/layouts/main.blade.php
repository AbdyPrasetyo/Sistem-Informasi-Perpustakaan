@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.navbar')


<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">

@yield('content')

  </div>
</div>


@include('layouts.footer')