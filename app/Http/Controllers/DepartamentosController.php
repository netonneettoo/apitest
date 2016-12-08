<?php

namespace App\Http\Controllers;

class DepartamentosController extends Controller
{
    public function index()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $currentTimestamp = strtotime(date('m-d-Y'));
        $departamento = ['Financeiro', 'Marketing', 'TI', 'Engenharia'];

        $data = new \stdClass();
        $data->httpCode = 1;
        $data->body = new \stdClass();
        $data->body->result = [];

        for ($i = 0; $i < count($departamento); $i++) {
            array_push($data->body->result, [
                'id'=>$i+1,
                'nome'=>$departamento[$i],
                'eloCode'=>$faker->slug(3),
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
        $departamento = ['Financeiro', 'Marketing', 'TI', 'Engenharia'];

        $data = new \stdClass();
        $data->httpCode = 1;
        $data->body = new \stdClass();
        $data->body->result = [
            'id'=>$id,
            'nome'=>$departamento[array_rand($departamento)],
            'eloCode'=>$faker->slug(3),
            'dataCriacao'=>$currentTimestamp,
            'dataAtualizacao'=>$currentTimestamp,
            'dataExclusao'=>null,
        ];

        return json_encode($data);
    }
}
