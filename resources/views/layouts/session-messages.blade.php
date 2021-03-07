@if(session('success'))
    <x-alert color="info" >
        <x-slot name="message">
            {{ session('success') }}
        </x-slot>
    </x-alert>
@elseif(session('failed'))
    <x-alert color="danger" >
        <x-slot name="message">
            {{ session('failed') }}
        </x-slot>
    </x-alert>
@endif
