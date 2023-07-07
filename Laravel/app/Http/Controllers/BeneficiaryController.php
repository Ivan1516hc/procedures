<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\BeneficiaryCreche;
use App\Models\Creche;
use App\Models\CrecheRequest;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $model = Beneficiary::query();

        $query = $model->has('beneficiaryCreche')->whereHas('beneficiaryCreche.creche', function ($query) use ($user) {
            $query->where('center_id', $user->center_id);
        })
            ->with('beneficiaryCreche.creche', 'beneficiaryCreche.creche.room', 'beneficiaryCreche.creche.degree')
            ->paginate();
        return response()->json($query);
    }

    public function beneficiaryCreche(Request $request)
    {

        $user = Auth::user();

        if ($user->role_id == 1) {
            return;
        }

        $body = $request->all();
        $quote = Creche::where('id', $request->creche_id)->get();
        // return response()->json($quote);
        if (!$quote->isEmpty() && $quote[0]->capacity > $request->quota) {
            BeneficiaryCreche::create([
                'creche_id' => $request->creche_id,
                'beneficiary_id' => $request->beneficiary_id,
                'status' => 1
            ]);
            CrecheRequest::find($request->pivote_id)->update([
                'creche_id' => $request->creche_id
            ]);
            // Quote::find($request->quote_id)->delete();
            $response['message'] = "Beneficiario registrado correctamente en la guarderia";
            $response['code'] = 200;
        } else {
            $response['message'] = "Guarderia Sin Cupos";
            $response['code'] = 202;
        }

        return response()->json($response);
    }

    public function updateBeneficiaryCreche(Request $request)
    {
        $user = Auth::user();
        if ($user->role_id == 1) {
            return;
        }
        $quote = Creche::find($request->creche_id);
        $beneficiaryCreche = BeneficiaryCreche::find($request->pivote_id);
        if (isset($request->status) && $quote && $quote->capacity > $request->quota) {
            $beneficiaryCreche->update([
                'status' => $request->status
            ]);
            $response['message'] = "Beneficiario dado de baja correctamente";
            $response['code'] = 200;
        } else if ($quote && $quote->capacity > $request->quota) {
            $beneficiaryCreche->update([
                'creche_id' => $request->creche_id
            ]);
            $response['message'] = "Beneficiario cambiado correctamente en la guardería";
            $response['code'] = 200;
        } else {
            $response['message'] = "Guardería sin cupos";
            $response['code'] = 202;
        }
        return response()->json($response);
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
    public function show(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiary $beneficiary)
    {
        //
    }
}
