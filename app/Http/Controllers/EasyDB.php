<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EasyDB extends Controller
{

    function __construct()
    {
        $this->MIGRATIONFOLDER = base_path().'\database\migrations';
        $this->TEMPLATEFOLDER = base_path().'\database\templates';
        $this->ROOTFOLDER = base_path();
    }

    function index(){
        $qr = "select * from information_schema.schemata s
        left join information_schema.columns c on s.schema_name = c.table_schema
        where schema_name='".env('DB_DATABASE')."'
        order by schema_name";
        $res = \DB::select(\DB::raw($qr));
        
        $databases = [];
        foreach ($res as $row){
          $databases[$row->SCHEMA_NAME]['TABLES'][$row->TABLE_NAME]['COLUMN'][$row->COLUMN_NAME] = $row ;
        }

        return view('EasyDb.index', compact('databases'));
    }

    function editColumn($db, $table_name, $column_name){
        echo $db;
        echo "/ ";
        echo $table_name;
        echo "/ ";
        echo $column_name;
        $qr = "select * from information_schema.schemata s
        left join information_schema.columns c on s.schema_name = c.table_schema
        where schema_name='".$db."'
        and table_name='".$table_name."'
        and column_name = '".$column_name."'
        order by schema_name";
        $res = \DB::select(\DB::raw($qr));
        $databases = [];
        foreach ($res as $row){
          $databases[$row->SCHEMA_NAME]['TABLES'][$row->TABLE_NAME]['COLUMN'][$row->COLUMN_NAME] = $row ;
        }

        return view('EasyDb.editColumn', compact('databases'));
        return $db;
    }

    function showTable($name){
        $qr = "desc ".$name;
        $data = \DB::select($qr);
        foreach ($data as $key => $row){
            $row = (array)$row;
            $data[$key] = (array)$row;
            $pos = strpos($row['Type'],"(");
            if (!$pos){
                $pos = strlen($row['Type']);
            }
            $signed = isset(explode(" ", $row['Type'])[1]) ?  explode(" ", $row['Type'])[1] : "";
            $start = strpos($row['Type'], '(');
            $end =   strpos($row['Type'], ')');
            $datalength = ($start!=false) ? substr($row['Type'],$start+1, $end-$start-1) : "";
            $data[$key]['datatype'] = substr($row['Type'],0, $pos);
            $data[$key]['datalength'] = $datalength;
            $data[$key]['data_precision'] = 0;
            $data[$key]['signed'] = $signed;
            unset($data[$key]['Type']);
        }
        //$data = $data->addSelect(DB::raw("'datatype' as datatype"));


        return view('EasyDb.showTable', compact('data','name') );
    }

    function createTable(){
        $qr = "select * from information_schema.schemata s
        left join information_schema.columns c on s.schema_name = c.table_schema
        where schema_name='".env('DB_DATABASE')."'
        order by schema_name";
        $res = \DB::select(\DB::raw($qr));
        $databases = [];
        foreach ($res as $row){
          $databases[$row->SCHEMA_NAME]['TABLES'][$row->TABLE_NAME]['COLUMN'][$row->COLUMN_NAME] = $row ;
        }

        return view('EasyDb.createTable', compact('databases'));
    }


    function saveTable(Request $request){
        $data = $request->all();
        if (isset($data['table_name']) ){
            $name=$data['table_name'];
            return redirect()->route('easydb.showTable', compact('data', 'name'));
        }
        else {
            return redirect()->route('easydb.index');
        }
    }

    function dbOverview(){
        #$qr = "select * from information_schema.columns";
        #$res = \DB::select($qr)->paginate(10);

    }

    function makeTable(Request $request){
        $result='abc';
        $migration  = file_get_contents($this->TEMPLATEFOLDER.'\createTable.txt');
        $data = $request->all();
        #echo "<pre>";
        #print_r($data);
        #echo "<pre>";
        #print_r($data);
        #echo "</pre>";
        $colum_def = $this->createColumnDefinitionStatements($data['col']);
        $table_name  = $data['table_name'];
        $classname = 'Create'.$this->toCamelCase($table_name, true).'Table';

        $migration = str_replace( '%classname%', $classname, $migration);
        $migration = str_replace( '%table_name%', $table_name, $migration);
        $migration = str_replace( '%column_def%', $colum_def, $migration);
        $migration = trim($migration);


        #$migration = nl2br($migration);
        //echo htmlentities($migration);

        $fh = fopen($this->MIGRATIONFOLDER.'/2022_03_24_000000_create_'.$table_name. '_table.php','w');
        fwrite($fh,$migration);
        fclose($fh);

        // Neccessary to execute partisan commands
        echo $this->ROOTFOLDER;
        chdir($this->ROOTFOLDER);
        $result="0";
        $output = shell_exec('php artisan migrate');
        echo getcwd();

        if (strpos('Nothing to migrate.',$output)){
            $result='2';
        }
        $output = nl2br($output);
        return view('EasyDb.makeTable',compact( 'migration', 'table_name', 'output', 'result'));
    }

    function editTable($name){
        $qr = "SELECT column_name, is_nullable, data_type, character_maximum_length, ordinal_position FROM information_schema.columns WHERE TABLE_NAME='".$name."' AND table_schema='lara6' ORDER BY ordinal_position";
        $qr = "desc ".$name;
        $data = \DB::select($qr);
        foreach ($data as $key => $row){
            $row = (array)$row;
            $data[$key] = (array)$row;
            $pos = strpos($row['Type'],"(");
            if (!$pos){
                $pos = strlen($row['Type']);
            }
            $signed = isset(explode(" ", $row['Type'])[1]) ?  explode(" ", $row['Type'])[1] : "";
            $start = strpos($row['Type'], '(');
            $end =   strpos($row['Type'], ')');
            $datalength = ($start!=false) ? substr($row['Type'],$start+1, $end-$start-1) : "";
            $data[$key]['datatype'] = substr($row['Type'],0, $pos);
            $data[$key]['datalength'] = $datalength;
            $data[$key]['signed'] = $signed;
            $data[$key]['data_precision'] = 0;
            unset($data[$key]['Type']);
        }
        //$data = $data->addSelect(DB::raw("'datatype' as datatype"));
        $header = array_keys((array)$data[0]);
        return view('EasyDb.editTable', compact('data','header','name') );
    }

    function createNewTableDetailRow($row){
        $fields = ['column_name', 'is_nullable', 'data_type', 'character_maximum_length' ];
        $fieldValues = ['string', 'bool', 'dropdown', 'int'];

        $res = implode('|',$fields);
        return view('EasyDb.createNewTableDetailRow')->with('row',$row);
    }

    function toCamelCase($string, $capitalizeFirstCharacter = false){
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }

    private function createColumnDefinitionStatements($data){
        $noDataLength=['id'];
        $column_definition = "";
        $nullable="";
        foreach ($data as $ind => $col){
            $col_name   = '"'.$col['column_name'].'"';
            $datatype   = $col['datatype'];
            $datalength = $col['datalength']!="" ? ", ". $col['datalength'] : "";


            // id
            if ($datatype=="id"){
                   $datatype = "string";
                   $datalength="";
            }

            if (in_array($datatype, $noDataLength)){
                $datalength="";

                echo "jpoooooooooooooooooo";
            }
            else {
                echo "datatype is". $datatype;
                echo "neeeeeeeeeeeee";
            }

            if (isset($col['nullable'])){
                $nullable   = $col['nullable'] !="" ? "->nullable()" : "";
            }
            $column_definition .= "";
            $column_definition .= '$table->'.$col['datatype'];
            $column_definition .= '('.$col_name. $datalength.')';
            $column_definition .= $nullable.';'.PHP_EOL;
        }
        return $column_definition;
    }
}
