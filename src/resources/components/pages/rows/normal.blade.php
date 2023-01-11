<div sort-key="{{ $row->sort }}" class="md:grid md:grid-cols-10 md:gap-2" id="row_{{ $row->id }}">
    <input type="hidden" name="id[{{ $row->id }}]" value="{{ $row->id }}" />
    <div class="pt-2 text-right">
        <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer inline handle h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
        </svg>
    </div>
    <div class="">
        @if(isset($row->calculationrow))
            <input readonly class="bg-blue-50 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-300 w-full border-blue-400 rounded shadow" type="text"  name="amount[{{ $row->id }}]" value="1" />
        @else
            <input class="hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-300 w-full border-gray-400 rounded shadow" type="text" name="amount[{{ $row->id }}]" value="{{ $row->amount }}" />
        @endif
        
    </div>
    <div class="">
        <select class="hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-300 w-full border-gray-400 rounded shadow" name="type[{{ $row->id }}]">
            <option value="{{ \App\Enums\RowType::X->value }}" {{ \App\Enums\RowType::X->value == $row->type ? 'selected' : '' }}>x</option>
            <option value="{{ \App\Enums\RowType::Stuks->value }}" {{ \App\Enums\RowType::Stuks->value == $row->type ? 'selected' : '' }}>stuk(s)</option>
            <option value="{{ \App\Enums\RowType::Post->value }}" {{ \App\Enums\RowType::Post->value == $row->type ? 'selected' : '' }}>post</option>
            <option value="{{ \App\Enums\RowType::Optie->value }}" {{ \App\Enums\RowType::Optie->value == $row->type ? 'selected' : '' }}>optie</option>
            <option value="{{ \App\Enums\RowType::Meter->value }}" {{ \App\Enums\RowType::Meter->value == $row->type ? 'selected' : '' }}>m¹</option>
            <option value="{{ \App\Enums\RowType::Vierkantemeter->value }}" {{ \App\Enums\RowType::Vierkantemeter->value == $row->type ? 'selected' : '' }}>m²</option>
            <option value="{{ \App\Enums\RowType::Uren->value }}" {{ \App\Enums\RowType::Uren->value == $row->type ? 'selected' : '' }}>uren</option>
            <option value="{{ \App\Enums\RowType::Pallets->value }}" {{ \App\Enums\RowType::Pallets->value == $row->type ? 'selected' : '' }}>pallets</option>
            <option value="{{ \App\Enums\RowType::Kokers->value }}" {{ \App\Enums\RowType::Kokers->value == $row->type ? 'selected' : '' }}>kokers</option>
        </select>
    </div>
    <div class="md:col-span-4">
        <textarea style="min-height:42px; height:42px;" class="hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-300 w-full border-gray-400 rounded shadow" name="description[{{ $row->id }}]">{{ $row->description }}</textarea>
    </div>
    <div class="">
        <input class="hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-300 w-full border-gray-400 rounded shadow" type="text" name="price[{{ $row->id }}]" value="{{ $row->price }}" />
    </div>
    <div class="text-xl text-right pt-2">
        {{ \App\Services\PriceService::display($row->amount * $row->price) }}
    </div>
    <div class="flex-none p-2 pt-4 w-10">
        <input type="hidden" name="delete[{{ $row->id }}]" id="delete_{{ $row->id }}" value="0" />
        <svg onclick="removeExistingRow({{ $row->id }})" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer text-red-400 hover:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </div>
    <input type="hidden" id="sort" name="sort[{{ $row->id }}]" value="{{ $row->sort }}" />
</div>