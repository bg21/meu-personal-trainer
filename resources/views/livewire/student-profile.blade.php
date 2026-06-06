<div>
    <x-slot name="headerActions">
        <x-ui.button variant="secondary" icon="arrow-left" onclick="window.history.back()">Voltar</x-ui.button>
        <x-ui.button variant="primary" icon="pencil">Editar Aluno</x-ui.button>
    </x-slot>

    <!-- Profile Header Card -->
    <div class="bg-[var(--bg-card)] border border-[var(--border-default)] rounded-[12px] p-6 shadow-[0_8px_30px_rgba(0,0,0,0.4)] mb-6 flex flex-col md:flex-row items-center md:items-start gap-6 relative overflow-hidden">
        <!-- Glow decorative effect -->
        <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-[var(--primary)] to-transparent opacity-[0.05] rounded-bl-full pointer-events-none -mr-10 -mt-10"></div>
        
        <!-- Big Avatar -->
        <div class="w-20 h-20 rounded-full bg-[rgba(29,158,117,0.1)] text-[var(--primary)] flex items-center justify-center font-bold display-font text-[28px] border-2 border-[var(--primary)] shrink-0 shadow-[0_0_20px_rgba(29,158,117,0.2)]">
            {{ strtoupper(substr($student->name, 0, 2)) }}
        </div>

        <div class="flex-1 text-center md:text-left z-10">
            <div class="flex flex-col md:flex-row items-center md:items-start justify-between gap-4">
                <div>
                    <h2 class="display-font text-[24px] font-semibold text-[var(--text-primary)] leading-tight mb-1">
                        {{ $student->name }}
                    </h2>
                    <div class="flex items-center justify-center md:justify-start gap-3 text-[13px] text-[var(--text-secondary)]">
                        <span class="flex items-center gap-1.5"><i data-lucide="mail" class="w-4 h-4"></i> {{ $student->email ?? 'Sem e-mail' }}</span>
                        <span>•</span>
                        <span class="flex items-center gap-1.5"><i data-lucide="phone" class="w-4 h-4"></i> {{ $student->phone ?? 'Sem telefone' }}</span>
                    </div>
                </div>

                <div class="flex gap-2">
                    @if($student->status === 'active')
                        <x-ui.badge variant="success" class="px-3 py-1 text-[11px]">Aluno Ativo</x-ui.badge>
                    @elseif($student->status === 'pending')
                        <x-ui.badge variant="warning" class="px-3 py-1 text-[11px]">Pendente</x-ui.badge>
                    @else
                        <x-ui.badge variant="neutral" class="px-3 py-1 text-[11px]">{{ ucfirst($student->status) }}</x-ui.badge>
                    @endif
                </div>
            </div>

            <div class="mt-5 pt-5 border-t border-[var(--border-default)] flex gap-8">
                <div>
                    <p class="text-[11px] text-[var(--text-tertiary)] uppercase font-semibold tracking-wider mb-1">Objetivo Principal</p>
                    <p class="text-[14px] font-medium text-[var(--text-primary)] flex items-center gap-2">
                        <i data-lucide="target" class="w-4 h-4 text-[var(--primary)]"></i> 
                        {{ $student->goal ?? 'Não definido' }}
                    </p>
                </div>
                <div>
                    <p class="text-[11px] text-[var(--text-tertiary)] uppercase font-semibold tracking-wider mb-1">Data de Cadastro</p>
                    <p class="text-[14px] font-medium text-[var(--text-primary)] flex items-center gap-2">
                        <i data-lucide="calendar" class="w-4 h-4 text-[var(--text-secondary)]"></i> 
                        {{ $student->created_at->format('d M, Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <div class="mb-6 flex gap-2 border-b border-[var(--border-default)] pb-px px-2 overflow-x-auto hide-scrollbar">
        <button wire:click="setTab('dados')" class="px-5 py-3 text-[13px] font-medium transition-colors border-b-2 whitespace-nowrap {{ $activeTab === 'dados' ? 'text-[var(--primary)] border-[var(--primary)]' : 'text-[var(--text-secondary)] border-transparent hover:text-[var(--text-primary)]' }}">
            Dados e Avaliação
        </button>
        <button wire:click="setTab('fichas')" class="px-5 py-3 text-[13px] font-medium transition-colors border-b-2 whitespace-nowrap {{ $activeTab === 'fichas' ? 'text-[var(--primary)] border-[var(--primary)]' : 'text-[var(--text-secondary)] border-transparent hover:text-[var(--text-primary)]' }}">
            Fichas de Treino
        </button>
        <button wire:click="setTab('evolucao')" class="px-5 py-3 text-[13px] font-medium transition-colors border-b-2 whitespace-nowrap {{ $activeTab === 'evolucao' ? 'text-[var(--primary)] border-[var(--primary)]' : 'text-[var(--text-secondary)] border-transparent hover:text-[var(--text-primary)]' }}">
            Evolução Física
        </button>
        <button wire:click="setTab('financeiro')" class="px-5 py-3 text-[13px] font-medium transition-colors border-b-2 whitespace-nowrap {{ $activeTab === 'financeiro' ? 'text-[var(--primary)] border-[var(--primary)]' : 'text-[var(--text-secondary)] border-transparent hover:text-[var(--text-primary)]' }}">
            Financeiro
        </button>
    </div>

    <!-- Tabs Content -->
    <div class="animate-stagger min-h-[400px]">
        @if ($activeTab === 'dados')
            <div class="bg-[var(--bg-card)] border border-[var(--border-default)] rounded-[12px] shadow-[0_8px_30px_rgba(0,0,0,0.4)] p-6 w-full">
                <h3 class="display-font text-[16px] font-medium text-[var(--text-primary)] mb-6 border-b border-[var(--border-default)] pb-4">Informações de Contato</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-10 mb-8">
                    <div>
                        <x-ui.label>Nome Completo</x-ui.label>
                        <p class="text-[14px] text-[var(--text-primary)]">{{ $student->name }}</p>
                    </div>
                    <div>
                        <x-ui.label>E-mail</x-ui.label>
                        <p class="text-[14px] text-[var(--text-primary)]">{{ $student->email ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <x-ui.label>Telefone / WhatsApp</x-ui.label>
                        <p class="text-[14px] text-[var(--text-primary)]">{{ $student->phone ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <x-ui.label>Status no Sistema</x-ui.label>
                        <p class="text-[14px] text-[var(--text-primary)]">{{ ucfirst($student->status) }}</p>
                    </div>
                </div>

                <h3 class="display-font text-[16px] font-medium text-[var(--text-primary)] mb-6 border-b border-[var(--border-default)] pb-4">Anamnese / Observações Médicas</h3>
                <div class="bg-[var(--bg-card-hover)] rounded-lg p-5 border border-[var(--border-light)] text-[13px] text-[var(--text-secondary)] italic">
                    Nenhuma observação ou restrição médica foi registrada para este aluno até o momento.
                </div>
            </div>

        @elseif ($activeTab === 'fichas')
            <div class="flex flex-col items-center justify-center py-20 border border-[var(--border-default)] border-dashed rounded-[12px] bg-[var(--bg-card)]/50">
                <div class="w-16 h-16 rounded-full bg-[var(--bg-card-hover)] flex items-center justify-center mb-4">
                    <i data-lucide="dumbbell" class="w-8 h-8 text-[var(--text-tertiary)]"></i>
                </div>
                <h3 class="display-font text-[18px] font-medium text-[var(--text-primary)] mb-2">Nenhuma ficha ativa</h3>
                <p class="text-[13px] text-[var(--text-secondary)] mb-6 text-center max-w-sm">Este aluno ainda não possui nenhuma ficha de treino vinculada ao seu perfil.</p>
                <x-ui.button variant="primary" icon="plus">Criar Primeira Ficha</x-ui.button>
            </div>

        @elseif ($activeTab === 'evolucao')
            <div class="flex flex-col items-center justify-center py-20 border border-[var(--border-default)] border-dashed rounded-[12px] bg-[var(--bg-card)]/50">
                <div class="w-16 h-16 rounded-full bg-[var(--bg-card-hover)] flex items-center justify-center mb-4">
                    <i data-lucide="line-chart" class="w-8 h-8 text-[var(--text-tertiary)]"></i>
                </div>
                <h3 class="display-font text-[18px] font-medium text-[var(--text-primary)] mb-2">Sem dados de evolução</h3>
                <p class="text-[13px] text-[var(--text-secondary)] mb-6 text-center max-w-sm">Registre pesos, medidas e fotos para visualizar os gráficos de progresso.</p>
                <x-ui.button variant="primary" icon="plus">Nova Avaliação</x-ui.button>
            </div>

        @elseif ($activeTab === 'financeiro')
            <div class="flex flex-col items-center justify-center py-20 border border-[var(--border-default)] border-dashed rounded-[12px] bg-[var(--bg-card)]/50">
                <div class="w-16 h-16 rounded-full bg-[var(--bg-card-hover)] flex items-center justify-center mb-4">
                    <i data-lucide="wallet" class="w-8 h-8 text-[var(--text-tertiary)]"></i>
                </div>
                <h3 class="display-font text-[18px] font-medium text-[var(--text-primary)] mb-2">Nenhum pagamento registrado</h3>
                <p class="text-[13px] text-[var(--text-secondary)] mb-6 text-center max-w-sm">Não há histórico de cobranças ou pagamentos para este aluno.</p>
                <x-ui.button variant="primary" icon="plus">Gerar Cobrança</x-ui.button>
            </div>
        @endif
    </div>
</div>
