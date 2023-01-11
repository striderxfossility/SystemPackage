<form id="form" method="{{ $method == 'put' ? 'post' : $method }}" action="{{ $action }}" enctype="multipart/form-data">
    @csrf

    @if($method == 'put')
        <input type="hidden" name="_method" value="put" />
    @endif

    @if(isset($errors))
        @if ($errors->any())
            <div {{ $attributes }}>
                <div class="font-medium text-red-600">
                    {{ __('Whoops! Er is iets misgegaan') }}
                </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif

    {{ $slot }}
</form>