@extends('layouts.app')

@section('content')


<div class="card">
        @if(session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif
    <div class="card-header">Reportar incidencia</div>
    <div class="card-body">
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

            <div class="form-group" >
                <label for="category_id">Categoría</label>
                <select name="category_id" class="form-control">
                    <option value="">General</option>
                    @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="severity">Severidad</label>
                <select name="severity" class="form-control">
                    <option value="M">Menor</option>
                    <option value="N">Normal</option>
                    <option value="A">Alta</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group mt-3">
                <label for="description">Descripción</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-primary">Registrar incidencia</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
