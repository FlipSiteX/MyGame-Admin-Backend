<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller {

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

    public function update(Request $request, Game $game) {

        $validated = $request->validate([
            'title' => 'required|unique:games,title'
        ]);

        $game->update($validated);

        return redirect('/');
    }

    public function getGame(Game $game) {
        $gameWithRelation = $game->with("categories.questions")->first();
        return response()->json($gameWithRelation);
    }

    public function deleteGame(Game $game) {
        $game->delete();
        return redirect()->back();
    }

    public function edit(Game $game) {
        return view('game.edit', ['game' => $game]);
    }
}
