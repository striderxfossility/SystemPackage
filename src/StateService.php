<?php
namespace Jelle\Strider;

class StateService {
    public static function offer($state)
    {
        switch ($state) {
            case 'new':
                return '<i class="fa-regular fa-file"></i> Nieuw';
            
            case 'sended':
                return '<i class="fa-solid fa-envelope-circle-check"></i> Verstuurd';
            
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
            
            case '0':
                return '<i class="fa-regular fa-file"></i> Nieuw';
            
            case '1':
                return '<i class="fa-solid fa-envelope-circle-check"></i> Verzonden';
            
            case '2':
                return '<i class="fa-solid fa-square-xmark"></i> Geweigerd';
            
            case '3':
                return '<i class="fa-solid fa-square-check"></i> Akkoord';
            
            case '4':
                return '<i class="fa-solid fa-file-invoice-dollar"></i> Gefactureerd';
            
            default:
                return $state;
        }
        
    }
}