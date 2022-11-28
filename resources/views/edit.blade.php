<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Edit Page</title>
</head>
<body>
    
    <div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-xs">
        @foreach($editTodos as $todo)
        <form action="{{ url('todos/update/'.$todo->id) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <h1>Edit page {{$editId}}</h1>  
          {{-- <div class="mb-4">
            <select id="countries" name="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1">1</option>
                <option value="2">2</option>
            
            </select>
          </div> --}}
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
              Todo Name
            </label>
            <input value={{$editName}} class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="todo_name" type="textarea" placeholder="Todo">
          </div>
          <div class="flex items-center justify-between">
            <button type="submit" class=" w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              Edit
            </button>
           
          </div>
        </form>
        @endforeach

      </div>
    </div>
</body>
</html>