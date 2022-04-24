<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\LaravelMyAdminModel;

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
        $dbName = trim($dbName);
        session(['selectedDb' => $dbName]);
        session(['selectedTable' => ""]);
        session(['selectedColumn' => ""]);
        $qr = " select * 
                from information_schema.schemata s
                join information_schema.tables t on s.schema_name = t.table_schema
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
        session(['selectedDb' => $dbName]);
        session(['selectedTable' => $tableName]);
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

   

    function editColumn($dbName, $tableName, $columnName){
        $dbName = trim($dbName);
        $tableName = trim($tableName);
        $columnName = trim($columnName);
        session(['selectedDb' => $dbName]);
        session(['selectedTable' => $tableName]);
        session(['selectedColumn' => $columnName]);

        $qr = " select * 
        from information_schema.schemata s
        left join information_schema.tables t on s.schema_name = t.table_schema
        left join information_schema.columns c on c.table_name = t.table_name
        where schema_name = '".$dbName."'
        and t.table_name = '".$tableName."'
        and c.column_name = '".$columnName."'
        order by schema_name";       
        $res = \DB::select(\DB::raw($qr));
        $tables = [];
        foreach ($res as $row){
            $databases[$row->SCHEMA_NAME]['TABLES'][$row->TABLE_NAME]['COLUMN'][$row->COLUMN_NAME] = $row ; 
        }       
        return view('LaravelMyAdmin.editTable', compact('databases','tableName','dbName', 'columnName') );

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

    function CreateNewTable($db, $tableName){
        return  "joooooo" ;       
    }

    function saveTable(Request $request){
        $req = $request->all();
        echo "<pre>";
        return "Save Table for ". print_r($req);
    }

}
