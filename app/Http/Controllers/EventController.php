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
        
        //Comando para pegar o id da cidade
        $city = City::where('id', $sessao->city_id)->first();

        //Comando para fazer a listagem e paginação
        $complaints = Complaint::where('city_id', $city->id);
        $complaints = $complaints->where('status', 0)->paginate($this->totalPage);
        
        //Comandos para montar o gráfico
        $anoAtual = date('Y');
        $diaAtual = date('d')-1;
        $mesAtual = date('m');

        $data = '';

        $quantDenCidades[0] = ''; // = Quantidade de denúncias da Cidade

        for($f = 6 ; $f > -1 ; $f--){

            $dia = $diaAtual - $f;
            $mes = $mesAtual;
            $ano = $anoAtual;

            if($dia < 1){
                //Volta um mês
                $mes--;
                $mes = $mes == 0?12:$mes;

                if($mesAtual%2 == 0){
                    //Mês par
                    $dia = 31 + $dia;
                }else{
                    //Mês ímpar
                    if($mesAtual == 3){
                        $dia = 28 + $dia;
                    }else{
                        if($mesAtual == 1){
                            //Volta um ano
                            $ano = 12;
                            $dia = 31 + $dia;
                        }else{
                            $dia = 30 + $dia;
                        }
                    }
                }

            }

            $data = $ano.'-'.$mes.'-'.$dia;

            $from = $data.' 00:00:00';
            $to = $data.' 23:59:59';

            $quantDenCidades[$f] = Complaint::where('city_id', $city->id)
                ->whereBetween('created_at', [$from, $to])->count();  
        }
        //Comandos para montar o gráfico (fim)


        return view('dashboard', ['sessao' => $sessao, 'complaints' => $complaints, 'quantDenCidade' => $quantDenCidades]);
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

        $complaint = Complaint::where('id', $id)->first();
        $complaint->status = 1;
        $complaint->update();

        return redirect('dashboard');
    }
}
