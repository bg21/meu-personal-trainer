<x-layouts.app title="Dashboard | PTManager" header="Visão Geral">
    <x-slot name="headerActions">
        <button class="bg-[var(--primary)] hover:bg-[var(--primary-hover)] text-white px-4 py-2 rounded-[8px] text-[13px] font-medium transition-colors flex items-center gap-2 shadow-[0_0_15px_rgba(29,158,117,0.2)]">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Novo Aluno
        </button>
    </x-slot>

    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
        <!-- Metric 1 -->
        <div class="bg-[var(--bg-card)] rounded-[12px] p-5 border border-[var(--border-default)] card-hover relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-[var(--primary)] to-transparent opacity-[0.05] rounded-bl-full -mr-4 -mt-4"></div>
            <p class="text-[12px] text-[var(--text-secondary)] font-medium mb-1 relative z-10">Alunos Ativos</p>
            <div class="flex items-end justify-between relative z-10">
                <h2 class="display-font text-[28px] font-medium text-[var(--text-primary)] leading-none">42</h2>
                <div class="flex items-center gap-1 text-[var(--primary-text)] bg-[var(--primary-light)] px-2 py-0.5 rounded-[20px] text-[11px] font-semibold border border-[var(--primary-light)]">
                    <i data-lucide="arrow-up-right" class="w-3 h-3"></i>
                    <span>12%</span>
                </div>
            </div>
        </div>

        <!-- Metric 2 -->
        <div class="bg-[var(--bg-card)] rounded-[12px] p-5 border border-[var(--border-default)] card-hover relative overflow-hidden">
            <p class="text-[12px] text-[var(--text-secondary)] font-medium mb-1 relative z-10">Receita Mensal</p>
            <div class="flex items-end justify-between relative z-10">
                <h2 class="display-font text-[28px] font-medium text-[var(--text-primary)] leading-none">R$ 8.4k</h2>
                <div class="flex items-center gap-1 text-[var(--primary-text)] bg-[var(--primary-light)] px-2 py-0.5 rounded-[20px] text-[11px] font-semibold border border-[var(--primary-light)]">
                    <i data-lucide="arrow-up-right" class="w-3 h-3"></i>
                    <span>8%</span>
                </div>
            </div>
        </div>

        <!-- Metric 3 -->
        <div class="bg-[var(--bg-card)] rounded-[12px] p-5 border border-[var(--border-default)] card-hover relative overflow-hidden">
            <p class="text-[12px] text-[var(--text-secondary)] font-medium mb-1 relative z-10">Vencimentos na Semana</p>
            <div class="flex items-end justify-between relative z-10">
                <h2 class="display-font text-[28px] font-medium text-[var(--text-primary)] leading-none">7</h2>
                <div class="flex items-center gap-1 text-[var(--warning)] bg-[var(--warning-light)] px-2 py-0.5 rounded-[20px] text-[11px] font-semibold border border-[var(--warning-light)]">
                    <i data-lucide="alert-circle" class="w-3 h-3"></i>
                    <span>Atenção</span>
                </div>
            </div>
        </div>

        <!-- Metric 4 -->
        <div class="bg-[var(--bg-card)] rounded-[12px] p-5 border border-[var(--border-default)] card-hover relative overflow-hidden">
            <p class="text-[12px] text-[var(--text-secondary)] font-medium mb-1 relative z-10">Treinos Registrados (Mês)</p>
            <div class="flex items-end justify-between relative z-10">
                <h2 class="display-font text-[28px] font-medium text-[var(--text-primary)] leading-none">156</h2>
                <div class="flex items-center gap-1 text-[var(--text-secondary)] bg-[var(--border-default)] px-2 py-0.5 rounded-[20px] text-[11px] font-semibold">
                    <i data-lucide="minus" class="w-3 h-3"></i>
                    <span>0%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        
        <!-- Left Col (Alunos Recentes) -->
        <div class="xl:col-span-2 space-y-6">
            <div class="bg-[var(--bg-card)] border border-[var(--border-default)] rounded-[12px] shadow-[0_8px_30px_rgba(0,0,0,0.4)] overflow-hidden">
                <div class="px-6 py-4 border-b border-[var(--border-default)] flex items-center justify-between bg-[var(--bg-card)]">
                    <h3 class="display-font text-[14px] font-medium text-[var(--text-primary)]">Atividade Recente dos Alunos</h3>
                    <a href="#" class="text-[var(--primary)] text-[12px] font-medium hover:text-[var(--primary-hover)] transition-colors">Ver todos</a>
                </div>
                
                <div class="divide-y divide-[var(--border-default)]">
                    <!-- Row 1 -->
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-[var(--bg-card-hover)] transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[rgba(59,130,246,0.1)] text-[#60A5FA] flex items-center justify-center font-medium display-font text-[14px] border border-[rgba(59,130,246,0.2)]">
                                CM
                            </div>
                            <div>
                                <p class="text-[14px] font-medium text-[var(--text-primary)]">Carlos Moura</p>
                                <p class="text-[12px] text-[var(--text-secondary)]">Registrou treino • Hipertrofia A</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-[11px] text-[var(--text-tertiary)]">Hoje, 08:30</span>
                            <button class="w-8 h-8 rounded-full border border-[var(--border-light)] flex items-center justify-center text-[var(--text-secondary)] hover:bg-[var(--border-default)] hover:text-[var(--text-primary)] transition-all">
                                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-[var(--bg-card-hover)] transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[rgba(139,92,246,0.1)] text-[#A78BFA] flex items-center justify-center font-medium display-font text-[14px] border border-[rgba(139,92,246,0.2)]">
                                MS
                            </div>
                            <div>
                                <p class="text-[14px] font-medium text-[var(--text-primary)]">Mariana Silva</p>
                                <p class="text-[12px] text-[var(--text-secondary)]">Nova avaliação física registrada</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-[11px] text-[var(--text-tertiary)]">Ontem</span>
                            <button class="w-8 h-8 rounded-full border border-[var(--border-light)] flex items-center justify-center text-[var(--text-secondary)] hover:bg-[var(--border-default)] hover:text-[var(--text-primary)] transition-all">
                                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Row 3 -->
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-[var(--bg-card-hover)] transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[var(--warning-light)] text-[var(--warning)] flex items-center justify-center font-medium display-font text-[14px] border border-[var(--warning-light)]">
                                RA
                            </div>
                            <div>
                                <p class="text-[14px] font-medium text-[var(--text-primary)]">Rafael Alves</p>
                                <p class="text-[12px] text-[var(--text-secondary)]">Novo aluno pendente de ficha</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="bg-[var(--warning-light)] text-[var(--warning)] px-2 py-0.5 rounded-[20px] text-[10px] font-bold uppercase tracking-wide border border-[var(--warning-light)]">Pendente</span>
                            <button class="w-8 h-8 rounded-full border border-[var(--border-light)] flex items-center justify-center text-[var(--text-secondary)] hover:bg-[var(--border-default)] hover:text-[var(--text-primary)] transition-all">
                                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Col (Vencimentos & Ações Rápidas) -->
        <div class="xl:col-span-1 space-y-6">
            
            <!-- Quick Actions Widget -->
            <div class="bg-gradient-to-br from-[#0c2a1f] to-[#040d0a] border border-[var(--primary)]/20 rounded-[12px] p-6 text-white relative overflow-hidden shadow-[0_8px_30px_rgba(29,158,117,0.15)]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[var(--primary)] rounded-full blur-[50px] opacity-20 -mr-10 -mt-10 pointer-events-none"></div>
                
                <h3 class="display-font text-[15px] font-medium mb-4 relative z-10 text-[var(--primary-text)]">Ações Rápidas</h3>
                
                <div class="grid grid-cols-2 gap-3 relative z-10">
                    <button class="bg-black/30 hover:bg-black/50 border border-white/5 transition-colors rounded-[8px] p-3 flex flex-col items-center justify-center gap-2 text-center group">
                        <div class="w-8 h-8 rounded-full bg-[var(--primary)]/20 flex items-center justify-center text-[var(--primary-text)] group-hover:scale-110 transition-transform">
                            <i data-lucide="clipboard-list" class="w-4 h-4"></i>
                        </div>
                        <span class="text-[12px] font-medium text-white/90">Nova Ficha</span>
                    </button>
                    <button class="bg-black/30 hover:bg-black/50 border border-white/5 transition-colors rounded-[8px] p-3 flex flex-col items-center justify-center gap-2 text-center group">
                        <div class="w-8 h-8 rounded-full bg-[var(--primary)]/20 flex items-center justify-center text-[var(--primary-text)] group-hover:scale-110 transition-transform">
                            <i data-lucide="bar-chart-2" class="w-4 h-4"></i>
                        </div>
                        <span class="text-[12px] font-medium text-white/90">Avaliação</span>
                    </button>
                </div>
            </div>

            <!-- Vencimentos Próximos -->
            <div class="bg-[var(--bg-card)] border border-[var(--border-default)] rounded-[12px] shadow-[0_8px_30px_rgba(0,0,0,0.4)] overflow-hidden">
                <div class="px-5 py-4 border-b border-[var(--border-default)] flex items-center justify-between">
                    <h3 class="display-font text-[14px] font-medium text-[var(--text-primary)]">Vencimentos Próximos</h3>
                </div>
                
                <div class="p-2 space-y-1">
                    <!-- Vencimento 1 -->
                    <div class="flex items-center justify-between p-3 rounded-[8px] hover:bg-[var(--bg-card-hover)] transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-[var(--danger-light)] text-[var(--danger)] flex items-center justify-center font-medium text-[12px] display-font border border-[var(--danger-light)]">
                                LT
                            </div>
                            <div>
                                <p class="text-[13px] font-medium text-[var(--text-primary)]">Lucas Torres</p>
                                <p class="text-[11px] text-[var(--danger)] font-medium">Vence Hoje</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[13px] font-semibold text-[var(--text-primary)]">R$ 150</p>
                        </div>
                    </div>

                    <!-- Vencimento 2 -->
                    <div class="flex items-center justify-between p-3 rounded-[8px] hover:bg-[var(--bg-card-hover)] transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-[var(--primary-light)] text-[var(--primary-text)] flex items-center justify-center font-medium text-[12px] display-font border border-[var(--primary-light)]">
                                AF
                            </div>
                            <div>
                                <p class="text-[13px] font-medium text-[var(--text-primary)]">Ana Fernandes</p>
                                <p class="text-[11px] text-[var(--text-secondary)]">Amanhã</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[13px] font-semibold text-[var(--text-primary)]">R$ 180</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-3 pt-0 border-t border-[var(--border-default)] mt-2">
                    <button class="w-full mt-3 py-2 text-center text-[12px] font-medium text-[var(--text-secondary)] hover:text-[var(--text-primary)] border border-[var(--border-default)] rounded-[8px] hover:bg-[var(--border-light)] transition-colors">
                        Ver todos os pagamentos
                    </button>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
