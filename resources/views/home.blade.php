<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>Главная</title>
</head>
<body>
    <div>
        <div class="w-full p-4 bg-green-300">
            <h2 class="text-lg">Игры</h2>
        </div>
        <div class="w-full p-4 flex flex-col gap-y-3">
            <h2 class="text-2xl" >Добавление игры</h2>
            <form action="{{ route('addGame') }}" method="POST" class="flex gap-x-3">
                @csrf 
                @method("post")
                <input class='w-full border-2 p-2 rounded-lg' type="text" name="title" placeholder="Название игры">
                <button class='w-auto bg-green-300 p-2 rounded-lg' type="submit">Добавить</button>
            </form> 
        </div>
        <div class="w-full p-4 flex gap-3 flex-wrap">
            @foreach($games as $key => $game)
                <a href="/set/{{$game->id}}" class='w-auto bg-yellow-300 p-2 text-2xl rounded-lg cursor-pointer'>
                    {{ $game->title }}
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>