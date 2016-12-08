<?php

namespace App\Http\Controllers;

class VagaTiposController extends Controller
{
    public function index()
    {
        $currentTimestamp = strtotime(date('m-d-Y'));
        $vagaTipos = ['Lorem tipo','Ipsum tipo','Dolor tipo','Sit tipo','Amet tipo','Consectetur tipo','Adipiscing tipo'];

        $data = new \stdClass();
        $data->httpCode = 1;
        $data->body = new \stdClass();
        $data->body->result = [];

        for ($i = 0; $i < count($vagaTipos); $i++) {
            array_push($data->body->result, [
                'id'=>array_keys($vagaTipos)[$i]+1,
                'nome'=>$vagaTipos[$i],
                'dataCriacao'=>$currentTimestamp,
                'dataAtualizacao'=>$currentTimestamp,
            ]);
        }

        return json_encode($data);
    }

    public function find($id)
    {
        $faker = \Faker\Factory::create('pt_BR');
        $id = intval($id) ? intval($id) : $faker->numberBetween(1,111);
        $currentTimestamp = strtotime(date('m-d-Y'));
        $vagaTipos = ['Lorem tipo','Ipsum tipo','Dolor tipo','Sit tipo','Amet tipo','Consectetur tipo','Adipiscing tipo'];
        $vagaTiposRandom = array_rand($vagaTipos);

        $data = new \stdClass();
        $data->httpCode = 1;
        $data->body = new \stdClass();
        $data->body->result = [
            'id'=>array_keys($vagaTipos)[$vagaTiposRandom]+1,
            'nome'=>$vagaTipos[$vagaTiposRandom],
            'dataCriacao'=>$currentTimestamp,
            'dataAtualizacao'=>$currentTimestamp,
        ];

        return json_encode($data);
    }
}
