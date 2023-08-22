@push('notyf')
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
    let notyf = new Notyf({
        dismissible: true,
        duration: 7000,
        ripple: true,
        position: {
            x: 'right',
            y: 'top'
        },
    });

    @if (session('status'))
        notyf.success('{{ session('status') }}');
    @endif

    @if (session('success'))
        notyf.success('{{ session('success') }}');
    @endif

    @if (session('error'))
        notyf.error('{{ session('error') }}');
    @endif

    @if (session('status') == 'two-factor-authentication-enabled')
        notyf.success('Two factor authentication has been enabled.');
    @endif

    @if (session('status') == 'two-factor-authentication-disabled')
        notyf.error('Two factor authentication has been disabled.');
    @endif

    @if (session('status') == 'recovery-codes-generated')
        notyf.success('Recovery codes have been regenerated.');
    @endif

    @if (session('message'))
        notyf.error('{{ session('message') }}');
    @endif

    @if (session('status') == 'verification-link-sent')
        notyf.success('A new email verification link has been emailed to you!');
    @endif
</script>
@endpush
