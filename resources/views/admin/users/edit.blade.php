@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Editar usuario</div>
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
        <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email',$user->email) }}">
            </div>
            <div class="form-group mt-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}">
            </div>
            <div class="form-group mt-3">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control" value="{{ old('password') }}">
            </div>
            
            <div class="form-group mt-3 mb-3">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>

        <form action="/proyecto-usuario" method="POST">
        {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="project_id" class="form-control" id="select-project">
                        <option value="">Seleccione proyecto</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="level_id" class="form-control" id="select-level">
                        <option value="">Seleccione nivel</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary btn-block">Asignar proyecto</button>
                </div>
            </div>
        </form>
        <p>Proyectos asignados</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Nivel</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects_user as $project_user)
                <tr>
                    <td>{{ $project_user->project->name }}</td>
                    <td>{{ $project_user->level->name }}</td>
                    <td>
                        <a href="/proyecto-usuario/{{ $project_user->id }}/delete" class="btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="/js/admin/users/edit.js"></script>
@endsection
