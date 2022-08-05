<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\rol;

class rolController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listar(){
        $roles = rol::all();
    }

   
}