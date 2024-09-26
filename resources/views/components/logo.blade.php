@php
    $logo = DB::table('companies')->first()->logo;
@endphp

@if ($logo)
    <img src="{{ asset('storage/' . $logo) }}" alt="BazzarX Market" width="120">
@else
    <p>No logo found.</p>
@endif
