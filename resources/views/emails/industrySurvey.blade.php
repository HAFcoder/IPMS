@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Best regards,<br>
{{ config('app.name') }}
@endcomponent
