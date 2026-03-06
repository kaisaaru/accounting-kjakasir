<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class PanduanController extends Controller
{
    public function index (){
        try {
            return view('guide.panduan');
        } catch (Exception $e){
            
        }
        
    }
    public function indexGroup ($group){
        try {
            return view('guide.group.'. $group);
        } catch (Exception $e){
            return redirect('/home')->with('error', 'panduan tidak ditemukan');
        }
       
    }
}

