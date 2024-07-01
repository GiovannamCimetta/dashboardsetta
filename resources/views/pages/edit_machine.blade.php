<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Maquinas registradas') }}
        </h2>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <br>
                <div class="container">
                    <h1 class="display-6 text-center">Editar Maquinas registradas</h1>
                    <br>
                    <form action="{{ route('machines.update', $machine->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Codigo_Maquina">Código da Máquina</label>
                                <input type="text" class="form-control" id="Codigo_Maquina" name="Codigo_Maquina"
                                    value="{{ $machine->Codigo_Maquina }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="Fabricante">Fabricante</label>
                                <input type="text" class="form-control" id="Fabricante" name="Fabricante"
                                    value="{{ $machine->Fabricante }}" required>
                            </div>

                            <div class="col-md-3">
                                <label for="Cidade">Cidade</label>
                                <input type="text" class="form-control" id="Cidade" name="Cidade"
                                    value="{{ $machine->Cidade }}" required>
                                <br>
                            </div>

                            <div class="mb-3">
                                <label for="Descrição">Descrição</label>
                                {{-- <input type="text" class="form-control" id="Descrição" name="Descrição" required> --}}
                                <textarea class="form-control" id="Descrição" name="Descrição"
                                value="{{ $machine->Descrição }}" required></textarea>

                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form><br>
                </div>



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </div>
        </div>
    </div>

</x-app-layout>
