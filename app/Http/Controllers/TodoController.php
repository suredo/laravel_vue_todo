<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function add(Request $Request) {
        $todo = new Todo;
        $todo->todo = $Request->todo;
        $todo->status = $Request->status;
        $todo->save();
        return response()->json($todo);
    }

    public function delete(Request $Request, $id) {
        $todo = Todo::find($id);
        try {
            $todo->delete();
            return response()->json($todo);
        } catch (\Throwable $th) {
            return response()->json("Não foi possivel deletar item");
        }
    }

    public function update(Request $Request, $id) {
        $todo = Todo::find($id);
        $todo->todo = $Request->todo;
        $todo->status = $Request->status;
        $todo->save();
        return response()->json($todo);
    }

    public function getAll() {
        $todo = Todo::all();
        return response()->json($todo);
    }
}
