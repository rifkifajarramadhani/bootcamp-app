<x-mail::message>
# Register Camp: {{ $checkout->Camp->title }}

Hi {{ $checkout->User->name }}!
Thank you for register on <b>{{ $checkout->Camp->title }}</b>, please see payment instruction by click the button below.

<x-mail::button :url="route('dashboard')">
My Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
