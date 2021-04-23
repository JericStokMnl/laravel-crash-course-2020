@component('mail::message')
# Introduction

{{$liker->name}} liked one of your posts

@component('mail::button', ['url' => route('users.posts', $post->user)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
