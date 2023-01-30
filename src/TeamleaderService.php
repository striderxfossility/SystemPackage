<?php
namespace Jelle\Strider;

use Illuminate\Support\Facades\Log;

class TeamleaderService {
    public static function process($url, $fields)
    {
        $apiFields = array(  
			"api_group"  => ("20052"),
			"api_secret" => ("8mLuI3Tg5oHznrQ8ov6fscTXOt0XGayEmaZV3I1YXznbQ4a5q6aI9UwOemBLnZgA05lUEdIsCWuiRud7qeGqZ344gvGtlMTbI4Vd7uwzhQIYaMWrRsHHlCCrY8LaLubjoXnmiJMqpkfpX1HEkfbwHDOwCpwdJynYmAau9MLpXQFKIcfShgfPKTbc8xgIVtx7UxsUa39Y")
		);

		$fields = array_merge($apiFields, $fields);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);	
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$api_output =  curl_exec($ch);
		$json_output = json_decode($api_output);
		$output = $json_output?$json_output:$api_output;

		return $output;
    }

	public static function get_deal_overview($deal_id)
	{
		$deal = TeamleaderService::process('https://app.teamleader.eu/api/getDeal.php', ['deal_id' => $deal_id]);

		if(!isset($deal->title))
			return '';

		$stringBuilder = '';

		$stringBuilder .= $deal->title . '<br />';

		if(isset($deal->offerte_nr))
			$stringBuilder .= '<b>Offerte ' . date('Y') . ' / ' . $deal->offerte_nr .'</b><br /><br />';

		if(isset($deal->items))
		{
			foreach($deal->items as $item)
			{
				if($item->subtitle != "")
				{
					$stringBuilder .= '<b>'.$item->subtitle . '</b><br />';
				}
				$stringBuilder .= $item->amount . ' -- ' .$item->text . '<br />';
			}
		}

		if(isset($deal->custom_fields->{'61732'}))
			$stringBuilder .= '<br /><i>leveradres:' . $deal->custom_fields->{'61732'} . '</i>';

		if(isset($deal->custom_fields->{'132606'}))
			$stringBuilder .= '<br /><i>Levering:' . $deal->custom_fields->{'132606'} . '</i>';

		return html_entity_decode($stringBuilder);
	}

    public static function add_order_to_teamleader($order)
    {
		$company_id = self::get_company('Badkamerstudio');
		$ref = '';

		if(isset($order->offer->contact))
		{
			if($order->offer->contact->groothuis != null)
			{
				$ref = $order->offer->contact->groothuis->project . ' - ' . $order->offer->contact->groothuis->omschrijving;
			} else {
				$ref = $order->offer->contact->last_name;
			}
		}

		$title_offerte = 'Bestelbon - ' . $ref;


		$fields = array(  
			"contact_or_company"    => ("company"),
			"contact_or_company_id" => ($company_id),
			"title"                 => ($title_offerte),
			"custom_field_41732"    => (date('d/m/Y', strtotime("+7 day"))),
			"custom_field_61732"    => $order->straat . ' - ' . $order->postcode . ' - ' . $order->plaats,
			"custom_field_132609"   => 299591,
			"custom_field_132606"   => $order->delivery_date,
			"source"                => "backend.badkamerstudio",
			"subtitle_1"            => ("Referentie: " . $ref),
			"vat_1"                 => (21),
		);

		if($order->orderproduct()->count() > 0)
		{
			for ($i=0; $i < $order->orderproduct()->count(); $i++) 
			{ 
				$tile = \App\Models\Tile::find($order->orderproduct()->get()[$i]->model_id);
				$fields["description_" . $i + 1]  	= $order->orderproduct()->get()[$i]->number . ' - ' . $order->orderproduct()->get()[$i]->name; 
				$fields["custom_descr_" . $i + 1] 	= ''; 
				$fields["amount_" . $i + 1]       	= number_format($tile->squared_meters * $order->orderproduct()->get()[$i]->amount, 2);  
				$fields["price_" . $i + 1] 			= $order->orderproduct()->get()[$i]->price;
				$fields["product_unit_" . $i + 1]   = 3340;
			}
		}

        self::process('https://www.teamleader.be/api/addDeal.php', $fields);
    }

	public static function get_company($contact_email)
	{
		$fields = array(  
			"searchby" => ($contact_email)
		);

		$contact = self::process("https://app.teamleader.eu/api/getCompanies.php?amount=1&pageno=0", $fields);

		if($contact == '[]')
			return null;
		
		return $contact[0]->id;
	}
}