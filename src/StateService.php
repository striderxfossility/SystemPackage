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
                return '<i class="fa-solid fa-phone"></i> Nagebeld';
            
            case 'aanpassing':
                return '<i class="fa-solid fa-pen-to-square"></i> Aanpassing';
            
            case 'Afwachting':
                return '<i class="fa-solid fa-hourglass-start"></i> Afwachting';
            
            case 'Geweigerd':
                return '<i class="fa-solid fa-square-xmark"></i> Geweigerd';
            
            case 'Akkoord':
                return '<i class="fa-solid fa-square-check"></i> Akkoord';
            
            case 'Gefactureerd':
                return '<i class="fa-solid fa-file-invoice-dollar"></i> Gefactureerd';
            
            case 'Nieuw':
                return '<i class="fa-regular fa-file"></i> Nieuw';
            
            case 'Verzonden':
                return '<i class="fa-solid fa-envelope-circle-check"></i> Verzonden';
            
            default:
                return $state;
        }
        
    }
}