<div class="grid-cols-12 grid-cols-11 grid-cols-10 grid-cols-9 grid-cols-8 grid-cols-7 grid-cols-6 grid-cols-5 grid-cols-4 grid-cols-3 grid-cols-2"></div>

<label class='mt-4 block font-medium text-sm text-gray-700'>
    {{ $label }}
</label>

<div class="relative">
    <button onclick="openSearch{{ $name }}()" type="button" style="padding:9px 10px;" class="absolute right-0 bg-slate-300 hover:bg-slate-200">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-slate-700 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
    </button>
    <input id="{{ $name }}" name="{{ $name }}" value="{{ $value != '' ? $value : old($name) }}" class="block mt-1 w-full shadow-sm border-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50" type="text" />
</div>

<div id="tablesearch{{ $name }}" style="z-index:5; display:none;" class="fixed top-0 left-0 m-10">
    <div id="loading{{ $name }}" style="display:none;" class="absolute ml-4 mt-4"><i class="fa-solid fa-spinner animate-spin"></i> Laden...</div>
    
    <button type="button" onclick="closeSearch{{ $name }}()" class="cursor-pointer absolute top-2 right-6">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
      

    <div style="height:calc(100vh - 5rem); width:calc(100vw - 5rem)" class="border-2 shadow-lg p-10 bg-slate-50 overflow-y-auto">

        <x-search-button :submit="false" :name="$name" />

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="sticky top-0 bg-slate-300 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <tr>
                    @foreach($columns as $column)
                        <th class="p-2">{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
        
            <tbody>
                @foreach($table as $row)
                    <tr onclick="selectRow{{ $name }}({{ $row->id }})" class="cursor-pointer searchClass{{ $name }} bg-white border-b hover:bg-slate-200">
                        @foreach($columns as $column)
                            <td class="p-2">{{ $row->$column }}</td>
                        @endforeach 
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

<script>
    function openSearch{{ $name }}()
    {
        document.getElementById('tablesearch{{ $name }}').style.display = 'block'
    }

    function closeSearch{{ $name }}()
    {
        document.getElementById('tablesearch{{ $name }}').style.display = 'none'
    }

    function selectRow{{ $name }}(id)
    {
        document.getElementById('{{ $name }}').value = id
        document.getElementById('tablesearch{{ $name }}').style.display = 'none'
    }

    function searchTable{{ $name }}()
    {
        document.getElementById('loading{{ $name }}').style.display = 'block'

        setTimeout(function() {
            var value = document.getElementById('q{{ $name }}').value
            var searches = document.getElementsByClassName('searchClass{{ $name }}');

            for (i = 0; i < searches.length; i++) {
                if (searches[i].innerText.toLowerCase().includes(value.toLowerCase())) {
                    searches[i].style.display = "table-row";
                } else {
                    searches[i].style.display = "none";
                }
            }

            document.getElementById('loading{{ $name }}').style.display = 'none'
        }, 0);
    }
</script>