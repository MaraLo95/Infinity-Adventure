@extends('layouts.app')

@section('content')
@if (auth()->check())
   @if (auth()->user()->role_as=='1')
   <div class="text-center">
   <a  class='btn btn-primary' href="{{asset('dashboard')}}">Admin panel</a>
</div>
   @endif

   <h2>{{session('$user') }}</h2>
   @php
   if (isset($_SESSION['qwick'])) {
    echo 'Ima';
} else {
    echo 'nema';
}
@endphp
@endif
@endsection
