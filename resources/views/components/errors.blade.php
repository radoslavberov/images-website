@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'alert alert-fade alert-danger']) }}>
        <ul class="mb-0 list-unstyled">
            @foreach ($errors->all() as $error)
                <li class="text-bold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

