@if(session('message'))
    <div {{ $attributes->merge(['class' => 'alert alert-fade alert-success']) }}>
        {{ session('message') }}
    </div>
@endif
