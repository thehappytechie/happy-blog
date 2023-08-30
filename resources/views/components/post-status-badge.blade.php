<span
    class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium ring-1 ring-inset {{ $is_draft == 1 ? 'bg-yellow-50 text-yellow-800 ring-yellow-600/20' : 'bg-green-50 text-green-700 ring-green-600/20' }}">
    {{ $is_draft == 1 ? 'Draft' : 'Published' }}
</span>
