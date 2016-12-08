<?php

namespace App\Http\Controllers;

class ClippingsController extends Controller
{
    public function getData($id = null)
    {
        $faker = \Faker\Factory::create('pt_BR');
        $id = intval($id) ? intval($id) : $faker->numberBetween(1,111);
        return [
            'id'=>$id,
            'usuario'=>[
                'id'=>$faker->numberBetween(1,111),
                'name'=>$faker->name,
            ],
            'titulo'=>$faker->title,
            'conteudo'=>$faker->sentence,
            'dataPublicacao'=>$faker->date('Y-m-d'),
            'arquivo'=>[
                'id'=>$faker->numberBetween(1,111)
            ],
            'dataCriacao'=>$faker->unixTime,
            'dataAtualizacao'=>$faker->unixTime,
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
