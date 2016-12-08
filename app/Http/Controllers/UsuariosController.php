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
                'id'=>$faker->numberBetween(1,111),
                'nome'=>$cargo[array_rand($cargo)],
            ],
            'empresa'=>[
                'id'=>$faker->numberBetween(1,111),
                'nome'=>$empresa[array_rand($empresa)],
            ],
            'departamento'=>[
                'id'=>$faker->numberBetween(1,111),
                'nome'=>$departamento[array_rand($departamento)],
            ],
            'asset'=>[
                'id'=>$faker->numberBetween(1,111),
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
