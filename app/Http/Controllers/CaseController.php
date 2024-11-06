<?php

namespace App\Http\Controllers;

// use Auth;
// use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Case_person_detail;
use App\Models\Case_company_detail;
use App\Models\Cases;

use App\Mail\Sac;
use Illuminate\Support\Facades\Mail;
// use App\Models\User_cases;

class CaseController extends Controller
{
    public function create(Request $req) : RedirectResponse
    {
        $array_req = $req->all();
        switch (true) 
        {
            case array_key_exists('cpf', $array_req):
                $req->validate(
                    [
                        'topic' => 'string|max:60|required',
                        'Defendant' => 'string|max:100|required',
                        'rg' => 'string|max:12|nullable',
                        'cpf' => 'required|cpf|max:14',
                        'adress' => 'string',
                        'date' => 'required|date',
                        'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,avi,mov,wmv,mp3,wav,pdf,txt,doc,docx|max:30120',
                        'name' => 'required|string|min:3|max:100',
                        'tel' => 'string|size:14',
                        'email' => 'string|min:6|max:100|email|required',
                        'textEvent' => 'string|required|max:5000'
                    ],
                    [
                        'topic.required' => 'O campo "Tema da Ação" é obrigatório.',
                        'topic.max' => 'O campo "Tema da Ação" não pode ter mais que 60 caracteres.',
                        'topic.string' => 'O campo "Tema da Ação" não é valido.',
                        'Defendant.required' => 'O Nome do Acusado é obrigatório.',
                        'Defendant.max' => 'O Nome do Acusado não pode ter mais que 100 caracteres.',
                        'Defendant.string' => 'O campo Nome do Acusado so aceita Texto',
                        'rg.max' => 'O campo RG não pode ter mais que 12 caracteres.',
                        'rg.string' => 'O campo RG não é valido',
                        'cpf.required' => 'O campo CPF e obrigatorio.',
                        'cpf.string' => 'O campo CPF tem que ser um numero.',
                        'cpf.cpf' => 'O CPF fornecido não é válido.',
                        'cpf.max' => 'O CPF não pode ter mais que 14 caracteres.',
                        'adress.string' => 'O endereço deve ser um texto válido.',
                        'date.required' => 'O campo data é obrigatório.',
                        'date.date' => 'O campo data não é válido.',
                        'file.mimes' => 'O arquivo deve ser um dos seguintes formatos: jpg, jpeg, png, mp4, avi, mov, wmv, mp3, wav, pdf, txt, doc, docx.',
                        'file.max' => 'O arquivo não pode ser maior que 30MB.',
                        'name.required' => 'O campo "nome" é obrigatório.',
                        'name.min' => 'O nome deve ter no mínimo 3 caracteres.',
                        'name.max' => 'O nome não pode ter mais que 100 caracteres.',
                        'tel.size' => 'O telefone deve ter exatamente 14 caracteres.',
                        'tel.string' => 'O campo telefone não é valido..',
                        'email.required' => 'O campo "email" é obrigatório.',
                        'email.string' => 'O campo "email" não é validos.',
                        'email.min' => 'O campo "email" possue menos de 6 caracteres.',
                        'email.email' => 'O e-mail fornecido não é válido.',
                        'email.max' => 'O e-mail não pode ter mais que 100 caracteres.',
                        'textEvent.required' => 'O campo "descrição do evento" é obrigatório.',
                        'textEvent.string' => 'O campo "descrição não é valido.',
                        'textEvent.max' => 'A descrição do evento não pode ter mais que 5000 caracteres.'
                    ]
                );

                $email = $req['email'];
                $user_name = $req['name'];
                
                $create_user = $this->create_user_db($user_name, $email);
                $retorno = $this->create_case_person($array_req, $create_user['id']);

                // Mail::to($email)->send(new Sac($user_name, $create_user[ 'password']));

                if ($retorno > 0) {
                    return redirect()->back()->with('success', "Reclamação feita com sucesso, agora é so aguardar que nossos advogados iram entrar em contato com você ! Criamos uma conta para você, caso seja necessário, sua Conta é seu EMAIL e sua SENHA é {$create_user['password']}, guarde em segurança !")
                        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', '0');
                } else {
                    return redirect()->back()->with('error', 'Dados incorretos. Por favor, reenvie as informações com cuidado.');
                }



            // COMPANY CHOISE 



            case array_key_exists('cnpj', $array_req):
                $req->validate(
                    [
                        'topic' => 'string|max:60|required',
                        'company' => 'string|max:100|required',
                        'cnpj' => 'string|max:12',
                        'adressCompany' => 'string',
                        'date' => 'required|date',
                        'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,avi,mov,wmv,mp3,wav,pdf,txt,doc,docx|max:30120',
                        'name' => 'required|string|min:3|max:100',
                        'tel' => 'string|size:14',
                        'email' => 'string|min:6|max:100|email|required',
                        'textEvent' => 'string|required|max:5000'
                    ],
                    [
                        'topic.required' => 'O campo "Tema da Ação" é obrigatório.',
                        'topic.max' => 'O campo "Tema da Ação" não pode ter mais que 60 caracteres.',
                        'topic.string' => 'O campo "Tema da Ação" não é valido.',
                        'company.required' => 'O Nome da Empresa é obrigatório.',
                        'company.max' => 'O Nome da Empresa não pode ter mais que 100 caracteres.',
                        'company.string' => 'O campo Nome da Empresa so aceita Texto',
                        'cnpj.required' => 'O campo CNPJ é obrigatório.',
                        'cnpj.string' => 'O campo CNPJ tem que ser um numero.',
                        'cnpj.cpf' => 'O cnpj fornecido não é válido.',
                        'cnpj.max' => 'O cnpj não pode ter mais que 14 caracteres.',
                        'adressCompany.string' => 'O endereço deve ser um texto válido.',
                        'date.required' => 'O campo data é obrigatório.',
                        'date.date' => 'O campo data não é válido.',
                        'file.mimes' => 'O arquivo deve ser um dos seguintes formatos: jpg, jpeg, png, mp4, avi, mov, wmv, mp3, wav, pdf, txt, doc, docx.',
                        'file.max' => 'O arquivo não pode ser maior que 30MB.',
                        'name.required' => 'O campo "nome" é obrigatório.',
                        'name.min' => 'O nome deve ter no mínimo 3 caracteres.',
                        'name.max' => 'O nome não pode ter mais que 100 caracteres.',
                        'tel.size' => 'O telefone deve ter exatamente 14 caracteres.',
                        'tel.string' => 'O campo telefone não é valido..',
                        'email.required' => 'O campo "email" é obrigatório.',
                        'email.string' => 'O campo "email" não é validos.',
                        'email.min' => 'O campo "email" possuí menos de 6 caracteres.',
                        'email.email' => 'O e-mail fornecido não é válido.',
                        'email.max' => 'O e-mail não pode ter mais que 100 caracteres.',
                        'textEvent.required' => 'O campo "descrição do evento" é obrigatório.',
                        'textEvent.string' => 'O campo "descrição não é valido.',
                        'textEvent.max' => 'A descrição do evento não pode ter mais que 5000 caracteres.'
                    ]
                );

                $email = $req['email'];
                $user_name = $req['name'];

                $create_user = $this->create_user_db($user_name, $email);
                $retorno = $this->create_case_company($array_req,$create_user['id']);

                // Mail::to($email)->send(new Sac($user_name, $create_user[ 'password']));

                if ($retorno > 0) {
                    return redirect()->back()->with('success', "Reclamação feita com sucesso, agora é so aguardar que nossos advogados iram entrar em contato com você ! Criamos uma conta para você, caso seja necessário, sua Conta é seu EMAIL e sua SENHA é {$create_user[ 'password']}, guarde em segurança !")
                        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', '0');
                } else {
                    return redirect()->back()->with('error', 'Dados incorretos. Por favor, reenvie as informações com cuidado.');
                }
            default:
                return redirect()->back()->with('error', 'Dados incorretos. Por favor, reenvie as informações com cuidado.');
        }
    }

