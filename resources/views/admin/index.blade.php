<x-app-layout>

    {{-- @php
        $statusStyles = [
            'pendente' => ['badge' => 'bg-amber-100 text-amber-800', 'border' => 'border-1-amber-400'],
            'confirmado' => ['badge' => 'bg-emerald-100 text-emerald-800', 'border' => 'border-1emerald-400'],
            'cancelado' => ['badge' => 'bg-rose-100 text-rose-800', 'border' => 'border-1-rose-400']
        ];
        $fallbackStyle = ['badge' => 'bg-gray-100 text-gray-800', 'border' => 'border-l-gray-300'];
    @endphp

    <div class="py-12" x-data>
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="p-4 bg-green-100 border border-green-200 text-green-800 text-sm rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse ($agendamentos as $agendamento)
                    @php $style = $statusStyles[$agendamento->status] ?? $fallbackStyle; @endphp
                    <div class="bg-white rounded-xl border border-gray-200 border-l-4 {{ $style['border'] }} p-5 flex flex-col">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $agendamento->nome_animal }}</h3>
                            <span class="shrink-0 px-2 py-1 text-xs font-semibold rounded-full {{ $style['badge'] }}">
                                {{ $statuses[$agendamento->status] ?? $agendamento->status }}
                            </span>
                        </div>
 
                        <p class="flex items-center gap-1.5 text-sm text-gray-500">
                            {{ $agendamento->cliente }}
                        </p>

                        <span class="mt-1 w-fit px-2 py-0.5 text-xs font-medium text-indigo-700 bg-indigo-50 rounded">
                            {{ $agendamento->servico }}
                        </span>
 
                        <div class="mt-4 space-y-1.5 text-sm">
                            <p class="text-gray-700">{{ $agendamento->nome }}</p>
                            <p class="flex items-center gap-1.5 text-gray-500">
                                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="14" rx="2"/><polyline points="3,7 12,13 21,7"/>
                                </svg>
                                {{ $agendamento->email }}
                            </p>
                            <p class="flex items-center gap-1.5 text-gray-500">
                                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="16" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="8" y1="3" x2="8" y2="7"/><line x1="16" y1="3" x2="16" y2="7"/>
                                </svg>
                                {{ $agendamento->data->format('d/m/Y') }}
                            </p>
                        </div>
 
                        <div class="mt-4 pt-4 border-t border-gray-100 flex gap-2">
                            <button
                                type="button"
                                @click="$dispatch('open-modal', 'details-modal-{{ $agendamento->id }}')"
                                class="flex-1 text-sm font-medium text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-lg py-2 transition-colors"
                            >
                                Ver detalhes
                            </button>
                            <button
                                type="button"
                                @click="$dispatch('open-modal', 'status-modal-{{ $agendamento->id }}')"
                                class="flex-1 text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 rounded-lg py-2 transition-colors"
                            >
                                Atualizar status
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-sm text-gray-500 bg-white border border-gray-200 rounded-xl py-12">
                        Nenhum agendamento por aqui ainda.
                    </div>
                @endforelse
            </div>
        </div>
    </div> --}}

    @php
        $statusStyles = [
            'pendente' => ['badge' => 'status-pendente'],
            'confirmado' => ['badge' => 'status-confirmado'],
            'cancelado' => ['badge' => 'status-cancelado']
        ];
        $fallbackStyle = ['badge' => 'bg-gray-100 text-gray-800', 'border' => 'border-l-gray-300'];
    @endphp


    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
            <h1>Agendamentos</h1>
            <p class="text-muted mb-0">Visualize e gerencie as solicitações recebidas pelo site.</p>
        </div>
    </div>

    <div class="row g-3 mb-4" id="statCards"></div>

    <div class="admin-table-wrap">
        <div class="table-responsive">
            <table class="table admin-table">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Nome Animal</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($agendamentos as $agendamento)
                        @php $style = $statusStyles[$agendamento->status] ?? $fallbackStyle; @endphp
                        <tr>
                            <td>{{ $agendamento->cliente }}</td>
                            <td>{{ $agendamento->nome_animal }}</td>
                            <td>{{ $agendamento->servico }}</td>
                            <td>{{ $agendamento->data->format('d/m/Y') }}</td>
                            <td>
                                <span class="status-badge {{ $style['badge'] }}">{{ $statuses[$agendamento->status] ?? $agendamento->status }}</span>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
