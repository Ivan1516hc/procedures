<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
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
        $model = Quote::query();
        // $model->where('procedure_id', $user->department_id)->where('status','<>',0);
        // ($user->department_id == 2 ? $model->with('centro.sala') : null);
        // ($user->department_id == 3 ? $model->with('centro.sala') : null);
        // ($user->department_id == 4 ? $model->with('centro.sala') : null);
        // ($user->department_id == 5 ? $model->with('centro.sala') : null);
        // ($user->department_id == 6 ? $model->with('centro.sala') : null);
        // ($user->profile_id == 2 ? $model->whereHas('user', function ($query) use ($user) {
        //     return  $query->where('location_id', $user->location_id);
        // }) : null);

        $query = $model
        ->has('request.beneficiaries')->orderBy('date','asc')->orderBy('hour','asc')
        ->with(['request.priority','request.beneficiaries' => function ($query) {
            $query->orderBy('edad', 'asc');
        }])->whereHas('request', function ($query) use ($user) {
            $query->where('procedure_id', $user->department_id);
        })->paginate();
        // ->with('request')->paginate();
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
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
