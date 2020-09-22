<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
    
    public function logout() {
        Auth::logout();
        return \redirect('/');
    }

    public function data()
    {
        $ref = $this->getFirebase();
        $data = $ref->getValue();
        
        $keys = array_keys($data);
        // $keys2 = array_keys($data[$keys[0]]);
        // $keys3 = array_keys($data[$keys[0]][$keys2[0]]);
        // $keys4 = array_keys($data[$keys[0]][$keys2[0]][$keys3[0]]);

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

    public function messageIndex()
    {
        $ref = $this->getFirebase();
        $data = $ref->getValue();
        $keys = array_keys($data);
        
        return view('admin.pages.message.index', compact('keys'));
    }

    public function messageLevel1($index)
    {
        $ref = $this->getFirebase();
        $data = $ref->getValue();
        $keys = array_keys($data);
        

        for ($i=0; $i < count($keys); $i++) {
            $keys2 = array_keys($data[$keys[$i]]);
        }

        return view('admin.pages.message.index2')->with('keys', $keys2)->with('index', $index);
    }

    public function messageLevel2($index, $index2)
    {
        $ref = $this->getFirebase();
        $data = $ref->getValue();
        $keys = array_keys($data);
        $keys2 = array_keys($data[$keys[$index]]);
        $keys3 = array_keys($data[$keys[$index]][$keys2[$index2]]);
        
        //return $data[$keys[$index]][$keys2[$index2]][$keys3[0]]['number'];
        
        return view('admin.pages.message.index4')
        ->with('keys', $keys)
        ->with('keys2', $keys2)
        ->with('keys3', $keys3)
        ->with('index', $index)
        ->with('index2', $index2)
        ->with('ref', $ref)
        ->with('data', $data);
    }

    public function getFirebase()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebase-key.json');
        $firebase = (new Factory)
                    ->withServiceAccount($serviceAccount)
                    ->withDatabaseUri('https://my-tracking-a9c7f.firebaseio.com/')
                    ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('message');
        return $ref;
    }
}
