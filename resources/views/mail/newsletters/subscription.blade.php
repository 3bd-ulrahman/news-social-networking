<x-mail::message>
# Hello {{ $name }},

Thanks for signing up for our newsletter.

<x-mail::button :url="{{ route('home') }}">
Visit Our Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
