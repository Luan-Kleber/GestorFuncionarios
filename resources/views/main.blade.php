@extends('templates/main_layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">

            @if(session()->has('mensagem'))
                <div class="alert alert-success text-center p-1 fs-5 fw-bold">
                    {{session()->get('mensagem')}}
                </div>
            @endif

            <div class="row align-items-center mb-3">
                <div class="col">
                    <h4>Funcionários</h4>
                </div>
                <div class="col text-end">
                    <a href="{{ route('novo_funcionario') }}" class="btn btn-primary">
                        <i class="bi bi-plus-square me-2"></i>Novo Funcionário
                    </a>
                </div>
            </div>

            @if(count($funcionarios) > 0)
            <div x-data="{ funcionarios: {{ json_encode($funcionarios) }}, filtro: '' }">

                    <input type="text" x-model="filtro" placeholder="Buscar por nome..." class="form-control mb-4" />

                    <table class="table table-striped table-bordered" width="100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">CPF</th>
                                <th class="text-center">Cargo</th>
                                <th class="text-center">Admissão</th>
                                <th class="text-center">Salário</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="func in funcionarios.filter(f => f.text_funcionario_name.toLowerCase().includes(filtro.toLowerCase()))" :key="func.text_funcionario_cpf">
                                <tr>
                                    <td class="text-center" x-text="func.text_funcionario_name"></td>
                                    <td class="text-center" x-text="func.text_funcionario_email"></td>
                                    <td class="text-center" x-text="func.text_funcionario_cpf"></td>
                                    <td class="text-center" x-text="func.text_funcionario_cargo"></td>
                                    <td class="text-center" x-text="func.date_funcionario_admissao"></td>
                                    <td class="text-center" x-text="func.number_funcionario_salario"></td>
                                    <td class="text-center" x-html="func.funcionarios_acoes"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center opacity-50 my-5">Nenhum funcionário encontrado.</p>
            @endif

        </div>
    </div>
</div>

@endsection