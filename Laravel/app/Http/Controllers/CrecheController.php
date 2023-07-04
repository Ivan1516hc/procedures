<?php

namespace App\Http\Controllers;

use App\Models\Creche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrecheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $model = Creche::query();
        $query = $model
        ->orderBy('degree_id','asc')->where('center_id',$user->center_id)
        ->withCount(['beneficiryCreche as beneficiry_count' => function ($query){
            return $query->where('status',1);
        },'requests as process' => function ($query){
            return $query->where('status_request_id',2);
        },'requests as refused' => function ($query){
            return $query->where('status_request_id',4);
        }])->with('degree','room')->paginate();
        return response()->json($query);
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
    public function show(Creche $creche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Creche $creche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Creche $creche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Creche $creche)
    {
        //
    }
}
