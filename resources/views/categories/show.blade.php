@extends('app')
@section('content')
<div class="container w-25 form rounded-3 p-4 my-4">
    <div class="row mx-auto">
        <form action="{{route('categorias.update',['categoria'=>$category->id])}}"method="POST">
            @method('PATCH')
            @csrf
            @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
            @error ('name')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color" name="color" value="{{$category->color}}">
              </div>
            <div class="row">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i></button>
                </div>
            </div>
          </form>

          <div>
            @if ($category->todos->count()>0)
                @foreach ($category->todos as $todo)
                <div class="row py-1 m-2 result-row rounded-3">
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
                    <p>No hay tareas</p>
                </div>
            @endif
          </div>
    </div>
</div>

</div>
@endsection
