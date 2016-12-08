<?php

namespace App\Http\Controllers;

class VagasController extends Controller
{
    public function getData($id = null)
    {
        $faker = \Faker\Factory::create('pt_BR');
        $id = intval($id) ? intval($id) : $faker->numberBetween(1,111);
        $currentTimestamp = strtotime(date('m-d-Y'));
        $departamento = ['Financeiro', 'Marketing', 'TI', 'Engenharia'];
        $departamentoRandom = array_rand($departamento);

        return [
            'id'=>$id,
            'usuario'=>[
                'id'=>$faker->numberBetween(1,111),
                'nome'=>$faker->name,
            ],
            'vagaTipo'=>[
                'id'=>$faker->numberBetween(1,111),
                'nome'=>$faker->sentence,
            ],
            'departamento'=>[
                'id'=>array_keys($departamento)[$departamentoRandom]+1,
                'nome'=>$departamento[$departamentoRandom],
            ],
            'titulo'=>$faker->name,
            'descricao'=>$faker->sentence,
            'obj'=>$faker->sentence,
            'dataCriacao'=>$currentTimestamp,
            'dataAtualizacao'=>$currentTimestamp,
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
