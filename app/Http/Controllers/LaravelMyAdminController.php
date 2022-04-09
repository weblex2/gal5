<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaravelMyAdminController extends Controller
{
   
    public $selectedDb="";


    function __construct(){
        $this->selectedDb = "";
    }


    function index($dbname=""){
        if ($dbname==null) $dbName="";
        return view('LaravelMyAdmin.index')->with('dbName');
    }

    
    function editDb($dbName="information_schema"){
        #if ($dbName=="") $dbname="information_schema";

        $qr = " select * 
                from information_schema.schemata s
                left join information_schema.tables t on s.schema_name = t.table_schema
                where schema_name = '".$dbName."'
                order by schema_name";       
        $res = \DB::select(\DB::raw($qr));
        $tables = [];
        foreach ($res as $row){
            $tables[$row->TABLE_NAME] = $row ; 
        }
        return view('LaravelMyAdmin.editDb', compact('dbName','tables') );
    }

    function editTable($dbName, $tableName){
        $dbName = trim($dbName);
        $tableName = trim($tableName);
        $qr = " select * 
        from information_schema.schemata s
        left join information_schema.tables t on s.schema_name = t.table_schema
        left join information_schema.columns c on s.schema_name = c.table_schema
        where schema_name = '".$dbName."'
        order by schema_name";       
        $res = \DB::select(\DB::raw($qr));
        $tables = [];
        foreach ($res as $row){
            $databases[$row->SCHEMA_NAME]['TABLES'][$row->TABLE_NAME]['COLUMN'][$row->COLUMN_NAME] = $row ; 
        }       
        return view('LaravelMyAdmin.editTable', compact('databases','tableName','dbName') );
    }

    function editColumn($dbName, $tableName, $columnName=null){
        $dbName = trim($dbName);
        $tableName = trim($tableName);
        $tableName = trim($tableName);
        return view('LaravelMyAdmin.editcolumn', compact('dbName','tableName','columnName') );
    }

    function getDbList(){
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
