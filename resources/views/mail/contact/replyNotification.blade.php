<x-mail::message>
    Dear, {{ $contactInfo->fullname }},<br />
    {{ $contactInfo->mobile }}<br />
    {{ $contactInfo->city }}<br /><br />
    <div class="row">
        <p>
            Subject : {{$contactInfo->reason_contact}}
        </p>

        {!! $message !!}
    </div>
    <br />
    <img src="{{ url('/logos/logo-square-2.png') }}" alt="SQS Foundation" style="float: left; max-width: 50px;"/>
    <p style="text-align: left;">
        Regards:<br />
        Support Team<br />
        Communication Wing<br />
        SQS Foundation, Kanpur
    </p>
</x-mail::message>