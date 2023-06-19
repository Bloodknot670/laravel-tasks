@extends('app')

@section('content')
    <div class="container w-25 p-4 my-4 form rounded-3 mt-5">
        <div class="row mx-auto">
            <form action="{{route('categorias.store')}}" method="POST">
                @csrf
                @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
                @endif
                @error ('name')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
                <div class="mb-3">
                  <label for="name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="color" class="form-control" id="color" name="color">
                  </div>
                <div class="row">
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i></button>
                    </div>
                </div>
              </form>
        </div>
    </div>
    <div class="container w-25 p-4 my-4 form rounded-3">
        @if (count($categories) >0)
            @foreach ($categories as $category)
            <div class="row py-1 m-2 rounded-3 result-row">
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <span class="color-container" style="background-color:{{$category->color}}"></span>
                </div>
                <div class="col-md-5 d-flex justify-content-center align-items-center">
                    <h6 class="mt-2">{{$category->name}}</h6>
                </div>
                <div class="col-md-2 d-flex justify-content-start align-items-center">
                    <a href="{{route('categorias.show',['categoria'=>$category->id])}}" class="btn btn-info ms-1 text-white"><i class="bi bi-arrow-clockwise"></i></a>
                    <a class="btn btn-danger ms-1" data-bs-toggle="modal" data-bs-target="#modal-cat-{{$category->id}}"><i class="bi bi-trash"></i></a>
                </div>
            </div>

             <!-- Modal -->
             <div class="modal fade" id="modal-cat-{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar la tarea: {{$category->name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    ¿Esta seguro de que quiere eliminar esta categoría,con esto se eliminarán todas las tareas
                    asignadas a esta categoría, una vez eliminada la información se
                    perdeŕa para <b>Siempre</b>?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{route('categorias.destroy',[$category->id])}}" method="POST">
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
                <p>No hay categorías</p>
            </div>
        @endif
    </div>
@endsection
