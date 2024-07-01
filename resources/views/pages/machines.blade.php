 {{-- <!DOCTYPE html>
<html>
<head>
    <title>Máquinas</title>
    <style>
        .form-delete {
            display: inline-block;
        }
        .form-edit {
            display: inline-block;
        }
    </style>
</head>


 <body>
    <div class="container">
        <h1>Cadastro de Máquinas</h1>
        <form action="{{ route('machines.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Codigo_Maquina">Código da Máquina</label>
                <input type="text" class="form-control" id="Codigo_Maquina" name="Codigo_Maquina" required>
            </div>
            <div class="form-group">
                <label for="Fabricante">Fabricante</label>
                <input type="text" class="form-control" id="Fabricante" name="Fabricante" required>
            </div>
            <div class="form-group">
                <label for="Descrição">Descrição</label>
                <input type="text" class="form-control" id="Descrição" name="Descrição" required>
            </div>
            <div class="form-group">
                <label for="Cidade">Cidade</label>
                <input type="text" class="form-control" id="Cidade" name="Cidade" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <h2>Máquinas Cadastradas</h2>
        <ul>
            @foreach ($machines as $machine)
                <li>
                    {{ $machine->Codigo_Maquina }} - {{ $machine->Fabricante }} - {{ $machine->Descrição }} - {{ $machine->Cidade }} - {{ $machine->Eficiencia }}% - {{ $machine->Temperatura }}°C
                    <form action="{{ route('machines.destroy', $machine->id) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('machines.edit', $machine->id) }}" class="btn btn-warning">Edit</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html> --}}
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
         @endif --}}


 <x-app-layout>
     <x-slot name="header">

         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Cadastro de Maquinas') }}
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
                <h1 class="display-6 text-center">Cadastro de Máquinas</h1>
<br>
                 <form class="row g-3" action="{{ route('machines.store') }}" method="POST">
                    <div class="row">
                     @csrf
                     <div class="col-md-3">
                         <label for="Codigo_Maquina">Código da Máquina</label>
                         <input type="text" class="form-control" id="Codigo_Maquina" name="Codigo_Maquina" required>
                     </div>
                     <div class="col-md-3">
                         <label for="Fabricante">Fabricante</label>
                         <input type="text" class="form-control" id="Fabricante" name="Fabricante" required>
                     </div>

                     <div class="col-md-3">
                         <label for="Cidade">Cidade</label>
                         <input type="text" class="form-control" id="Cidade" name="Cidade" required>
                         <br>
                     </div>

                     <div class="mb-3">
                        <label for="Descrição">Descrição</label>
                        {{-- <input type="text" class="form-control" id="Descrição" name="Descrição" required> --}}
                        <textarea class="form-control" id="Descrição" name="Descrição" rows="3" required></textarea>
                    </div>
                </div>
                <div class="col-12">
                     <button type="submit" class="btn btn-primary">Cadastrar</button></div>
                 </form><br></div>



                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
             </div>
         </div>
     </div>

 </x-app-layout>
