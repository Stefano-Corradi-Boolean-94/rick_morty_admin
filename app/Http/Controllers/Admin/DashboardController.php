<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;

class DashboardController extends Controller
{
    public function index(){

       // $character_deleted = Character::withTrashed()->find(4); // recupero un record eliminato
       // $character_deleted->restore(); // lo tolgo dali eliminati


        // tutti i record esclusi gli eliminati
        $n_characters =  Character::all()->count();

        // solo gli eleiminati
        $n_deleted = Character::onlyTrashed()->get()->count();

        // tutti compresi gli eliminati
        $n_characters_all = Character::withTrashed()->get()->count();


        return view('admin.home', compact('n_characters', 'n_deleted', 'n_characters_all'));
    }
}
