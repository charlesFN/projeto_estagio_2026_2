<x-app-layout>
    @php
        $statusStyles = [
            'pendente' => ['badge' => 'status-pendente'],
            'confirmado' => ['badge' => 'status-confirmado'],
            'cancelado' => ['badge' => 'status-cancelado']
        ];
        $fallbackStyle = ['badge' => 'bg-gray-100 text-gray-800', 'border' => 'border-l-gray-300'];
    @endphp

    {{-- Cabeçalho da página --}}
    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
            <h1>Agendamentos</h1>
            <p class="text-muted mb-0">Visualize e gerencie as solicitações recebidas pelo site.</p>
        </div>
    </div>

    {{-- Contador de registros --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <span class="stat-card__value">{{ $total }}</span>
                <span class="stat-card__label">Total</span>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card stat-card--pendente">
                <span class="stat-card__value">{{ $pendentes }}</span>
                <span class="stat-card__label">Pendentes</span>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card stat-card--confirmado">
                <span class="stat-card__value">{{ $confirmados }}</span>
                <span class="stat-card__label">Confirmados</span>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card stat-card--cancelado">
                <span class="stat-card__value">{{ $cancelados }}</span>
                <span class="stat-card__label">Cancelados</span>
            </div>
        </div>
    </div>

    {{-- Listagem de registros mobile --}}
    <div class="py-6 d-block d-md-none" x-data>
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="p-4 bg-green-100 border border-green-200 text-green-800 text-sm rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse ($agendamentos as $agendamento)
                    @php $style = $statusStyles[$agendamento->status] ?? $fallbackStyle; @endphp
                    <div class="bg-white rounded-xl border border-gray-200 border-l-4 p-5 flex flex-col">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $agendamento->nome_animal }}</h3>
                            <span class="status-badge {{ $style['badge'] }}">
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
                                @click="$dispatch('open-modal', 'detalhes-modal-{{ $agendamento->id }}')"
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

            @if ($agendamentos->hasPages())
                <div>
                    {{ $agendamentos->links() }}
                </div>
            @endif
        </div>
    </div>

    {{-- Listagem de registros para desktop --}}
    <div class="d-none d-md-block" x-data>
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
                        @forelse ($agendamentos as $agendamento)
                            @php $style = $statusStyles[$agendamento->status] ?? $fallbackStyle; @endphp
                            <tr>
                                <td>{{ $agendamento->cliente }}</td>
                                <td>{{ $agendamento->nome_animal }}</td>
                                <td>{{ $agendamento->servico }}</td>
                                <td>{{ $agendamento->data->format('d/m/Y') }}</td>
                                <td>
                                    <span class="status-badge {{ $style['badge'] }}">{{ $statuses[$agendamento->status] ?? $agendamento->status }}</span>
                                </td>
                                <td>
                                    <button
                                        type="button"
                                        @click="$dispatch('open-modal', 'detalhes-modal-{{ $agendamento->id }}')"
                                        class="flex-1 text-sm font-medium text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-lg py-2 transition-colors"
                                    >
                                        Ver detalhes
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="col-span-full text-center text-sm text-gray-500 bg-white border border-gray-200 rounded-xl py-12" colspan="6">
                                    Nenhum agendamento por aqui ainda.
                                </td>
                            </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- -Paginação --}}
        @if ($agendamentos->hasPages())
            <div>
                {{ $agendamentos->links() }}
            </div>
        @endif
    </div>

    {{-- Modal de visualização de dados --}}
    @foreach ($agendamentos as $agendamento)
        @php $style = $statusStyles[$agendamento->status] ?? $fallbackStyle; @endphp

        <x-modal name="detalhes-modal-{{ $agendamento->id }}" maxWidth="md">
            <div class="p-6">
                <div class="flex items-start justify-between gap-2 mb-4">
                    <h2 class="text-lg font-semibold text-gray-900">{{ $agendamento->nome_animal }}</h2>
                    <span class="status-badge {{ $style['badge'] }}">
                        {{ $statuses[$agendamento->status] ?? $agendamento->status }}
                    </span>
                </div>

                <dl class="space-y-3 text-sm">
                    <div class="border-b border-gray-100 pb-2">
                        <dt class="text-gray-500">Tutor</dt>
                        <dd class="text-gray-900 font-medium">{{ $agendamento->cliente }}</dd>
                    </div>
                    <div class=border-b border-gray-100 pb-2">
                        <dt class="text-gray-500">E-mail</dt>
                        <dd class="text-gray-900 font-medium">{{ $agendamento->email }}</dd>
                    </div>
                    <div class="border-b border-gray-100 pb-2">
                        <dt class="text-gray-500">Serviço</dt>
                        <dd class="text-gray-900 font-medium">{{ $agendamento->servico }}</dd>
                    </div>
                    <div class="border-b border-gray-100 pb-2">
                        <dt class="text-gray-500">Data</dt>
                        <dd class="text-gray-900 font-medium">{{ $agendamento->data->format('d/m/Y') }}</dd>
                    </div>
                    <div class="border-b border-gray-100">
                        <dt class="text-gray-500">Observações</dt>
                        <dd class="text-gray-900 font-medium">{{ $agendamento->observacoes }}</dd>
                    </div>
                </dl>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        Fechar
                    </x-secondary-button>
                </div>
            </div>
        </x-modal>
    @endforeach
</x-app-layout>
