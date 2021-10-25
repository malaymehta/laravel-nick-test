@component('mail::panel')
{{ $post->title }}
@endcomponent
@component('mail::message')
{{ $post->content }}
@endcomponent

