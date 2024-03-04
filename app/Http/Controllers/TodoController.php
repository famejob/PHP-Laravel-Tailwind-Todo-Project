<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todos = Todo::all();
        return view('todo', compact('todos'));
    }
    public function add_todolist(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'description' => 'nullable'
            ]
        );

        Todo::create($data);
        return redirect('/');
    }
    public function update_todolist($id)
    {
        $todo = Todo::find($id);
        $todo->update(['isDone' => !$todo->isDone]);
        return redirect('/');
    }
    public function delete_todolist($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect('/');
    }
}
