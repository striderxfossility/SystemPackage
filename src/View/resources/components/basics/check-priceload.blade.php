@if(DB::table('jobs')->where('payload','like','%SetOfferPiceJob"%')->where('payload', 'like', "%;i:{$offer->id};%")->first() != null)
    <div id="loading" class="text-xs text-red-700 font-bold text-center my-2">
        <i class="fa-solid fa-spinner animate-spin"></i> Prijzen worden opnieuw berekend...
    </div>
@endif