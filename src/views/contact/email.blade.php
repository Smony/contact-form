@component('mail::message')
# Introduction

Hello {{ $name }}

Message :
{{ $message }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
