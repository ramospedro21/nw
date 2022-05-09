<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Production;

class ProductionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Production::query();

        if($request->name) {
            $query = $query->where('name', 'like', '%' . $request->name . '%');
        }

        if($request->orderBy) {
            $query->orderBy('created_at', $request->orderBy);
        }

        return $query->paginate(Production::PER_PAGE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name'         => 'required|string|unique:productions,name',
            'type'         => 'required|integer',
            'release_date' => 'required|date',
        ]);

        try {

            Production::create($data);

            return response()->noContent();

        } catch (\Exception $e) {

            throw $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $production = Production::find($id);

        if(empty($production)) {

            return response()->json([
                'message' => 'Não foi possivel achar a produção',
            ], 404);
        }

        return $production;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        $data = request()->validate([
            'name'         => 'required|string|unique:productions,name,NULL,id,deleted_at,NULL',
            'type'         => 'required|integer',
            'release_date' => 'required|date',
        ]);

        try {

            $production->fill($data);

            $production->save();

            return response()->noContent();

        } catch (\Exception $e) {

            throw $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $production = Production::find($id);

        if(empty($production)) {

            return response()->json([
                'message' => 'Não foi possivel achar a produção',
            ], 404);

        }

        $production->delete();

        return response()->noContent();
    }
}
