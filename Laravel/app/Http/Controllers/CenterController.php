<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Creche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showCreche($creche)
    {
        $user = Auth::user();

        $results = DB::table('degrees as d')
            ->select('d.id',
                'd.name',
                DB::raw('COUNT(DISTINCT r.id) as total_requests'),
                DB::raw('COUNT(DISTINCT bc.id) as total_beneficiaries'),
                DB::raw('SUM(DISTINCT c.capacity) as total_capacity'),
                DB::raw('COUNT(DISTINCT r.id) + COUNT(DISTINCT bc.id) as total_sum')
            )
            ->join('creches as c', 'd.id', '=', 'c.degree_id')
            ->leftJoin('creche_requests as cr', 'c.id', '=', 'cr.creche_id')
            ->leftJoin('requests as r', function ($join) {
                $join->on('r.id', '=', 'cr.request_id')
                    ->where('r.status_request_id', '=', 2);
            })
            ->leftJoin('beneficiary_creches as bc', function ($join) {
                $join->on('bc.creche_id', '=', 'c.id')
                    ->where('bc.status', '=', 1);
            })
            ->where('c.center_id', '=', $creche)
            ->groupBy('d.id', 'd.name')
            ->get();

        return response()->json($results);
    }

    public function showForProcedure($procedure)
    {
        $user = Auth::user();
        $centers = Center::whereHas('procedures', function ($query) use ($procedure) {
            $query->where('procedures.id', $procedure);
        })->get();

        return response()->json($centers);
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
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Center $center)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Center $center)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Center $center)
    {
        //
    }
}
