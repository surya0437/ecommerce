@php
    $logo = DB::table('companies')->first()->logo;
@endphp

@if ($logo)
    <img src="{{ asset('storage/' . $logo) }}" alt="BazzarX Market" width="120">
@else
    <p>No logo found.</p>
@endif


{{-- <img src="https://codeit.com.np/storage/01J5QRFCE6530G343Q9YVMYAZW.webp" alt="BazzarX Market" width="120"> --}}
