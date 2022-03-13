@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Agregar usuario de soporte</div>
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
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group mt-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group mt-3">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control" value="{{ old('password',Str::random(8)) }}">
            </div>
            
            <div class="form-group mt-3">
                <button class="btn btn-primary">Registrar</button>
            </div>
        </form>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a href="/usuario/{{$user->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/usuario/{{ $user->id }}/delete" class="btn btn-sm btn-danger">Dar de baja</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
</div>
@endsection
