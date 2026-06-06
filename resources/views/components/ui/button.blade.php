@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[var(--bg-page)] rounded-[var(--radius-element)] disabled:opacity-50 disabled:cursor-not-allowed';

    $variants = [
        'primary' => 'bg-[var(--primary)] hover:bg-[var(--primary-hover)] text-white shadow-[0_0_15px_rgba(29,158,117,0.2)] focus:ring-[var(--primary)]',
        'secondary' => 'bg-[var(--bg-card)] hover:bg-[var(--bg-card-hover)] text-[var(--text-primary)] border border-[var(--border-default)] hover:border-[var(--border-light)] focus:ring-[var(--border-light)]',
        'danger' => 'bg-[var(--danger-light)] text-[var(--danger)] hover:bg-red-500/20 border border-[var(--danger-light)] focus:ring-[var(--danger)]',
        'ghost' => 'bg-transparent text-[var(--text-secondary)] hover:text-[var(--text-primary)] hover:bg-[var(--border-default)] focus:ring-[var(--border-light)]',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-[13px]',
        'lg' => 'px-6 py-3 text-[14px]',
        'icon' => 'p-2',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    @if ($icon)
        <i data-lucide="{{ $icon }}" class="w-4 h-4 {{ $slot->isEmpty() ? '' : 'mr-2' }}"></i>
    @endif
    {{ $slot }}
</button>
