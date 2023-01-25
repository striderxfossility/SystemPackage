<?php
namespace Jelle\Strider;

use Illuminate\Support\Facades\Schema;

class TableService {
    public static function head($name)
    {
        switch ($name) {
            case 'id':
                return 'ID';
            case 'src':
                return 'Foto';
            case 'name':
                return 'Naam';
            case 'created_at':
                return 'Toegevoegd op';
            case 'updated_at':
                return 'Geupdated op';
            case 'old':
                return 'Oud';
            case 'default':
                return 'Standaard';
            case 'pdf_numbers':
                return 'Pdf paginas';
        }
            
        
        return $name;
    }

    public static function value($value, $column, $column_value)
    {
        switch ($column_value) {
            case 'datetime':
                return \Jelle\Strider\DateService::get($value);
            case 'boolean':
                if($value)
                    return 'Ja';
                else 
                    return 'Nee';
        }

        return $value;
    }
}