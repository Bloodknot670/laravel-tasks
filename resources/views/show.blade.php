@extends('app')

@section('content')
    <div class="container w-25 p-4 rounded-3 mt-4 form">
        <form action="{{route('todos-update',[$todo->id])}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Título</label>
              <input type="text" class="form-control" id="title" name="title" value="{{$todo->title}}">
            </div>
            <div class="row">
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i></button>
                </div>
            </div>
          </form>
    </div>


@endsection
