<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>{{$category->title}}</title>
</head>
<body>
    <div class="w-full flex p-4">
            <div class="w-[600px] h-auto mx-auto flex flex-col gap-y-3">
                <div class="w-full border shadow-xl rounded-lg p-4 flex flex-col gap-y-3">
                    <h2 class="text-2xl" >{{ $category->title }}</h2>
                    <form action="{{ route('addQuestion') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-3">
                        @csrf 
                        @method("post")
                        <textarea class='w-full h-24 border-2 p-2 rounded-lg' type="text" name="desc" placeholder="Описание"></textarea>
                        <textarea class='w-full h-24 border-2 p-2 rounded-lg' type="text" name="question" placeholder="Вопрос"></textarea>
                        <select class='w-full border-2 p-2 rounded-lg' name="question_type">
                            <option value="#" disabled selected>Выберете тип вопроса</option>
                            <option value="text">Текст</option>
                            <option value="img">Изображение</option>
                            <option value="video">Видео</option>
                            <option value="music">Звук</option>
                        </select>
                        <input type="file" name="question_file">
                        <textarea class='w-full h-24 border-2 p-2 rounded-lg' type="text" name="answer" placeholder="Ответ"></textarea>
                        <select class='w-full border-2 p-2 rounded-lg' name="answer_type">
                            <option value="#" disabled selected>Выберете тип ответа</option>
                            <option value="text">Текст</option>
                            <option value="img">Изображение</option>
                            <option value="video">Видео</option>
                            <option value="music">Звук</option>
                        </select>
                        <input type="file" name="answer_file">
                        <select class='w-full border-2 p-2 rounded-lg' name="points">
                            <option value="#" disabled selected>Очки</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                        </select>
                        <input class='w-full border-2 p-2 rounded-lg' type="hidden" name="category_id" value="{{ $category->id }}" placeholder="id">
                        <button class='w-full bg-green-300 p-2 rounded-lg' type="submit">Создать</button>
                    </form>
                </div>
                <div class="w-full border shadow-xl rounded-lg p-4 flex flex-col gap-y-3">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="w-2/5 border-x-4">Вопрос</th>
                                <th class="w-2/5 border-x-4">Ответ</th>
                                <th class="w-1/5 border-x-4">Очки</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $key => $question)
                                    <tr>
                                        <td class="w-2/5  px-2 text-wrap">{{ $question->question }}</td>
                                        <td class="w-2/5  px-2 text-wrap">{{ $question->answer }}</td>
                                        <td class="w-1/5 text-center">{{ $question->points }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</body>
</html>