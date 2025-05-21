@extends('layouts.base')

@section('body')
<!-- <x-dialog z-index="z-50" blur="md" align="center" /> -->
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
@endsection
