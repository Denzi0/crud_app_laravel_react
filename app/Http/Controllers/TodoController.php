<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
   
    public function index()
    {
        //
        $todos = Todo::all();
        return view('app', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

   
    public function edit(Todo $todo , $id)
    {
        return "hellow edit "  . $id . "THanks";
    }

    public function update(Request $request, Todo $todo)
    {
        //
    }

    public function destroy($id){
        $user= Todo::find($id);
        $user->delete();
        return redirect('/')->with('status', 'Task removed!');
    }
    
    public function destroyAll(Request $request){
        Todo::query()->delete();
        
        return redirect('/')->with('status', 'All Task removed!');
    }
}
