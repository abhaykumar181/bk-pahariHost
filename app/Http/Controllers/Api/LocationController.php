<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locations;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $limit = $request->limit ? $request->limit : 10;
            $page = $request->page ? $request->page : 1;
            $offset = (($page - 1) * $limit);
            $orderBy = $request->orderBy ? $request->orderBy : 'id';
            $order = $request->order ? $request->order : 'ASC';

            $locationQuery = Locations::where('id','!=','');
            if($request->search){
                $locationQuery->where(strtolower('name'),'LIKE','%'.strtolower($request->search).'%');
            }

            $total = $locationQuery->count();

            if($orderBy){
                $locationQuery->orderBy($orderBy, $order);
            }

            if($limit && $limit > 0){
                $locationQuery->skip($offset)->take($limit);
            }
            
            $locations = $locationQuery->get();
            
            $data = [
                'success' => true,
                'limit' => $limit,
                'page' => $page,
                'total' => $total,
                'data' => $locations
            ];
            
            return response()->json($data,200);
            
        }catch(\Illuminate\Database\QueryException $e){
            return response()->json('Internal Server Error.', 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
