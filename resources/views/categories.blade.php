<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>Категории</title>
</head>
<body>
   <div class="w-full h-screen flex items-center">
        <div class="w-[600px] h-auto mx-auto flex flex-col gap-y-3">
            <div class="w-full border shadow-xl rounded-lg p-4 flex flex-col gap-y-3">
                <h2 class="text-2xl" >Добавление категорий</h2>
                <form action="{{ route('addCategory') }}" method="POST" class="flex justify-between">
                    @csrf 
                    @method("post")
                    <input class='w-96 border-2 p-2 rounded-lg' type="text" name="title" placeholder="Название категории">
                    <select name="game_id">
                    @foreach($games as $key => $game)
                        <option value="{{$game->id}}" class='w-auto bg-yellow-300 p-2 rounded-lg'>
                            {{ $game->title }}
                        </option>
                    @endforeach
                    </select>
                    <button class='w-auto bg-green-300 p-2 rounded-lg' type="submit">Добавить</button>
                </form> 
            </div>
            <div class="w-full border shadow-xl rounded-lg p-4 flex flex-col gap-y-3">
                <h2>Игры</h2>
                <h2 class="text-2xl" >Добавление игры</h2>
                <form action="{{ route('addGame') }}" method="POST" class="flex justify-between">
                    @csrf 
                    @method("post")
                    <input class='w-96 border-2 p-2 rounded-lg' type="text" name="title" placeholder="Название игры">
                    <button class='w-auto bg-green-300 p-2 rounded-lg' type="submit">Добавить</button>
                </form> 
                <div class="flex gap-x-3 gap-y-3 flex-wrap">
                    @foreach($games as $key => $game)
                        <a class='w-auto bg-yellow-300 p-2 rounded-lg' href="/set/{{$game->id}}">
                            {{ $game->title }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="w-full border shadow-xl rounded-lg p-4 flex flex-col gap-y-3">
                <h2>Категории</h2>
                <div class="flex gap-x-3 gap-y-3 flex-wrap">
                    @foreach($categories as $key => $category)
                        <a class='w-auto bg-yellow-300 p-2 rounded-lg' href="/categ/{{$category->id}}">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
   </div>
</body>
</html>