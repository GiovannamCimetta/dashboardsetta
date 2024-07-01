<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Seja Bem vindo(a) {{ Auth::user()->name }}
        </h2>
        {{-- <meta HTTP-EQUIV='refresh' CONTENT='30'> --}}
        <style>
            #cadastro1 {
                color: #ffffff;
                background: rgb(116, 199, 115);
                border: none;
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 1000;
                border-radius: 50%;
                width: 60px;
                height: 60px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 24px;
            }


            .statistics {
                color: var(--dk-gray-200);
            }

            .statistics .box {
                background-color: var(--dk-dark-bg);
            }

            .statistics .box i {
                width: 60px;
                height: 60px;
                line-height: 60px;
                color: #ffffff
            }

            .statistics .box p {
                color: var(--dk-gray-400);
            }

            #atualizar-todos {
                border: none;
                position: fixed;
                bottom: 90px;
                right: 20px;
                z-index: 1000;
                border-radius: 50%;
                width: 60px;
                height: 60px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 24px;
        background: rgb(255, 193, 7); /* Cor diferente para o botão de atualizar */
    }
        </style>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-cards />
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-grafico1 />
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-grafico2 />
            </div>
        </div>
    </div>
</x-app-layout>
