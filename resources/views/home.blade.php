@extends('layouts.app')

@section('content')

    @if (auth()->user()->is_support)
    <div class="card card-primary mb-3">
        <div class="card-header">Incidencias asignadas a mí</div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Categoría</th>
                        <th>Severidad</th>
                        <th>Estado</th>
                        <th>Fecha de creación</th>
                        <th>Título</th>
                    </tr>
                </thead>
                <tbody id="dashboard_my_incidents">
                    
                    @foreach ($my_incidents as $incident)
                        <tr>
                            <td>
                                <a href="/ver/{{ $incident->id }}">
                                {{ $incident->id }}
                                </a>
                            </td>
                            <td>{{ $incident->category_name }}</td>
                            <td>{{ $incident->severity_name }}</td>
                            <td>{{ $incident->state }}</td>
                            <td>{{ $incident->created_at }}</td>
                            <td>{{ $incident->title }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    

    <div class="card card-primary mb-3">
        <div class="card-header">Incidendias sin asignar</div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Categoría</th>
                        <th>Severidad</th>
                        <th>Estado</th>
                        <th>Fecha de creación</th>
                        <th>Título</th>
                        <th>Opción</th>
                    </tr>
                </thead>
                <tbody id="dashboard_no_responsible">
                    @foreach ($incidencias_sin_asignar as $incident)
                        <tr>
                            <td>
                                <a href="/ver/{{ $incident->id }}">
                                {{ $incident->id }}
                                </a>
                            </td>
                            <td>{{ $incident->category_name }}</td>
                            <td>{{ $incident->severity_name }}</td>
                            <td>{{ $incident->state }}</td>
                            <td>{{ $incident->created_at }}</td>
                            <td>{{ $incident->title }}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Atender</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endif
    <div class="card card-primary">
        <div class="card-header">Incidendias reportadas por mí</div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Categoría</th>
                        <th>Severidad</th>
                        <th>Estado</th>
                        <th>Fecha de creación</th>
                        <th>Título</th>
                        <th>Responsable</th>
                    </tr>
                </thead>
                <tbody id="dashboard_to_me">
                    @foreach ($incidencias_roportadas_por_mi as $incident)
                        <tr>
                            <td>
                                <a href="/ver/{{ $incident->id }}">
                                {{ $incident->id }}
                                </a>
                            </td>
                            <td>{{ $incident->category_name }}</td>
                            <td>{{ $incident->severity_name }}</td>
                            <td>{{ $incident->state }}</td>
                            <td>{{ $incident->created_at }}</td>
                            <td>{{ $incident->title }}</td>
                            <td>{{ $incident->support_id ?: 'Sin asignar'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
      <!--22-->
@endsection
