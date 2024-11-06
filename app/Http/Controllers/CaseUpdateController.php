<?php


namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Case_person_detail;
use App\Models\Case_company_detail;
use App\Models\User;
use Illuminate\Http\Request;

class CaseUpdateController extends Controller
{
    public function update(Request $req)
    {
        $cases_table = Cases::where('id', $req['case_id'])->first();
        // return $req;
        
        if ($cases_table) {

            $cases_table->user_id = $req->user_id;
            $cases_table->status = 1;
            $cases_table->save();
            return redirect()->back()->with('success','Causa aceita com sucesso !');
        } else {
            return response()->json(['message' => 'Case not found'], 404);
        }
    }

    public function confirm(Request $req)
    {
        // 0 new 
        // 1 accept 
        // 2 finished 
        // 3 arquived

        $cases_table = Cases::where('id', $req['case_id'])->first();
        $cases_table->status = 2;
        $cases_table->save();
        return redirect()->back()->with('success','Parabéns caso finalizado');
    }
    
}