    private function create_user_db(string $name, string $email) : array    
    {
        $model = new User();

        if ($model) {
            $model->name = $name;
            $model->email = $email;
            $rdm_temp_pass = Str::random(8);
            $model->password = bcrypt($rdm_temp_pass);
            $model_save = ($model->save()) ? true : false;
            if($model_save)
            {
                return ['id' => $model->id, 'password' => $rdm_temp_pass];
            }
        }
    }

    private function create_case_person(array $list, $id) : int
    {
        $model = new Case_person_detail();
        $model->date = $list['date'];
        $model->client_id = $id;
        $model->Defendant = $list['Defendant'];
        $model->name = $list['name'];
        $model->adress = $list['adress'];
        $model->tel = $list['tel'];
        $model->textEvent = $list['textEvent'];
        $model->email = $list['email'];
        $model->topic = $list['topic'];
        $model->cpf = $list['cpf'];
        $model->rg = $list['rg'];
        // $model->client_id = Auth::user()->id;
        isset($list['filesPath']) ? $model->filesPath = $list['filesPath'] : $model->filesPath = 'Sem arquivo';

        if ($model->save()) {
            $cases = new Cases();
            $cases->person_case_id = $model->id; // Relacionando com a pessoa
            return $cases->save() ? 1 : 0;
        }
    }

    private function create_case_company(array $list, $id) : int
    {
        $model = new Case_company_detail();
        $model->company = $list['company'];
        $model->client_id = $id;
        $model->cnpj = $list['cnpj'];
        $model->name = $list['name'];
        $model->adressCompany = $list['adressCompany'];
        $model->topic = $list['topic'];
        $model->email = $list['email'];
        $model->tel = $list['tel'];
        $model->date = $list['date'];
        $model->textEvent = $list['textEvent'];
        // $model->client_id = Auth::user()->id;
        isset($list['filesPath']) ? $model->filesPath = $list['filesPath'] : $model->filesPath = 'Sem arquivo';

        if ($model->save()) {
            $cases = new Cases();
            $cases->company_case_id = $model->id;
            return $cases->save() ? 1 : 0;
        }
    }
}