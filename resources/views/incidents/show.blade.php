@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Principal</div>
    <div class="card-body">
        @if(session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Proyecto</th>
                    <th>Categoría</th>
                    <th>Fecha de envío</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $incident->id }}</td>
                    <td>{{ $incident->project->name }}</td>
                    <td>{{ $incident->category_name }}</td>
                    <td>{{ $incident->created_at}}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th>Asignado a</th>
                    <th>Nivel</th>
                    <th>Estado</th>
                    <th>Severidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $incident->support_name }}</td>
                    <td>{{ $incident->level->name }}</td>
                    <td>{{ $incident->state }}</td>
                    <td>{{ $incident->severity_name }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Título</th>
                <td>{{ $incident->title }}</td>
            </tr>
            <tr>
                <th>Descripción</th>
                <td>{{ $incident->description }}</td>
            </tr>
            <tr>
                <th>Adjuntos</th>
                <td>No se adjuntó archivos</td>
            </tr>
        </table>


        @if($incident->support_id == null && $incident->active && auth()->user()->mismoNivel($incident))
        <a href="/incidencia/{{ $incident->id }}/atender" class="btn btn-primary">Atender</a>
        @endif
        @if (auth()->user()->id == $incident->client_id)
            @if($incident->active)
            <a href="/incidencia/{{ $incident->id }}/resolver" class="btn btn-info">Marcar como resuelto</a>
            <a href="/incidencia/{{ $incident->id }}/editar" class="btn btn-success">Editar incidencia</a>
            @else
            <a href="/incidencia/{{ $incident->id }}/abrir" class="btn btn-info">Reabrir</a>
            @endif
        @endif
        @if (auth()->user()->id == $incident->support_id && $incident->active)
        <a href="/incidencia/{{ $incident->id }}/derivar" class="btn btn-danger">Derivar al siguiente nivel</a>
        @endif
    </div>
    </div>
    @include('layouts.chat')
</div>
@endsection
