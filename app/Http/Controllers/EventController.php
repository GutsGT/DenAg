<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\City;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view ('index');
    }

    public function dashboard(){
        $sessao = auth()->user();
        $city = City::where('id', $sessao->city_id)->first();
        $complaints = Complaint::where('city_id', $city->id);
        $teste = '';

        return view('dashboard', ['sessao' => $sessao, 'complaints' => $complaints, 'teste' => $teste]);
    }

    public function telaDenuncia(){
        return view ('telaDenuncia');
    }

    public function salvarDenuncia(Request $request){

        $denuncia = new Complaint;
        
        $denuncia->address    = $request->address;
        $denuncia->complement = $request->complement;

        $findCity = City::where('name', $request->city)->first();
        $denuncia->city_id = $findCity->id;
        
        $denuncia->save();
        
        return view('telaObrigado');
    }
}
