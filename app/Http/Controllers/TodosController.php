<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodosController extends Controller
{
    /*
        *index: mostrar todos los elementos
        *store: guardar un todo
        *update: actualizar un todo
        *destroy: eliminar un todo
        *edit: mostrar el formulario de edición
    */

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:6'
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todos')->with('success','Tarea creada correctamente');
    }

    public function index(){
        $todos = Todo::all();
        $categories = Category::all();
        return view('index',['todos'=>$todos,'categories'=>$categories]);
    }

    public function show($id){
        $todo = Todo::find($id);
        return view('show',['todo'=>$todo]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required|min:6'
        ]);

        $todo = Todo::find($request->id);
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success','Tarea actualizada correctamente');
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('todos')->with('success','Tarea eliminada correctamente');
    }
}
