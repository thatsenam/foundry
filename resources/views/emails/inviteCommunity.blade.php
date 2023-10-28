@component('mail::message')
# Hi,
{{$invite->sender->name ?? " "}} has invited you to join  {{$invite->community->name ?? " "}}.
I am pleased to invite you to join Our Group {{$invite->community->name ?? " "}}. Follow the join Link to add a member of the {{$invite->community->name ?? " "}}

@component('mail::button', ['url' => $invite->join_link])
Join {{$invite->community->name ?? " "}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
