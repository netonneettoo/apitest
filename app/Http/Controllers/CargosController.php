<?php

namespace App\Http\Controllers;

class CargosController extends Controller
{
    public function index()
    {
        $currentTimestamp = strtotime(date('m-d-Y'));
        $cargo = ['Analista', 'Programador', 'Estagiário', 'Engenheiro', 'Tester'];

        $data = new \stdClass();
        $data->httpCode = 1;
        $data->body = new \stdClass();
        $data->body->result = [];

        for ($i = 0; $i < count($cargo); $i++) {
            array_push($data->body->result, [
                'id'=>$i+1,
                'nome'=>$cargo[$i],
                'dataCriacao'=>$currentTimestamp,
                'dataAtualizacao'=>$currentTimestamp,
                'dataExclusao'=>null,
            ]);
        }

        return json_encode($data);
    }

    public function find($id)
    {
        $faker = \Faker\Factory::create('pt_BR');
        $id = intval($id) ? intval($id) : $faker->numberBetween(1,111);
        $currentTimestamp = strtotime(date('m-d-Y'));
        $cargo = ['Analista', 'Programador', 'Estagiário', 'Engenheiro', 'Tester'];

        $data = new \stdClass();
        $data->httpCode = 1;
        $data->body = new \stdClass();
        $data->body->result = [
            'id'=>$id,
            'nome'=>$cargo[array_rand($cargo)],
            'dataCriacao'=>$currentTimestamp,
            'dataAtualizacao'=>$currentTimestamp,
            'dataExclusao'=>null,
        ];

        return json_encode($data);
    }
}
