<?php

namespace App\Exports;

use App\Models\Tarefa;
use App\Modesl\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Auth;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tarefas = auth()->user()->tarefas()->get();
        return $tarefas;
    }

    public function headings():array
    {
        //return ['ID da Tarefa','ID do Usuário','Tarefa','Data Limite de Conclusão','Data de Criação','Dara de Atualização'];
        return ['ID da Tarefa','Tarefa','Data Limite de Conclusão'];
        //OBS. pode incluir titulos diversos para o cabeçalho
    }

    public function map($linha):array
    {
        return [
            $linha->id,
            $linha->tarefa,
            date('d/m/Y',strtotime($linha->data_limite_conclusao))
            //OBS. pode incluir campos calculados ou que usam alguma lógica e que irão aparecer no arquivo gerado
        ];
    }
}