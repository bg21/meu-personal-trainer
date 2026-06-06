<div>
    <x-slot name="headerActions">
        <x-ui.button variant="primary" icon="plus" wire:click="openModal">Novo Aluno</x-ui.button>
    </x-slot>

    <!-- Filters Section -->
    <div class="mb-6 flex flex-col sm:flex-row gap-4 items-center justify-between">
        <div class="w-full sm:w-1/3">
            <x-ui.input 
                wire:model.live.debounce.300ms="search" 
                placeholder="Buscar por nome ou e-mail..." 
                icon="search" 
            />
        </div>

        <div class="flex items-center gap-2 w-full sm:w-auto">
            <div class="bg-[var(--bg-card)] border border-[var(--border-default)] p-1 rounded-[var(--radius-element)] flex text-[13px] font-medium">
                <button 
                    wire:click="$set('status', 'all')" 
                    class="px-4 py-1.5 rounded-[6px] transition-colors {{ $status === 'all' ? 'bg-[var(--border-default)] text-[var(--text-primary)]' : 'text-[var(--text-secondary)] hover:text-[var(--text-primary)]' }}"
                >Todos</button>
                <button 
                    wire:click="$set('status', 'active')" 
                    class="px-4 py-1.5 rounded-[6px] transition-colors {{ $status === 'active' ? 'bg-[var(--primary-light)] text-[var(--primary-text)] border border-[var(--primary-light)]' : 'text-[var(--text-secondary)] hover:text-[var(--text-primary)]' }}"
                >Ativos</button>
                <button 
                    wire:click="$set('status', 'pending')" 
                    class="px-4 py-1.5 rounded-[6px] transition-colors {{ $status === 'pending' ? 'bg-[var(--warning-light)] text-[var(--warning)] border border-[var(--warning-light)]' : 'text-[var(--text-secondary)] hover:text-[var(--text-primary)]' }}"
                >Pendentes</button>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-[var(--bg-card)] border border-[var(--border-default)] rounded-[12px] shadow-[0_8px_30px_rgba(0,0,0,0.4)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[var(--border-default)] bg-[var(--bg-card)]">
                        <th class="px-6 py-4 text-[11px] font-semibold text-[var(--text-tertiary)] uppercase tracking-wider">Aluno</th>
                        <th class="px-6 py-4 text-[11px] font-semibold text-[var(--text-tertiary)] uppercase tracking-wider">Objetivo</th>
                        <th class="px-6 py-4 text-[11px] font-semibold text-[var(--text-tertiary)] uppercase tracking-wider">Próximo Vencimento</th>
                        <th class="px-6 py-4 text-[11px] font-semibold text-[var(--text-tertiary)] uppercase tracking-wider text-center">Status</th>
                        <th class="px-6 py-4 text-[11px] font-semibold text-[var(--text-tertiary)] uppercase tracking-wider text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--border-default)]">
                    @forelse ($students as $student)
                        <tr class="hover:bg-[var(--bg-card-hover)] transition-colors group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-[rgba(59,130,246,0.1)] text-[#60A5FA] flex items-center justify-center font-medium display-font text-[13px] border border-[rgba(59,130,246,0.2)]">
                                        {{ strtoupper(substr($student->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="text-[14px] font-medium text-[var(--text-primary)]">{{ $student->name }}</p>
                                        <p class="text-[12px] text-[var(--text-secondary)]">{{ $student->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-[13px] text-[var(--text-secondary)]">{{ $student->goal ?? 'Não definido' }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-[13px] text-[var(--text-primary)] font-medium">15/Nov/2026</p>
                                <p class="text-[11px] text-[var(--text-tertiary)]">Plano Trimestral</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if($student->status === 'active')
                                    <x-ui.badge variant="success">Ativo</x-ui.badge>
                                @elseif($student->status === 'pending')
                                    <x-ui.badge variant="warning">Pendente</x-ui.badge>
                                @else
                                    <x-ui.badge variant="neutral">{{ ucfirst($student->status) }}</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <x-ui.button variant="ghost" size="icon" icon="pencil" title="Editar" wire:click="editStudent({{ $student->id }})" />
                                    <x-ui.button variant="ghost" size="icon" icon="external-link" title="Acessar Portal" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-[var(--text-secondary)]">
                                <div class="flex flex-col items-center justify-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-[var(--border-default)] flex items-center justify-center">
                                        <i data-lucide="users" class="w-6 h-6 text-[var(--text-tertiary)]"></i>
                                    </div>
                                    <p class="text-[14px] font-medium text-[var(--text-primary)]">Nenhum aluno encontrado</p>
                                    <p class="text-[12px]">Tente ajustar os filtros da busca ou cadastre um novo aluno.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($students->hasPages())
            <div class="px-6 py-4 border-t border-[var(--border-default)] bg-[var(--bg-card)]">
                {{ $students->links() }}
            </div>
        @endif
    </div>

    <!-- Create/Edit Modal -->
    <x-ui.modal name="student-modal" maxWidth="lg">
        <form wire:submit="save">
            <div class="px-6 py-5 border-b border-[var(--border-default)]">
                <h3 class="display-font text-[16px] font-medium text-[var(--text-primary)]">
                    {{ $studentId ? 'Editar Aluno' : 'Novo Aluno' }}
                </h3>
                <p class="text-[12px] text-[var(--text-secondary)] mt-1">Preencha as informações básicas do aluno abaixo.</p>
            </div>
            
            <div class="p-6 space-y-4">
                <div>
                    <x-ui.label for="name">Nome Completo</x-ui.label>
                    <x-ui.input id="name" wire:model="name" placeholder="Ex: João da Silva" icon="user" />
                    @error('name') <span class="text-[11px] text-[var(--danger)] mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-ui.label for="email">E-mail</x-ui.label>
                        <x-ui.input id="email" type="email" wire:model="email" placeholder="joao@email.com" icon="mail" />
                        @error('email') <span class="text-[11px] text-[var(--danger)] mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-ui.label for="phone">Telefone / WhatsApp</x-ui.label>
                        <x-ui.input id="phone" wire:model="phone" placeholder="(00) 00000-0000" icon="phone" />
                        @error('phone') <span class="text-[11px] text-[var(--danger)] mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <x-ui.label for="goal">Objetivo Principal</x-ui.label>
                    <x-ui.input id="goal" wire:model="goal" placeholder="Ex: Hipertrofia, Emagrecimento..." icon="target" />
                    @error('goal') <span class="text-[11px] text-[var(--danger)] mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-ui.label for="status">Status da Conta</x-ui.label>
                    <div class="relative">
                        <select id="status" wire:model="studentStatus" class="w-full bg-[var(--bg-card)] border border-[var(--border-default)] text-[var(--text-primary)] text-[13px] rounded-[var(--radius-element)] focus:ring-1 focus:ring-[var(--primary)] focus:border-[var(--primary)] block transition-colors px-3 py-2 appearance-none">
                            <option value="active">🟢 Ativo</option>
                            <option value="pending">🟡 Pendente</option>
                            <option value="inactive">⚪ Inativo</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i data-lucide="chevron-down" class="w-4 h-4 text-[var(--text-tertiary)]"></i>
                        </div>
                    </div>
                    @error('studentStatus') <span class="text-[11px] text-[var(--danger)] mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="px-6 py-4 border-t border-[var(--border-default)] bg-[var(--bg-card-hover)] flex justify-end gap-3">
                <x-ui.button type="button" variant="ghost" @click="$dispatch('close-modal', 'student-modal')">Cancelar</x-ui.button>
                <x-ui.button type="submit" variant="primary">
                    <span wire:loading.remove wire:target="save">{{ $studentId ? 'Salvar Alterações' : 'Cadastrar Aluno' }}</span>
                    <span wire:loading wire:target="save">Salvando...</span>
                </x-ui.button>
            </div>
        </form>
    </x-ui.modal>
</div>
