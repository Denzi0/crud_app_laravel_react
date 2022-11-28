<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('app', ['todos' => $todos]);
    }

   
    public function create()
    {
    }

   
    public function store(Request $request)
    {
       
            // validate the form
            $request->validate([
                'task' => 'required|max:200',
                'priority' => 'required'
            ]);
            // store the data
            $addTodo = Todo::create([
                'task' => $request->task,
                'priority' => $request->priority
                
            ]);

            return redirect('/')->with('status', 'Task added!');
    }

 
    public function show(Todo $todo)
    {
        //
    }

   
    public function edit(Todo $todo , $id ,Request $request)
    {
    
        
        $todoEditList = Todo::where('id', $id)->get();

        return view('edit' ,['editTodos' => $todoEditList, 'editId'=> $id , 'editName'=> $todoEditList[0]->task]);
    }

    public function update(Request $request, Todo $todo ,$id)
    {
        Todo::where('id', $id)->update([
            'task' => $request->todo_name
        ]);
        return redirect('/')->with('status', 'Task updated!');

    }

    public function destroy($id){
        $user= Todo::findOrFail($id);
        $user->delete();
        return redirect('/')->with('status', 'Task removed!');
    }
    
    public function destroyAll(Request $request){
        Todo::query()->delete();
        
        return redirect('/')->with('status', 'All Task removed!');
    }
}
