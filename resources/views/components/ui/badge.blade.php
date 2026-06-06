@props([
    'variant' => 'info',
])

@php
    $baseClasses = 'inline-flex items-center px-2 py-0.5 rounded-[var(--radius-badge)] text-[10px] font-bold uppercase tracking-wide border';

    $variants = [
        'success' => 'bg-[var(--primary-light)] text-[var(--primary-text)] border-[var(--primary-light)]',
        'info' => 'bg-[rgba(59,130,246,0.1)] text-[#60A5FA] border-[rgba(59,130,246,0.2)]',
        'warning' => 'bg-[var(--warning-light)] text-[var(--warning)] border-[var(--warning-light)]',
        'danger' => 'bg-[var(--danger-light)] text-[var(--danger)] border-[var(--danger-light)]',
        'neutral' => 'bg-[var(--border-default)] text-[var(--text-secondary)] border-[var(--border-default)]',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['info']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
