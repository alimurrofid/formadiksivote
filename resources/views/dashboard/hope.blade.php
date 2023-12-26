@extends('dashboard.layouts.dashboardmain')
@section('title', 'Hope')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-6 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500"
                            datatable id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Hope</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hopes as $hope)
                                    <tr>
                                        <td class="text-sm font-normal leading-normal">{{ $loop->iteration }}</td>
                                        <td class="text-sm font-normal leading-normal">{{ $hope->user->name }}</td>
                                        <td class="text-sm font-normal leading-normal">{{ $hope->candidate->name}}</td>
                                        <td class="text-sm font-normal leading-normal">{{ $hope->desire }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('dashboard.partials.footer')
        </div>
    </div>
@endsection
@push('customJS')
    <!-- Argon -->
    <script src="{{ asset('assets/js/sidenav-burger.js') }}"></script>
    <script src="{{ asset('assets/js/fixed-plugin.js') }}"></script>
@endpush
