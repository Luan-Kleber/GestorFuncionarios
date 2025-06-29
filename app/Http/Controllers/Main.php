<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\AdminModel;
use App\Models\FuncionarioModel;
use Illuminate\Support\Facades\Crypt;

class Main extends Controller
{
    /**
     * Página Principal
     */
    public function index()
    {
        $data = [
            'title' => 'Gestão de Funcionários',
            'funcionarios' => $this->_get_funcionarios()
        ];

        return view('main', $data);
    }

    /**
     * Login
     */
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('login_frm', $data);
    }

    public function login_submit(Request $request)
    {
        // form validation
        $request->validate([
            'text_username' => 'required|min:3',
            'text_password' => 'required|min:3',
        ], [
            'text_username.required' => 'O campo é de preenchimento obrigatório.',
            'text_username.min' => 'O campo deve ter no mínimo 3 caracteres.',
            'text_password.required' => 'O campo é de preenchimento obrigatório.',
            'text_password.min' => 'O campo deve ter no mínimo 3 caracteres.',
        ]);

        //get form data
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        //check if user exists
        $model = new AdminModel();
        $admin = $model->where('username', '=', $username)
                ->where('admin', '=', 't')
                ->first();

        if($admin) {

            // check if password is correct
            if(password_verify($password, $admin->password)) {
                
                $session_data = [
                    'id' => $admin->id,
                    'username' => $admin->username
                ];

                session()->put($session_data);

                return redirect()->route('index');
            }
        }

        // invalid login
        return redirect()->route('login')->withInput()->with('login_error', 'Login Inválido');
    }

    /**
     * Logout
    */
    public function logout()
    {
        session()->forget('username');
        return redirect()->route('login');
    }

    /**
     * Inserir
    */
    public function novo_funcionario()
    {
        $data = [
            'title' => 'Novo Funcionário'
        ];

        return view('novo_funcionario_frm', $data);
    }

    public function novo_funcionario_submit(Request $request)
    {
        // form validation
        $request->validate([
            'text_funcionario_name'         => 'required|min:4|max:200',
            'text_funcionario_email'        => 'required|email|max:50',
            'text_funcionario_cpf'          => 'required|digits:11',
            'text_funcionario_cargo'        => 'required|min:5|max:50',
            'date_funcionario_admissao'     => 'required|date',
            'number_funcionario_salario'   => 'required|numeric|min:0|max:999999.99',
        ], [
            'text_funcionario_name.required' => 'O campo é de preenchimento obrigatório.',
            'text_funcionario_name.min' => 'O campo deve ter no mínimo :min caracteres.',
            'text_funcionario_name.max' => 'O campo deve ter no máximo :max caracteres.',

            'text_funcionario_email.required' => 'O campo é de preenchimento obrigatório.',
            'text_funcionario_email.email' => 'O e-mail informado não é válido.',
            'text_funcionario_email.max' => 'O campo deve ter no máximo :max caracteres.',

            'text_funcionario_cpf.required' => 'O campo é de preenchimento obrigatório.',
            'text_funcionario_cpf.digits' => 'O CPF deve conter exatamente :digits dígitos.',

            'text_funcionario_cargo.required' => 'O campo é de preenchimento obrigatório.',
            'text_funcionario_cargo.min' => 'O campo deve ter no mínimo :min caracteres.',
            'text_funcionario_cargo.max' => 'O campo deve ter no máximo :max caracteres.',

            'date_funcionario_admissao.required' => 'O campo é de preenchimento obrigatório.',
            'date_funcionario_admissao.date' => 'A data informada não é válida.',

            'number_funcionario_salario.required' => 'O campo é de preenchimento obrigatório.',
            'number_funcionario_salario.min' => 'O campo deve ter no mínimo :min caracteres.',
            'number_funcionario_salario.numeric' => 'O campo deve conter um valor numérico.',
        ]);

        //check if user exists
        $model = new FuncionarioModel();
        
        $funcionario = $model->where('id', '=', session('id'))
                ->where('cpf', '=', $request->input('text_funcionario_cpf'))
                ->first();

        if($funcionario) {
            return redirect()->route('novo_funcionario')->with('funcionario_error', 'Já existe um funcionário com o mesmo nome.');
        }
        
        //insert
        $model->nome = $request->input('text_funcionario_name');
        $model->email = $request->input('text_funcionario_email');
        $model->cpf = $request->input('text_funcionario_cpf');
        $model->cargo = $request->input('text_funcionario_cargo');
        $model->dataAdmissao = $request->input('date_funcionario_admissao');
        $model->salario = $request->input('number_funcionario_salario');
        $model->created_at = date('Y-m-d H:s:i');
        $model->save();

        return redirect()->route('index')->with('mensagem', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * editar
    */
    public function editar_funcionario($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return redirect()->route('index');
        }

        // get data
        $model = new FuncionarioModel();
        $funcionario = $model->where('id', '=', $id)
                ->first();

        // check if exists
        if(!$funcionario) {
            return redirect()->route('index');
        }

        $data = [
            'title' => 'Editar Funcionário',
            'funcionario' => $funcionario
        ];

        return view('editar_funcionario_frm', $data);
    }

    public function editar_funcionario_submit(Request $request)
    {
        // form validation
        $request->validate([
            'text_funcionario_name'         => 'required|min:4|max:200',
            'text_funcionario_email'        => 'required|email|max:50',
            'text_funcionario_cpf'          => 'required|digits:11',
            'text_funcionario_cargo'        => 'required|min:5|max:50',
            'date_funcionario_admissao'     => 'required|date',
            'number_funcionario_salario'    => 'required|numeric|min:0|max:999999.99',
        ], [
            'text_funcionario_name.required' => 'O campo é de preenchimento obrigatório.',
            'text_funcionario_name.min' => 'O campo deve ter no mínimo :min caracteres.',
            'text_funcionario_name.max' => 'O campo deve ter no máximo :max caracteres.',

            'text_funcionario_email.required' => 'O campo é de preenchimento obrigatório.',
            'text_funcionario_email.email' => 'O e-mail informado não é válido.',
            'text_funcionario_email.max' => 'O campo deve ter no máximo :max caracteres.',

            'text_funcionario_cpf.required' => 'O campo é de preenchimento obrigatório.',
            'text_funcionario_cpf.digits' => 'O CPF deve conter exatamente :digits dígitos.',

            'text_funcionario_cargo.required' => 'O campo é de preenchimento obrigatório.',
            'text_funcionario_cargo.min' => 'O campo deve ter no mínimo :min caracteres.',
            'text_funcionario_cargo.max' => 'O campo deve ter no máximo :max caracteres.',

            'date_funcionario_admissao.required' => 'O campo é de preenchimento obrigatório.',
            'date_funcionario_admissao.date' => 'A data informada não é válida.',

            'number_funcionario_salario.required' => 'O campo é de preenchimento obrigatório.',
            'number_funcionario_salario.min' => 'O campo deve ter no mínimo :min caracteres.',
            'number_funcionario_salario.numeric' => 'O campo deve conter um valor numérico.',
        ]);

        $funcionario_id = Crypt::decrypt($request->input('funcionario_id'));

        $funcionario = FuncionarioModel::find($funcionario_id);

        if ($funcionario) {
            $funcionario->nome         = $request->input('text_funcionario_name');
            $funcionario->email        = $request->input('text_funcionario_email');
            $funcionario->cpf          = $request->input('text_funcionario_cpf');
            $funcionario->cargo        = $request->input('text_funcionario_cargo');
            $funcionario->dataAdmissao = $request->input('date_funcionario_admissao');
            $funcionario->salario      = $request->input('number_funcionario_salario');
            $funcionario->updated_at   = date('Y-m-d H:i:s');
            $funcionario->save();
        } else {
            return redirect()->route('editar_funcionario', ['id' => Crypt::encrypt($funcionario_id)])->with('funcionario_error', 'Erro ao editar funcionário.');
        }

        return redirect()->route('index')->with('mensagem', 'Funcionário atualizado com sucesso!');

    }

    /**
     * Excluir 
    */
    public function delete_funcionario($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return redirect()->route('index');
        }

        // get data
        $model = new FuncionarioModel();
        $funcionario = $model->where('id', '=', $id)
                ->first();

        // check if exists
        if(!$funcionario) {
            return redirect()->route('index');
        }

        $data = [
            'title' => 'Exluir Funcionário',
            'funcionario' => $funcionario
        ];

        return view('delete_funcionario_frm', $data);
    }

    public function delete_funcionario_submit(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->input('funcionario_id'));
        } catch (\Exception $e) {
            return redirect()->route('index');
        }

        FuncionarioModel::where('id', $id)->delete();

        return redirect()->route('index')->with('mensagem', 'Funcionário deletado com sucesso!');
    }

    /**
     * private methods
    */
    private function _get_funcionarios()
    {
        $model = new FuncionarioModel;

        $funionarios = $model->get();

        $collection = [];

        foreach($funionarios as $funcionario) {

            $link_edit = '<a href="'.route('editar_funcionario', ['id' => Crypt::encrypt($funcionario->id)]).'" class="btn btn-secondary me-2"><i class="bi bi-pencil-square"></i></a>';
            $link_delete = '<a href="'.route('delete_funcionario', ['id' => Crypt::encrypt($funcionario->id)]).'" class="btn btn-danger"><i class="bi bi-trash"></i></a>';

            $collection[] = [
                'text_funcionario_name' => $funcionario->nome,
                'text_funcionario_email' => $funcionario->email,
                'text_funcionario_cpf' => $funcionario->cpf,
                'text_funcionario_cargo' => $funcionario->cargo,
                'date_funcionario_admissao' => Carbon::parse($funcionario->dataAdmissao)->format('d/m/Y'),
                'number_funcionario_salario' => $funcionario->salario,
                'funcionarios_acoes' => $link_edit . $link_delete
            ];

        }

        return $collection;
    }

}
