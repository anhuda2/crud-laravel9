<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController

{

    public function index()
    {
    	// mengambil data dari table pendaftaran
    	$pendaftaran = DB::table('pendaftaran')->get();
 
    	// mengirim data pendaftaran ke view index
    	return view('welcome', ['pendaftaran' => $pendaftaran]);

}
}