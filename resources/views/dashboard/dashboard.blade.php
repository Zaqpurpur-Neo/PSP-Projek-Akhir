@extends("template_dashboard.main")

@section('content')
<main class="">
  <div class="">
      <h4 class="overview">Overview</h4>
      <h1 class="h2">Welcome back, {{ Auth::user()->name }}!</h1>
  </div>
</main>
@endsection
