@extends('templates/main_layout')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col">
            <h4>{{$title}}</h4>
            <hr>

            <form action="{{route('editar_funcionario_submit')}}" method="post">
                @csrf

                <input type="hidden" name="funcionario_id" value="{{Crypt::encrypt($funcionario->id)}}">

                <div class="row">
                    {{-- funcionario --}}
                    <div class="col">
                        <div class="mb-3">
                            <label for="text_funcionario_name" class="form-label">Nome</label>
                                <input type="text" name="text_funcionario_name" id="text_funcionario_name" class="form-control" placeholder="Nome do funcionário" required value="{{old('text_funcionario_name', $funcionario->nome)}}">
                                @error('text_funcionario_name')
                                    <div class="text-warning">{{$errors->get('text_funcionario_name')[0]}}</div>
                                @enderror
                        </div>
                    </div>

                    {{-- email --}}
                    <div class="col">
                        <div class="mb-3">
                            <label for="text_funcionario_email" class="form-label">E-mail</label>
                            <input type="text" name="text_funcionario_email" id="text_funcionario_email" class="form-control" placeholder="E-mail do funcionário" required value="{{old('text_funcionario_email', $funcionario->email)}}">
                            @error('text_funcionario_email')
                                <div class="text-warning">{{$errors->get('text_funcionario_email')[0]}}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- cpf --}}
                    <div class="col">
                        <div class="mb-3">
                            <label for="text_funcionario_cpf" class="form-label">CPF</label>
                            <input type="text" name="text_funcionario_cpf" id="text_funcionario_cpf" class="form-control" maxlength="11" placeholder="CPF do funcionário" required value="{{old('text_funcionario_cpf', $funcionario->cpf)}}">
                            @error('text_funcionario_cpf')
                                <div class="text-warning">{{$errors->get('text_funcionario_cpf')[0]}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- cargo --}}
                    <div class="col">
                        <div class="mb-3">
                            <label for="text_funcionario_cargo" class="form-label">Cargo</label>
                            <input type="text" name="text_funcionario_cargo" id="text_funcionario_cargo" class="form-control" placeholder="Cargo do funcionário" required value="{{old('text_funcionario_cargo', $funcionario->cargo)}}">
                            @error('text_funcionario_cargo')
                                <div class="text-warning">{{$errors->get('text_funcionario_cargo')[0]}}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- admissao --}}
                    <div class="col">
                        <div class="mb-3">
                            <label for="date_funcionario_admissao" class="form-label">Admissão</label>
                            <input type="date" name="date_funcionario_admissao" id="date_funcionario_admissao" class="form-control" required value="{{old('date_funcionario_admissao', $funcionario->dataAdmissao)}}">
                            @error('date_funcionario_admissao')
                                <div class="text-warning">{{$errors->get('date_funcionario_admissao')[0]}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- salario --}}
                    <div class="col">
                        <div class="mb-3">
                            <label for="number_funcionario_salario" class="form-label">Salário</label>
                            <input type="number" name="number_funcionario_salario" id="number_funcionario_salario" step="0.01" min="0" class="form-control" placeholder="Salário do funcionário" required value="{{old('number_funcionario_salario', $funcionario->salario)}}">
                            @error('number_funcionario_salario')
                                <div class="text-warning">{{$errors->get('number_funcionario_salario')[0]}}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- cancel or submit --}}
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-secondary px-5 m-1"><i class="bi bi-floppy me-2"></i>Guardar</button>
                    <a href="{{route('index')}}" class="btn btn-dark px-5 m-1"><i class="bi bi-x-circle me-2"></i>Cancelar</a>
                </div>
            </form>
            
            @if(session()->has('funcionario_error'))
                <div class="alert alert-danger text-center p-1">
                    {{session()->get('funcionario_error')}}
                </div>
            @endif

        </div>
    </div>
</div>
    
@endsection