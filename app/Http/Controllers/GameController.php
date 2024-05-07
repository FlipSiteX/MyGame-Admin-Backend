<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function getAllGame() {
        $games = Game::with("categories.questions")->get();

        return response()->json($games);
    }

    public function addGame(Request $request) {;

        $game = new Game();
        $game->title = $request->title;
        $game->save();

        return redirect()->back();
    }

    public function addCategoryForGame(Request $request, Game $game) {;

        $game->category_id = $request->category_id;
        $game->update();

        return redirect()->back();
    }
}
