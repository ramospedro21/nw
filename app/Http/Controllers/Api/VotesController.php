<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Production;

class VotesController extends Controller
{
    public function store($production_id) {

        $production = Production::find($production_id);

        if(empty($production)) {
            return response()->json([
                'message' => 'Não foi possivel achar a produção',
            ], 404);
        }

        try {

            $production->votes += 1;

            $production->save();

            return response()->noContent();

        } catch (\Exception $e) {

            throw $e;

        }
    }
}
