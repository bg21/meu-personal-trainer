@props([
    'disabled' => false,
    'icon' => null,
])

<div class="relative w-full">
    @if ($icon)
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i data-lucide="{{ $icon }}" class="w-4 h-4 text-[var(--text-tertiary)]"></i>
        </div>
    @endif
    
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'w-full bg-[var(--bg-card)] border border-[var(--border-default)] text-[var(--text-primary)] text-[13px] rounded-[var(--radius-element)] focus:ring-1 focus:ring-[var(--primary)] focus:border-[var(--primary)] block transition-colors disabled:opacity-50 disabled:bg-[var(--border-default)] ' . ($icon ? 'pl-9 pr-3 py-2' : 'px-3 py-2')
    ]) !!}>
</div>
