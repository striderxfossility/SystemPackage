<?php
namespace Jelle\Strider;

class StateService {
    public static function offer($state)
    {
        switch ($state) {
            case 'new':
                return '<div class="text-blue-500"><i class="fa-regular fa-file"></i> Nieuw</div>';
            
            case 'sended':
                return '<div class="text-purple-500"><i class="fa-solid fa-envelope"></i> Verstuurd</div>';
            
            case 'nagebeld':
                return '<div class="text-yellow-500"><i class="fa-solid fa-phone"></i> Nagebeld</div>';
            
            case 'aanpassing':
                return '<div class="text-brown-500"><i class="fa-solid fa-pen-to-square"></i> Aanpassing</div>';
            
            case 'Afwachting':
                return '<div class="text-orange-500"><i class="fa-solid fa-hourglass-start"></i> Afwachting</div>';
            
            case 'Geweigerd':
                return '<div class="text-red-500"><i class="fa-solid fa-square-xmark"></i> Geweigerd</div>';
            
            case 'Akkoord':
                return '<div class="text-green-500"><i class="fa-solid fa-square-check"></i> Akkoord</div>';
            
            case 'Gefactureerd':
                return '<div class="text-indigo-500"><i class="fa-solid fa-file-invoice-dollar"></i> Gefactureerd</div>';
            
            case 'Nieuw':
                return '<div class="text-blue-500"><i class="fa-regular fa-file"></i> Nieuw</div>';
            
            case 'Verzonden':
                return '<div class="text-purple-500"><i class="fa-solid fa-envelope"></i> Verzonden</div>';
            
            default:
                return $state;
        }
        
    }
}