<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Houses;
use App\Models\HousesArticle;
use App\Models\HouseFormular;
use App\Models\HouseFormularInput;
use App\Models\HouseTranslation;
use Session;
use Storage;
use Artisan;
use Exception;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Schema;
use DB;


class HouseController extends Controller
{


    public function index(){
        #$af = HouseFormular::where('field_name', '=', 'asdd')->get();
        #dump($af);
        #die();
        #phpinfo();
        $languages = ['D','E','F'];
        Session::put('showLanguages', $languages);
        $houses = Houses::all();
        #dump($houses);
        return view('house.index', compact('houses'));
    }

    public function create(){

    }

    public function edit($id){

        $house  = Houses::find($id);
        $house->load('translations');
        $frmHouse = HouseFormular::orderBy('section','ASC')->orderBy('ord','ASC')->get();
        $frmHouse->load('inputs');
        $showLanguages = session('showLanguages');
        $house->showLang =  $showLanguages;
        #dump($house);
        #die();

        #dump($frmHouse);
        return view ('house.edit', compact('house', 'frmHouse'));
    }

    public function update(Request $request){
        $req = $request->all();
        $house_id = $req['id'];
        $trans = $req['trans'];

        #dump($req);
        #dump($trans);
        $translatons = new HouseTranslation;
        $translatons->find($house_id);
        $translatons->fill($trans);
        #dump($translatons);
        foreach($trans as $fieldname => $section){
            #echo $fieldname."<br>";
            foreach($section as $key => $value) {

                if (is_numeric($key)) {
                    #echo "Key found ->Update -" .$value;
                    $translatons = HouseTranslation::find($key);
                    $translatons->translation = $value;
                    #dump($translatons);
                    $translatons->update();
                }
                else{
                    #echo "Key new ->Insert";
                    $translatons = new HouseTranslation();
                    $translatons->houses_id = $house_id;
                    $translatons->field = $fieldname;
                    $translatons->language = $key;
                    $translatons->translation = $value;
                    #dump($translatons);
                    $translatons->save();

                }
            }
        }
        $house  = Houses::find($req['id']);
        $house->fill($req);
        $res = $house->update();
        return redirect()->route('house.edit', ['id'=>$req['id']])->with('success','House saved successfully.');;
    }

    public function configHouse(){
        $config=1;
        $showLanguages = session('showLanguages');
        $house  = Houses::find(1);
        $house->showLang =  $showLanguages;
        $frmHouse = HouseFormular::orderBy('ord','ASC')->get();
        return view('house.configform', compact('house', 'frmHouse','config'));
    }

