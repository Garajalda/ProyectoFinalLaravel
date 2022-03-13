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
        <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}">
            </div>
            <div class="form-group mt-3">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ old('description',$project->description) }}">
            </div>
            <div class="form-group mt-3">
                <label for="start">Fecha de inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start',$project->start) }}">
            </div>
            
            <div class="form-group mt-3 mb-3">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>

        <div class="row">
            <div class="col-md-6">
                    <p>Categorías</p>
                    <form action="/categorias" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="input-group mb-3">
                            <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
                            <button class="btn btn-primary">Añadir</button>
                        </div>
                    </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                         
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="editar" data-category="{{ $category->id }}">Editar</button>
                                <a href="/categoria/{{ $category->id }}/eliminar" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                    <p>Niveles</p>
                    <form action="/niveles" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="project_id" value="{{ $project->id }}">

                        <div class="input-group mb-3">
                            <input type="text" name="name"  placeholder="Ingrese nombre" class="form-control">
                            <button class="btn btn-primary">Añadir</button>
                        </div>
                    </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nivel</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $key => $level)
                        <tr>

                        
                        <td>N{{ $key+1 }}</td>
                        <td>{{ $level->name }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" title="editar" data-level="{{ $level->id }}">Editar</button>
                            <a href="/nivel/{{ $level->id }}/eliminar" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        
    </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEditCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="/categoria/editar" method="POST">
    {{ csrf_field() }}
        <div class="modal-body">

            <input type="hidden" name="category_id" id="category_id" value="">
            <div class="form-group">
                <label for="name">Nombre de la categoría</label>
                <input type="text" class="form-control" name="name" id="category_name" value="">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditLevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar nivel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="/nivel/editar" method="POST">
    {{ csrf_field() }}
        <div class="modal-body">

            <input type="hidden" name="level_id" id="level_id" value="">
            <div class="form-group">
                <label for="name">Nombre del nivel</label>
                <input type="text" class="form-control" name="name" id="level_name" value="">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form>
    </div>
  </div>
</div>

@endsection

@section('scripts')
    <script src="/js/admin/projects/edit.js"></script>
@endsection
