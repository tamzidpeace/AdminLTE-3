<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('admin.pages.master');
    }

    public function login()
    {
        return view('admin.pages.login');
    }

    public function data()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebase-key.json');

        $firebase 		  = (new Factory)

                        ->withServiceAccount($serviceAccount)

                        ->withDatabaseUri('https://my-tracking-a9c7f.firebaseio.com/')

                        ->create();

        $database 		= $firebase->getDatabase();

        $newPost 		  = $database

                            ->getReference('message');

                            
        $data = $newPost->getValue();
        
        $keys = array_keys($data);        
        $keys2 = array_keys($data[$keys[0]]);        
        $keys3 = array_keys($data[$keys[0]][$keys2[0]]);
        $keys4 = array_keys($data[$keys[0]][$keys2[0]][$keys3[0]]);

        for ($i=0; $i < count($keys); $i++) { 
            $keys2 = array_keys($data[$keys[$i]]); 
            for ($j=0; $j < count($keys2); $j++) { 
                $keys3 = array_keys($data[$keys[$i]][$keys2[$j]]);
                for ($k=0; $k < count($keys3); $k++) { 
                    $keys4 = array_keys($data[$keys[$i]][$keys2[$j]][$keys3[$k]]);
                    foreach ($keys4 as $key => $value) {
                        echo $value . '<br>';
                    }
                }
            }
        }
        
                
        
    }
}
