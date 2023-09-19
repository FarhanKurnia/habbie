@component('mail::message')
# Invoice Order Product Habbie

The body of your message.

{{-- @component('mail::button', ['url' => ''])
    Button Text
@endcomponent --}}

@component('mail::panel')
    Unpaid/Paid Status
@endcomponent

## Table component:

@component('mail::table')
    | Product           | Table         | Price    |
    | ----------------- |:-------------:| --------:|
    | Product 1         | Centered      | $10      |
    | Product 2         | Right-Aligned | $20      |
@endcomponent

@component('mail::subcopy')
    This is a subcopy component
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent