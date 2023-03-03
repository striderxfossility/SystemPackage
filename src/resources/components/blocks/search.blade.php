<form action="{{ $url }}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="mb-10 container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="rounded-full bg-white shadow flex w-full">
            <input type="text" name="q" placeholder="Zoeken..." :value="old('q')" class="w-full rounded-tl-full rounded-bl-full py-2 px-4" />
            <button type="submit" class="bg-gray-300 rounded-tr-full rounded-br-full hover:bg-gray-200 py-2 px-4">
                <p class="font-semibold text-base uppercase">Zoeken</p>
            </button>
        </div>
    </div>
</form>