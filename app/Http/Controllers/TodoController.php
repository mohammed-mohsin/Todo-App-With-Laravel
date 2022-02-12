<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function create(Request $request)
    {
        $todo = new Todo();
        $todo->name = $request->name;
        $todo->complete = false;
        $todo->save();
        session()->flash('success', 'Todo Created Successfully');

        return redirect('/');
    }

    function delete($id)
    {
        $todo =  Todo::find($id);

        $todo->delete();
        session()->flash('success', 'Todo Deleted Successfully');
        return redirect('/');
    }
    function complete($id)
    {
        $todo =  Todo::find($id);
        $todo->complete = true;
        $todo->save();
        session()->flash('success', 'Todo Completed Successfully');
        return redirect('/');
    }
    function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }
}
