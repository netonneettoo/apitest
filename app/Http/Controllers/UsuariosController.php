<?php

namespace App\Http\Controllers;

class UsuariosController extends Controller
{
    public function getData($id = null)
    {
        $faker = \Faker\Factory::create('pt_BR');
        $id = intval($id) ? intval($id) : $faker->numberBetween(1,111);
        $currentTimestamp = strtotime(date('m-d-Y'));
        $empresa = ['Elo', 'Stelo', 'Alelo'];
        $departamento = ['Financeiro', 'Marketing', 'TI', 'Engenharia'];
        $cargo = ['Analista', 'Programador', 'Estagiário', 'Engenheiro', 'Tester'];
        $empresaRandom = array_rand($empresa);
        $cargoRandom = array_rand($cargo);
        $departamentoRandom = array_rand($departamento);

        return [
            'id'=>$id,
            'nome'=>$faker->name,
            'email'=>$faker->email,
            'userName'=>$faker->userName,
            'cpf'=>$faker->numerify('###########'),
            'dataContratacao'=>$faker->date('Y-m-d'),
            'dataUltimaNotificacao'=>$currentTimestamp,
            'temAvatar'=>$faker->numberBetween(0,1),
            'bloqueado'=>$faker->numberBetween(0,1),
            'oculto'=>$faker->numberBetween(0,1),
            'detalhe'=>[
                'id'=>$id,
                'configuracaoHome'=>$faker->sentence,
                'dataAniversario'=>$faker->date('Y-m-d'),
                'telefoneElo'=>$faker->numerify('(##) 3###-####'),
                'celularElo'=>$faker->numerify('(##) 9 #####-####'),
                'telefonePessoal'=>$faker->numerify('(##) 3###-####'),
                'celularPessoal'=>$faker->numerify('(##) 9 #####-####'),
                'emailPessoal'=>$faker->email,
                'arquivoCurriculo'=>$faker->sentence,
                'dataCriacao'=>$currentTimestamp,
                'dataAtualizacao'=>$currentTimestamp,
            ],
            'cargo'=>[
                'id'=>array_keys($cargo)[$cargoRandom]+1,
                'nome'=>$cargo[$cargoRandom],
            ],
            'empresa'=>[
                'id'=>array_keys($empresa)[$empresaRandom]+1,
                'nome'=>$empresa[$empresaRandom],
            ],
            'departamento'=>[
                'id'=>array_keys($departamento)[$departamentoRandom]+1,
                'nome'=>$departamento[$departamentoRandom],
            ],
            'asset'=>[
                'id'=>$faker->numberBetween(1,111),
                'arquivo'=>$faker->imageUrl(),
            ],
            'dataCriacao'=>$currentTimestamp,
            'dataAtualizacao'=>$currentTimestamp,
            'dataExclusao'=>null,
        ];
    }

    public function index()
    {
        $data = new \stdClass();
        $data->httpCode = 1;
        $data->body = new \stdClass();
        $data->body->result = [];

        for ($i = 0; $i < rand(5,20); $i++) {
            array_push($data->body->result, $this->getData());
        }

        return json_encode($data);
    }

    public function find($id)
    {
        $data = new \stdClass();
        $data->httpCode = 1;
        $data->body = new \stdClass();
        $data->body->result = $this->getData($id);

        return json_encode($data);
    }
}
