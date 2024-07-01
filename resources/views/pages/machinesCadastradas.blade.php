{{-- @if (session('sucess'))
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">
    <div class="toast show align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-body">
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            {{ session('sucess') }}
        </div>
    </div>
</div>
</div>
@endif --}}
<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maquinas cadastradas') }}
        </h2>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .text-bg-primary {
                background-color: #28a745 !important;
                /* Verde */
                color: #fff !important;

            }

            #cadastro {
                color: #ffffff;
                background: rgb(116, 199, 115);
                border: none;
                position: absolute;


                margin-top: -20px;
                right: 64px;

                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 24px;

            }
            @media (min-width: 2000px) {#cadastro {
                color: #ffffff;
                background: rgb(116, 199, 115);
                border: none;
                position: absolute;


                margin-top: -20px;
                right: 700px;

                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 24px;

            }}
            @media (max-width: 800px) {#cadastro {
                color: #ffffff;
                background: rgb(116, 199, 115);
                border: none;
                position: absolute;


                margin-top: -14px;
                right: 1px;

                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 12px;

            }}}

        </style>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">






                <div class="container">
                    <h1 class="display-6 text-center">Máquinas Cadastradas</h1> <br>

                    <table class="table table-hover  ">
                        <thead class="table">
                            <tr>
                                <th scope="col">ID maquina</th>
                                <th scope="col">Fabricante</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Cidade</th>
                                <th scope="col"> Eficiencia</th>
                                <th scope="col"> Temperatura</th>
                                <th scope="col"> </th>
                                <th scope="col"> </th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($machines as $machine)
                                <tr>
                                    <th scope="row" class="text-muted mb-0 "> {{ $machine->Codigo_Maquina }} </th>
                                    <td>{{ $machine->Fabricante }}</td>
                                    <td>{{ $machine->Descrição }}</td>
                                    <td> {{ $machine->Cidade }}</td>
                                    <td> {{ $machine->Eficiencia }}%</td>
                                    <td> {{ $machine->Temperatura }}°C</td>
                                    <td>

                                        <form action="{{ route('machines.destroy', $machine->id) }}" method="POST"
                                            class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('machines.edit', $machine->id) }}"
                                            class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('machines.updateTemperature', $machine->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info">Atualizar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>





                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </div>
        </div>
    </div>

</x-app-layout>