    public function makeMigration($data){
        $field      = strtolower($data['newFieldName']);
        $table      = $data['table'];
        $length     = $data['newFieldLength'];
        $afterField = $data['afterFieldName'];
        switch($data['newFieldType']){

            case "TEXT":
                $up = "
                Schema::table('$table', function (Blueprint \$table) {
                    \$table->string('$field',$length)->after('$afterField');
                });";
                break;

            case "DATE":
                $up = "
                Schema::table('$table', function (Blueprint \$table) {
                    \$table->date('$field')->after('$afterField')->nullable();
                });";
                break;

            case "CKBX":
                $up = "
                Schema::table('$table', function (Blueprint \$table) {
                    \$table->integer('$field')->after('$afterField')->nullable();
                });";

            case "SELECT":
                $up = "
                Schema::table('$table', function (Blueprint \$table) {
                    \$table->string('$field',10)->after('$afterField')->nullable();
                });";

            default:
                break;
        }

        $down = "Schema::table('$table', function(\$table) {
            \$table->dropColumn('$field');
        });";

        $p = storage_path('app\public\houses\a.txt');
        $migration_class_name = ucfirst($table)."AddField".ucfirst($field);
        $migration  = file_get_contents($p);
        $migration  = str_replace('%migration_class_name%', $migration_class_name, $migration);
        $migration  = str_replace('%up%', $up, $migration);
        $migration  = str_replace('%down%', $down, $migration);
        $migation_name = date('Y_m_d_His')."_".$table."_addField_".$field.".php";
        $migration_path = '../database/migrations/'. $migation_name;
        $fh = fopen($migration_path, 'w');
        fwrite($fh, $migration);
        fclose($fh);
        return $migration_path;
    }

    public function makeDropMigration($data){
        $table = $data['table'];
        $field = $data['field'];
        $down = "";
        $up = "Schema::table('clients', function (Blueprint \$table) {
                    \$table->dropColumn('UserDomainName');
               });";

               $p = storage_path('app\public\houses\a.txt');
               $migration_class_name = ucfirst($table)."AddField".ucfirst($field);
               $migration  = file_get_contents($p);
               $migration  = str_replace('%migration_class_name%', $migration_class_name, $migration);
               $migration  = str_replace('%up%', $up, $migration);
               $migration  = str_replace('%down%', $down, $migration);
               $migation_name = date('Y_m_d_His')."_".$table."_addField_".$field.".php";
               $migration_path = '../database/migrations/'. $migation_name;
               $fh = fopen($migration_path, 'w');
               fwrite($fh, $migration);
               fclose($fh);
               return $migration_path;
    }

    public function createNewField(Request $request){

        $req            = $request->all();
        $table          = "houses";
        $field          = strtolower($req['newFieldName']);
        $length         = $req['newFieldLength'];
        $type           = $req['newFieldType'];
        $afterField     = $req['afterFieldName'];
        $displayWidth   = $req['displayWidth'];
        $req['table']   = $table;

        if (Schema::hasColumn($table, $field)){
            $err =  ['error'=> 'Field '. $field .' already exists'];
            return \Response::json(['error'=>'Field '. $field .' already exists'], 500);
        }

        // no migration needed
        $no_mig = [
            0 => 'SEP'
        ];


        if (!in_array($type, $no_mig)) {

            $migration = $this->makeMigration($req);
            try {
                Artisan::call('migrate');
                $res = Artisan::output();
            }
            catch(Exception $e){
                return \Response::json(['error'=>'Migration failed.'. $e->getMessage()], 500);
            }


            $af = HouseFormular::where('table', '=', $table)
                ->where('field_name', '=', $afterField)
                ->first();

            if (!$af) {
                return \Response::json(['error'=>'Field '. $afterField .' not found ('.$table. ')'], 500);
            }

            if ($af && $af->count()>0) {
                $ord = $af->ord;
                $updateOrd = HouseFormular::where('table', '=', $table)
                    ->where('ord', '>', $ord)->get();
                if ($updateOrd->count()>0){
                    foreach ($updateOrd as $i => $item) {
                        $updateOrd[$i]->ord = $item->ord +10;
                        $updateOrd[$i]->update();
                    }
                }
            }

            if (Schema::hasColumn($table, $field)) {

                $housesFormular = new HouseFormular();
                $housesFormular->ord=$ord+10;
                $housesFormular->table=$table;
                $housesFormular->field_name=$field;
                $housesFormular->field_type=$type;
                $housesFormular->field_data_src="";
                $housesFormular->field_width=$displayWidth;
                $housesFormular->section="1";
                $housesFormular->save();
            }
            else{
                unset($migration_path);
            }
        }
        else {
            $af = HouseFormular::where('field', '=', $afterField);
            $ord = $af->ord;
            $newFormField = new HouseFormular();
            $newFormField->ord=100;
            $newFormField->table=$table;
            $newFormField->field_name=$field;
            $newFormField->field_type=$type;
            $newFormField->field_data_src="";
            $newFormField->field_width=10;
            $newFormField->section="1";

            DB::transaction(function () {
                //DB::update('update users set votes = 1');
                //DB::delete('delete from posts');
                $newFormField->save();
            }, 5);
        }

    }



    public function deleteField(Request $request){

        $req = $request->all();
        //$id = $req['id'];
        $dumpField = HouseFormular->find($id);
        dump($req);
        die();
        $this->makeDropMigration($req);
        try {
            Artisan::call('migrate');
            $res = Artisan::output();
        }
        catch(Exception $e){
            return \Response::json(['error'=>'Migration failed.'. $e->getMessage()], 500);
        }
        dump ($request);
    }


}
