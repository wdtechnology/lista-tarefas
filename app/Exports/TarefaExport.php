<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Tarefa::all();
        return auth()->user()->tarefas()->get();
    }

    public function headings():array
    {
        return [
            'RG da Tarefa'
            ,'Nome da Tarefa'
            ,'Data Limite da Conclusão'
        ];
    }

    public function map($row):array
    {
        return [
            $row->id,
            $row->tarefa,
            Carbon::parse($row->data_limite_conclusao)->format('d/m/Y')
        ];
    }
}
