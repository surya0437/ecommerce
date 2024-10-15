@php
    $logo = DB::table('companies')->first()->logo;
@endphp

@if (Auth::check())

    @if ($logo)
        <img src="{{ asset('storage/' . $logo) }}" alt="Company Logo">
    @else
        <p>No logo found.</p>
    @endif
@else
    <img src="{{ asset('assets/logo/logo.png') }}" alt="Company Logo" style="width:120px; height:120px;">
@endif
