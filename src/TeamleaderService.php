<?php
namespace Jelle\Strider;

class TeamleaderService {
    private static function process($url, $fields)
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

        dump($output);

		return $output;
    }

    public static function addOrderToTeamleader($order)
    {
        self::process('https://www.teamleader.be/api/orders.php', []);
        dd($order);
    }
}