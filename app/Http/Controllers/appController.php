<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Case_person_detail;
use App\Models\Case_company_detail;

class appController extends Controller
{
    public $listCasesPerson = [];
    public $listCasesCompany = [];

    public function create()
    {
        return view('index');
    }

    // Show DataBase info to user view 
    public function show()
    {
        $newCases = Cases::where('status', 0)->count();
        $openCases = Cases::where('status', 1)->where('user_id', Auth::id())->count();
        $finishedCases = Cases::where('status', 2)->where('user_id', Auth::id())->count();
        $arquiveCases = Cases::where('status', 3)->where('user_id', Auth::id())->count();

        $modelCasePerson = Cases::whereNotNull('person_case_id')->where('status', 0)->get();
        $modelCaseCompany = Cases::whereNotNull('company_case_id')->where('status', 0)->get();
        $case_person = Case_person_detail::all();
        $case_company = Case_company_detail::all();

        foreach ($modelCasePerson as $keyP => $valueP) 
        {
            $case_id = $valueP->id;
            $person_case_id = $valueP->person_case_id;

            foreach ($case_person as $keyD => $valueD) 
            {
                if ($person_case_id === $valueD->id) 
                {
                    $this->listCasesPerson[$keyD] = [
                        'case_id' => $case_id,
                        'name' => $valueD['name'],
                        'tel' => $valueD['tel'],
                        'adress' => $valueD['adress'],
                        'email' => $valueD['email'],
                        'created_at' => $valueD['created_at'],
                        'topic' => $valueD['topic'],
                        'textEvent' => $valueD['textEvent'],
                        'is_company' => 0
                    ];
                }
            }
        }

        foreach ($modelCaseCompany as $keyc => $valuec) 
        {
            $case_id = $valuec->id;
            $company_case_id = $valuec->company_case_id;

            foreach ($case_company as $keyC => $valueC) 
            {
                if ($company_case_id == $valueC->id) 
                {
                    $this->listCasesCompany[$case_id] = [
                        'case_id' => $case_id,
                        'name' => $valueC['name'],
                        'tel' => $valueC['tel'],
                        'adress' => $valueC['adressCompany'],
                        'email' => $valueC['email'],
                        'created_at' => $valueC['created_at'],
                        'topic' => $valueC['topic'],
                        'textEvent' => $valueC['textEvent'],
                        'is_company' => 1
                    ];
                }
            }
        }
        // return $this->listCasesCompany;
        return view(
            'pages.user',
            [
                'newCases' => $newCases,
                'openCases' => $openCases,
                'finishedCases' => $finishedCases,
                'arquiveCases' => $arquiveCases,
                'cases' => [
                    'newCasesPerson' => $this->listCasesPerson,
                    'newCasesCompany' => $this->listCasesCompany
                ]
            ]
        );
    }

    public function showAceptes()
    {
        $acepteCase_array = ['company' => [], 'person' => []];

        $openCases = Cases::where('user_id', Auth::id())
        ->where('status', [1, 2])
        ->get();

        foreach($openCases as $key => $value)
        {
            $openCases_company = Case_company_detail::where('id',$value->company_case_id)->first();

            $openCases_person = Case_person_detail::where('id',$value->person_case_id)->first();

            if($openCases_company)
            {
                $acepteCase_array['company'][] = 
                [
                    'case_id' => $value->id,
                    'name' => $openCases_company->name,
                    'tel' => $openCases_company->tel,
                    'adress' => $openCases_company->adressCompany,
                    'email' => $openCases_company->email,
                    'date' => $openCases_company['created_at'],
                    'topic' => $openCases_company['topic'],
                    'textEvent' => $openCases_company['textEvent']
                ];
            } elseif($openCases_person)
            {
                
                $acepteCase_array['person'][] = 
                [
                    'case_id' => $value->id,
                    'name' => $openCases_person->name,
                    'tel' => $openCases_person->tel,
                    'adress' => $openCases_person->adress,
                    'email' => $openCases_person->email,
                    'date' => $openCases_person['created_at'],
                    'topic' => $openCases_person['topic'],
                    'textEvent' => $openCases_person['textEvent']
                ];
            }
        }
        // return $acepteCase_array['person'];
        return view('pages.show_call', ['query' => $acepteCase_array]);
    }

    public function showFinish()
    {
        $finishCase_array = ['company' => [], 'person' => []];

        $openCases = Cases::where('user_id', Auth::id())
        ->where('status', 2)
        ->get();

        foreach($openCases as $key => $value)
        {
            $openCases_company = Case_company_detail::where('id',$value->company_case_id)->first();

            $openCases_person = Case_person_detail::where('id',$value->person_case_id)->first();

            if($openCases_company)
            {
                $finishCase_array['company'][] = 
                [
                    'case_id' => $value->id,
                    'name' => $openCases_company->name,
                    'tel' => $openCases_company->tel,
                    'adress' => $openCases_company->adressCompany,
                    'email' => $openCases_company->email,
                    'date' => $openCases_company['created_at'],
                    'topic' => $openCases_company['topic'],
                    'textEvent' => $openCases_company['textEvent']
                ];
            } elseif($openCases_person)
            {
                
                $finishCase_array['person'][] = 
                [
                    'case_id' => $value->id,
                    'name' => $openCases_person->name,
                    'tel' => $openCases_person->tel,
                    'adress' => $openCases_person->adress,
                    'email' => $openCases_person->email,
                    'date' => $openCases_person['created_at'],
                    'topic' => $openCases_person['topic'],
                    'textEvent' => $openCases_person['textEvent']
                ];
            }
        }
        // return $acepteCase_array['person'];
        return view('pages.finished_call', ['query' => $finishCase_array]);
    }
}
