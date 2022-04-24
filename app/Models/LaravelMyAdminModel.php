<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaravelMyAdminModel extends Model
{
    use HasFactory;

    function scopeGetDatabases(){
        $qr = "select * from information_schema.schemata s
        left join information_schema.columns c on s.schema_name = c.table_schema
        order by schema_name";
        $res = \DB::select(\DB::raw($qr));
        $databases = [];
        foreach ($res as $row){
          $databases[$row->SCHEMA_NAME]['TABLES'][$row->TABLE_NAME]['COLUMN'][$row->COLUMN_NAME] = $row ; 
        }
        return $databases;
    }
}
