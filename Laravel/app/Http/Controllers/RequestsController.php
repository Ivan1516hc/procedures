<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // if($user->role_id == 1){
        //     return;
        // }
        $model = Requests::query();
        $model->where('procedure_id', $user->department_id)->where('status_request_id','<>',1);
        ($user->department_id == 2 ? $model->with('crecheRequest.creche.degree') : null);
        // ($user->department_id == 3 ? $model->with('centro.sala') : null);
        // ($user->department_id == 4 ? $model->with('centro.sala') : null);
        // ($user->department_id == 5 ? $model->with('centro.sala') : null);
        // ($user->department_id == 6 ? $model->with('centro.sala') : null);
        // ($user->profile_id == 2 ? $model->whereHas('user', function ($query) use ($user) {
        //     return  $query->where('location_id', $user->location_id);
        // }) : null);

        $query = $model->has('beneficiaries')->orderBy('id','asc')->with(['beneficiaries' => function ($query) {
            $query->orderBy('edad', 'asc');
        }])->with('priority')->withCount('quotes')->paginate();
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
    public function show(Requests $requests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requests $requests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $query= Requests::find($request->id);
        $query->update([
            'status_request_id' => $request->status_request_id
        ]);
        $response['status']=200;
        $response['message']="Actualizacion exitosa";
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requests $requests)
    {
        //
    }
}
