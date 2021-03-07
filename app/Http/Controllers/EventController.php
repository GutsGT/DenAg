<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\City;

use Illuminate\Http\Request;

class EventController extends Controller
{

    private $totalPage = 3;

    public function index(){
        return view ('index');
    }

    public function dashboard(){
        $sessao = auth()->user();
        $city = City::where('id', $sessao->city_id)->first();
        $complaints = Complaint::where('city_id', $city->id);
        $complaints = $complaints->where('status', 0)->paginate($this->totalPage);
        
        return view('dashboard', ['sessao' => $sessao, 'complaints' => $complaints]);
    }

    public function telaDenuncia(){
        $cities = City::all();
        $cities = $cities->sortBy('name');
        return view ('telaDenuncia', ['cities' => $cities]);
    }

    public function salvarDenuncia(Request $request){

        $denuncia = new Complaint;
        
        $denuncia->address    = $request->address;
        $denuncia->complement = $request->complement;
        $denuncia->city_id = $request->city;
        $denuncia->status = 0;

        $denuncia->save();
        
        return view('telaObrigado');
    }

    public function fecharDenuncia($id){

        

        return redirect('dashboard');
    }
}
