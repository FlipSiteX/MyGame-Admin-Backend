<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\QuestionController;
use App\Models\Category;
use App\Models\Game;
use App\Models\Question;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $games = Game::all();
    return view('home', ["games" => $games]);
});

Route::get('/categ/{id}', function ($id) {

    $category = Category::find($id);
    $questions = Question::query()->where("category_id", "=", $id)->get();

    return view('categoryPage', ["category" => $category, "questions" => $questions]);
});

Route::get('/set/{id}', function ($id) {

    $game = Game::find($id);
    $categories = Category::query()->where("game_id", "=", $id)->get();

    return view('gamePage', ["game" => $game, "categories" => $categories]);
});

// Категории
Route::get("/categories", [CategoryController::class, "getCategories"])->name("getCategories");
Route::get("/category/{category}", [CategoryController::class, "getCategory"])->name("getcategory");
Route::post("/category", [CategoryController::class, "addCategory"])->name("addCategory");
Route::put("/category/{category}", [CategoryController::class, "updateCategory"])->name("updateCategory");
Route::delete("/category/{category}", [CategoryController::class, "deleteCategory"])->name("deleteCategory");

// Вопросы
Route::get("/questions", [QuestionController::class, "getQuestions"])->name("getQuestions");
Route::get("/question/{question}", [QuestionController::class, "getQuestion"])->name("getQuestion");
Route::post("/question", [QuestionController::class, "addQuestion"])->name("addQuestion");
Route::put("/question/{question}", [QuestionController::class, "updateQuestion"])->name("updateQuestion");
Route::delete("/question/{question}", [QuestionController::class, "deleteQuestion"])->name("deleteQuestion");

// Игры
Route::get("/games", [GameController::class, "getAllGame"])->name("getAllGame");
Route::post("/game", [GameController::class, "addGame"])->name("addGame");
Route::put("/game/{game}", [GameController::class, "addCategoryForGame"])->name("addCategoryForGame");
