<?php

namespace App\View\Components\LaravelMyAdmin;

use Illuminate\View\Component;
use App\http\Controllers\LaravelMyAdminController;

class DbList extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */

    protected $dbName; //for consistency

    public function __construct($dbName=null)
    {
       $this->dbName=$dbName;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        //$selectedDb = $this->$selectedDb;
        $dbName = $this->dbName;
        $databases = LaravelMyAdminController::getDbList();
        return view('components.laravel-my-admin.db-list', compact('databases','dbName'));
    }
}
