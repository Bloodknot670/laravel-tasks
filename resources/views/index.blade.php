@extends('app')

@section('content')
    <div class="container w-25 p-4 rounded-3 mt-5 form">
        <form action="{{route('todos')}}" method="POST">
            @csrf
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @error ('title')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror
            <div class="mb-3">
              <label for="title" class="form-label">Título</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
              </div>
            <div class="row">
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i></button>
                </div>
            </div>
          </form>
    </div>

    <div class="container w-25 p-4 rounded-3 mt-4 form">
        @if (count($todos) >0)
        @foreach ($todos as $todo)
        <div class="row py-1 m-2 rounded-3 result-row">
            <div class="col-md-9 d-flex justify-content-center align-items-center">
                <a href="#" style="display: inline-block">{{$todo->title}}</a>
            </div>
            <div class="col-md-2 d-flex justify-content-center">
                <a href="{{route('todos-show',[$todo->id])}}" class="btn btn-info ms-1 text-white"><i class="bi bi-arrow-clockwise"></i></a>
                <a class="btn btn-danger ms-1" data-bs-toggle="modal" data-bs-target="#modal-{{$todo->id}}"><i class="bi bi-trash"></i></a>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-{{$todo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar la tarea: {{$todo->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ¿Esta seguro de que quiere eliminar la tarea, una vez eliminada la información se perdeŕa para <b>Siempre</b>?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{route('todos-delete',[$todo->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="d-flex justify-content-center align-items-center">
            <p>No hay contenido</p>
        </div>
        @endif

    </div>


@endsection
