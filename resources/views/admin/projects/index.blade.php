@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Agregar proyecto</div>
    <div class="card-body">
        @if (session('notification'))
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
        <form action="" method="POST" class="mb-3">
            {{ csrf_field() }}

            <div class="form-group mt-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group mt-3">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            </div>
            <div class="form-group mt-3">
                <label for="start">Fecha de inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start',date('Y-m-d')) }}">
            </div>
            
            <div class="form-group mt-3">
                <button class="btn btn-primary">Registrar</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de inicio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start ?: 'No hay fecha de inicio.'}}</td>
                    <td>
                        @if ($project->trashed())
                        <a href="/proyecto/{{ $project->id }}/restaurar" class="btn btn-sm btn-primary">Reestablecer</a>
                        @else
                        <a href="/proyecto/{{$project->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/proyecto/{{ $project->id }}/delete" class="btn btn-sm btn-danger">Dar de baja</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
</div>
@endsection
