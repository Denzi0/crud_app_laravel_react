<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Laravel CRUD</title>
    </head>
    <body class="flex items-center h-screen">
            <div class="shadow-lg p-10 w-1/3 mx-auto">
                <div class="text-center">
                    <h1 class="text-3xl font-bold mb-10">ToDo App</h1>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                   
                    <div class="mt-4">
                        <form action="{{ url('/todos') }}" method="POST" class="">
                            @csrf
                            <select id="countries" name="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            
                            </select>
                            <input
                                name="task"
                                class="w-full py-2 px-2 border-2 border-gray-500 text-black"
                                type="text" placeholder="Enter your task here" 
                            />
                        
                            <button type="submit" class="w-full mt-2 text-center text-white border-2 border-green-500 p-2 bg-green-500 rounded-lg">   
                                Add Todo
                            </button>
                        </form>

                    </div>        
                </div>
                <div class="mt-8">
                   
                        <ul class="list-group">
                   @foreach($todos as $todo)
                            <li class="p-2 rounded-lg" >
                                <div class="flex align-middle flex-row justify-between   border-l-4 {{ $todo->priority == "1" ? "border-red-500" : "border-blue-400" }}">
                                    <div class="p-2">
                                        <input type="checkbox" class="h-6 w-6 " value="true" />
                                    </div>
                                    <div class="p-2">
                                        <p class="text-lg text-black">{{ $todo->task }}</p>
                                    </div>
                                    <div class="flex gap-2">
                                            <a name="edit" name="edit" href="{{ url('todos/edit/'.$todo->id) }}" class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Edit</a>
                                        <form action="{{ url('todos/'.$todo->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Danger</button>
                                        </form>
                                     
                                    </div>
                                </div>
                                <hr class="mt-2"/>
                            </li>
                            @endforeach
                    </ul>
                </div>
                <div class="mt-8">
                    <form action="{{ url('/removeTodo') }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                            Reset Todo List</button>
                        </form>
                        
                        <button type="button" class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                            Clear Completed
                        </button>    
                </div>
            </div>    
        
        
      


    </body>
</html>