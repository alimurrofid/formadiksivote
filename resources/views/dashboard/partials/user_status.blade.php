@if ($user->is_voted == 0)
        <span data-tooltip-target="tooltip-belum{{ $user->id }}"
            class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Belum</span>
        <div id="tooltip-belum{{ $user->id }}" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Belum Memilih
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    @else
        <form action="{{ route('user.reset', $user->id) }}" method="POST"
            id="reset-form-{{ $user->id }}">
            @csrf
            <button type="button" onclick="confirmReset({{ $user->id }})"
                data-tooltip-target="tooltip-sudah{{ $user->id }}"
                class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Sudah</button>
            <div id="tooltip-sudah{{ $user->id }}" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Sudah Memilih
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </form>
@endif
