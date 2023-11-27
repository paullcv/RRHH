@extends('layouts.panel')

@section('content')
    @livewire('dashboard.cards-dashboard')
    @livewire('dashboard.porcentaje-cumplimiento-chart')
    @livewire('dashboard.empleado-activo-chart')
    @livewire('dashboard.empleado-inactivo-chart')
    @livewire('dashboard.sexo-empleado-chart')
@endsection

@section('css')
@livewireStyles()
@stop

@section('js')
@livewireScripts()
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stop
