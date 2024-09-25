@php
    $logo = DB::table('companies')->first()->logo;
@endphp

@if ($logo)
    <img src="{{ asset('storage/' . $logo) }}" alt="Company Logo">
@else
    <p>No logo found.</p>
@endif
