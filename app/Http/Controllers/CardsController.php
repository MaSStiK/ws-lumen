<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Comment;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAll() {
        $cards = Card::all();

        foreach ($cards as $card) {
            $card['card_comments'] = Comment::all()->where('card_id', $card['id']);
        }

        return response()->json($cards, 200);
    }

    public function add(Request $request) {
        $card_text = $request->input('card_text');
        $card = new Card();
        $card->card_text = $card_text;
        $card->save();
        return response()->json($card, 201);
    }

    public function edit(Request $request, $card_id) {
        $card_text = $request->input('card_text');
        $card = Card::find($card_id);
        $card->card_text = $card_text;
        $card->save();
        return response()->json($card, 200);
    }

    public function like($card_id) {
        $card = Card::find($card_id);
        $card->card_likes++;
        $card->save();
        return response()->json($card, 200);
    }

    public function delete($card_id) {
        $card = Card::find($card_id);
        $card->delete();
        return response("Successfully deleted", 200);
    }
}
