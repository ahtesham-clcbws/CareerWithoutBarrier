<x-mail::message>
Hi {{$contactInfo->fullname}},
<br>
<br>
<br>
<div class="row">
    <div>
        Subject : {{$contactInfo->reason_contact}}
    </div>
    
    {!! $message !!}
</div>
                            
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
