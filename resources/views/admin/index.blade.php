<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table>
                <thead>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Opções</th>
                </thead>
                <tbody>
                    @forelse ($agendamentos as $agendamento)
                        <tr>
                            <td>{{ $agendamento->cliente }}</td>
                            <td>{{ $agendamento->servico }}</td>
                            <td>{{ $agendamento->data }}</td>
                            <td>{{ $agendamento->status }}</td>
                            <td>
                                <button>Visualizar</button>
                                <button>Atualizar</button>
                                <button>Cancelar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Vazio</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>{{ $agendamentos->links() }}</tr>
                </tfoot>
            </table>
        </div>
    </div>
</x-app-layout>
