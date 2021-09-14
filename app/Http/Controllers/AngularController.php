<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngularController extends Controller
{
    public function index()
    {
        $root = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
        //require($root . 'dist' . DIRECTORY_SEPARATOR . 'vet-front' . DIRECTORY_SEPARATOR . 'index.html');
        return view('angular');
    }
}