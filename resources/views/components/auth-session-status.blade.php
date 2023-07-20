@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
        Link reset password sudah kami kirim ke email kamu. {{-- {{ $status }} --}}
    </div>
@endif
