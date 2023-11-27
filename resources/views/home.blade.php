@extends('layouts.panel')

@section('content')
    @livewire('dashboard.cards-dashboard')
    @livewire('dashboard.porcentaje-cumplimiento-chart')
@endsection

@section('css')
@livewireStyles()
@stop

@section('js')
@livewireScripts()
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stop
