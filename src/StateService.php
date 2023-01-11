<?php
namespace Jelle\Strider;

class StateService {
    public static function offer($state)
    {
        switch ($state) {
            case 'new':
                return 'Nieuw';
            
            case 'sended':
                return 'Verstuurd';
            
            case 'nagebeld':
                return 'Nagebeld';
            
            case 'aanpassing':
                return 'Aanpassing';
            
            case 'Afwachting':
                return 'Afwachting';
            
            case 'Geweigerd':
                return 'Geweigerd';
            
            case 'Akkoord':
                return 'Akkoord';
            
            case 'Gefactureerd':
                return 'Gefactureerd';
            
            case '0':
                return 'Nieuw';
            
            case '1':
                return 'Verzonden';
            
            case '2':
                return 'Geannuleerd';
            
            case '3':
                return 'Geaccepteerd';
            
            case '4':
                return 'Gefactureerd';
            
            default:
                return $state;
        }
        
    }
}