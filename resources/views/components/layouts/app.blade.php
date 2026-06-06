<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PTManager' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Distinctive Typography for UI/UX Pro Max -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            /* PTManager Design System Tokens - CARBON THEME */
            --primary: #1D9E75;
            --primary-hover: #10B981;
            --primary-light: rgba(29, 158, 117, 0.15);
            --primary-text: #34D399;
            
            --danger: #EF4444;
            --danger-light: rgba(239, 68, 68, 0.1);
            --warning: #F59E0B;
            --warning-light: rgba(245, 158, 11, 0.1);
            
            --bg-page: #09090b; /* Deep Black */
            --bg-card: #121214; /* Carbon */
            --bg-card-hover: #18181b;
            
            --border-default: #27272a; /* Zinc 800 */
            --border-light: #3f3f46;
            
            --text-primary: #FAFAFA;
            --text-secondary: #A1A1AA;
            --text-tertiary: #71717A;
            
            --radius-card: 12px;
            --radius-element: 8px;
            --radius-badge: 20px;
        }

        body {
            background-color: var(--bg-page);
            color: var(--text-primary);
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
            color-scheme: dark;
        }

        h1, h2, h3, h4, h5, h6, .display-font {
            font-family: 'Outfit', sans-serif;
        }

        /* Animations */
        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(15px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        .animate-stagger > * {
            opacity: 0;
            animation: fade-in-up 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        
        .animate-stagger > *:nth-child(1) { animation-delay: 0.1s; }
        .animate-stagger > *:nth-child(2) { animation-delay: 0.2s; }
        .animate-stagger > *:nth-child(3) { animation-delay: 0.3s; }
        .animate-stagger > *:nth-child(4) { animation-delay: 0.4s; }
        .animate-stagger > *:nth-child(5) { animation-delay: 0.5s; }
        
        /* Subtle interactive styles */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px -10px rgba(0,0,0,0.5);
            border-color: var(--border-light);
            background-color: var(--bg-card-hover);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border-default); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--border-light); }
        
        .glass-panel {
            background: rgba(18, 18, 20, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
    @livewireStyles
</head>
<body class="flex h-screen overflow-hidden selection:bg-[#1D9E75] selection:text-white">

    <!-- Sidebar -->
    <aside class="w-[220px] bg-[var(--bg-card)] border-r border-[var(--border-default)] flex flex-col justify-between shrink-0 z-20 relative shadow-[2px_0_15px_rgba(0,0,0,0.3)]">
        <!-- Top Logo Area -->
        <div>
            <div class="h-[64px] flex items-center px-6 border-b border-[var(--border-default)] mb-4">
                <div class="flex items-center gap-2.5 text-[var(--text-primary)]">
                    <div class="w-7 h-7 rounded bg-[var(--primary)] flex items-center justify-center text-white shadow-[0_0_15px_rgba(29,158,117,0.3)]">
                        <i data-lucide="zap" class="w-4 h-4" stroke-width="2.5"></i>
                    </div>
                    <span class="display-font font-semibold tracking-tight text-[16px]">PTManager</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="px-3 space-y-1">
                <div class="px-3 py-2 text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1 mt-4">Menu Principal</div>
                
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-[8px] {{ request()->routeIs('dashboard') ? 'bg-[var(--primary-light)] text-[var(--primary-text)]' : 'text-[var(--text-secondary)] hover:bg-[var(--border-default)] hover:text-[var(--text-primary)]' }} font-medium text-[13px] transition-colors">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    Dashboard
                </a>
                
                <a href="{{ route('students.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-[8px] {{ request()->routeIs('students.*') ? 'bg-[var(--primary-light)] text-[var(--primary-text)]' : 'text-[var(--text-secondary)] hover:bg-[var(--border-default)] hover:text-[var(--text-primary)]' }} font-medium text-[13px] transition-colors">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    Alunos
                </a>
                
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-[8px] text-[var(--text-secondary)] hover:bg-[var(--border-default)] hover:text-[var(--text-primary)] font-medium text-[13px] transition-colors">
                    <i data-lucide="dumbbell" class="w-4 h-4"></i>
                    Fichas de Treino
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-[8px] text-[var(--text-secondary)] hover:bg-[var(--border-default)] hover:text-[var(--text-primary)] font-medium text-[13px] transition-colors">
                    <i data-lucide="activity" class="w-4 h-4"></i>
                    Evolução
                </a>

                <div class="px-3 py-2 text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1 mt-6">Financeiro</div>
                
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-[8px] text-[var(--text-secondary)] hover:bg-[var(--border-default)] hover:text-[var(--text-primary)] font-medium text-[13px] transition-colors">
                    <i data-lucide="wallet" class="w-4 h-4"></i>
                    Pagamentos
                </a>
            </nav>
        </div>

        <!-- User Profile Footer -->
        <div class="p-4 border-t border-[var(--border-default)]">
            <div class="flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-[var(--border-default)] cursor-pointer transition-colors group">
                <div class="w-9 h-9 rounded-full bg-[var(--bg-page)] text-[var(--text-primary)] flex items-center justify-center text-xs font-medium display-font border border-[var(--border-light)] group-hover:scale-105 transition-transform">
                    JD
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-[13px] font-semibold text-[var(--text-primary)] truncate display-font">João Personal</p>
                    <p class="text-[11px] text-[var(--text-secondary)] truncate">Plano Pro</p>
                </div>
                <i data-lucide="chevron-up" class="w-4 h-4 text-[var(--text-tertiary)]"></i>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col relative overflow-hidden bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjMDkwOTBCIj48L3JlY3Q+CjxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9IiMxODE4MUIiPjwvcmVjdD4KPC9zdmc+')]">
        
        <!-- Topbar -->
        <header class="h-[64px] glass-panel border-b border-[var(--border-default)] px-8 flex items-center justify-between shrink-0 sticky top-0 z-10">
            <div>
                <h1 class="display-font text-[18px] font-medium text-[var(--text-primary)]">{{ $header ?? 'Painel' }}</h1>
            </div>
            
            <div class="flex items-center gap-4">
                <button class="w-8 h-8 flex items-center justify-center text-[var(--text-secondary)] hover:text-[var(--text-primary)] transition-colors relative">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-[var(--danger)] border-2 border-[var(--bg-card)]"></span>
                </button>
                @if(isset($headerActions))
                    {{ $headerActions }}
                @endif
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto p-8">
            <div class="max-w-[1100px] mx-auto animate-stagger">
                {{ $slot }}
            </div>
        </div>
    </main>

    @livewireScripts
    <script>
        lucide.createIcons();
        document.addEventListener('livewire:navigated', () => {
            lucide.createIcons();
        });
        document.addEventListener('livewire:load', () => {
            lucide.createIcons();
        });
        document.addEventListener('livewire:init', () => {
            Livewire.hook('morph.updated', ({ el, component }) => {
                lucide.createIcons();
            });
        });
    </script>
</body>
</html>
