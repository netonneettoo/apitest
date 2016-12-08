<?php

namespace App\Http\Controllers;

class EventosController extends Controller
{
    public function getData($id = null)
    {
        $faker = \Faker\Factory::create('pt_BR');
        $id = intval($id) ? intval($id) : $faker->numberBetween(1,111);
        $currentTimestamp = strtotime(date('m-d-Y'));

        return [
            'id'=>$id,
            'usuario'=>[
                'id'=>$faker->numberBetween(1,111),
                'nome'=>$faker->name,
            ],
            'nome'=>$faker->name,
            'endereco'=>$faker->streetAddress,
            'imagemDestaque'=>[
                'id'=>$faker->numberBetween(1,111),
                'arquivo'=>$faker->imageUrl(),
            ],
            'descricaoDestaque'=>$faker->sentence,
            'galeria'=>$faker->imageUrl(),
            'programacao'=>[
                [
                    'id'=>$faker->numberBetween(1,111),
                    'titulo'=>$faker->name,
                    'descricao'=>$faker->sentence,
                    'ordem'=>$faker->numberBetween(1,111),
                    'dataCriacao'=>$currentTimestamp,
                    'dataAtualizacao'=>$currentTimestamp,
                ],
                [
                    'id'=>$faker->numberBetween(1,111),
                    'titulo'=>$faker->name,
                    'descricao'=>$faker->sentence,
                    'ordem'=>$faker->numberBetween(1,111),
                    'dataCriacao'=>$currentTimestamp,
                    'dataAtualizacao'=>$currentTimestamp,
                ],
                [
                    'id'=>$faker->numberBetween(1,111),
                    'titulo'=>$faker->name,
                    'descricao'=>$faker->sentence,
                    'ordem'=>$faker->numberBetween(1,111),
                    'dataCriacao'=>$currentTimestamp,
                    'dataAtualizacao'=>$currentTimestamp,
                ],
                [
                    'id'=>$faker->numberBetween(1,111),
                    'titulo'=>$faker->name,
                    'descricao'=>$faker->sentence,
                    'ordem'=>$faker->numberBetween(1,111),
                    'dataCriacao'=>$currentTimestamp,
                    'dataAtualizacao'=>$currentTimestamp,
                ]
            ],
            'palestrante'=>[
                [
                    'id'=>$faker->numberBetween(1,111),
                    'nome'=>$faker->name,
                    'descricao'=>$faker->sentence,
                    'ordem'=>$faker->numberBetween(1,111),
                    'dataCriacao'=>$currentTimestamp,
                    'dataAtualizacao'=>$currentTimestamp,
                ],
                [
                    'id'=>$faker->numberBetween(1,111),
                    'nome'=>$faker->name,
                    'descricao'=>$faker->sentence,
                    'ordem'=>$faker->numberBetween(1,111),
                    'dataCriacao'=>$currentTimestamp,
                    'dataAtualizacao'=>$currentTimestamp,
                ],
                [
                    'id'=>$faker->numberBetween(1,111),
                    'nome'=>$faker->name,
                    'descricao'=>$faker->sentence,
                    'ordem'=>$faker->numberBetween(1,111),
                    'dataCriacao'=>$currentTimestamp,
                    'dataAtualizacao'=>$currentTimestamp,
                ],
                [
                    'id'=>$faker->numberBetween(1,111),
                    'nome'=>$faker->name,
                    'descricao'=>$faker->sentence,
                    'ordem'=>$faker->numberBetween(1,111),
                    'dataCriacao'=>$currentTimestamp,
                    'dataAtualizacao'=>$currentTimestamp,
                ]
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
