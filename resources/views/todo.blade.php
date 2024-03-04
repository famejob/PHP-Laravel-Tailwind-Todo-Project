<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-green-100">
    <div class="container mx-auto">
        <h1 class="mt-4 text-orange-400 font-bold text-5xl text-center">LARAVEL+TAIWIND TODO APP</h1>
        <div class="mt-6 mb-6">
            <form action="/add" method="post" class="flex flex-col space-y-4">
                @csrf
                <input class="py-3 px-4 rounded-xl bg-orange-200" type="text" name="title" id="title" placeholder="Enter your Todo title">
                <textarea class="py-3 px-4 rounded-xl bg-orange-200" type="text" name="description" id="description" placeholder="Enter your Todo description" cols="30" rows="5"></textarea>
                <button type="submit" class="text-white w-28 py-4 px-8 rounded-xl bg-green-500">ADD</button>
            </form>
        </div>
        <hr>
        <div class="mt-3">
            @foreach ($todos as $todo)
            <div class="flex flex-col lg:flex-row items-center border-b border-gray-300 px-3 {{ $todo->isDone ? 'bg-green-300' : '' }}">
                <div class="lg:w-3/4 pr-8">
                    <h3 class="text-lg font-semibold">{{$todo->title}}</h3>
                    <p class="text-gray-500">{{$todo->description}}</p>
                </div>
                <div class="flex lg:w-1/4 space-x-3 justify-center lg:justify-end">
                    <form action="/update/{{$todo->id}}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-green-500 text-white rounded-xl p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </button>
                    </form>
                    <form action="/delete/{{$todo->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white rounded-xl p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>