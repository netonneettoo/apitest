<?php

namespace App\Http\Controllers;

class EventosController extends Controller
{
    public function getData($id = null)
    {
        $faker = \Faker\Factory::create('pt_BR');
        $id = intval($id) ? intval($id) : $faker->numberBetween(1,111);
        $departamento = ['Financeiro', 'Marketing', 'TI', 'Engenharia'];
        return [
            'id'=>$id,
            'departamento'=>[
                'id'=>$faker->numberBetween(1,111),
                'nome'=>$departamento[array_rand($departamento)],
            ],
            'usuario'=>[
                'id'=>$faker->numberBetween(1,111),
                'nome'=>$faker->name,
            ],
            'dataEvento'=>$faker->date('d/m/Y'),
            'tituloEvento'=>$faker->title,
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
