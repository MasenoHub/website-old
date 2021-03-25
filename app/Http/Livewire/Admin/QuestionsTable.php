<?php

namespace App\Http\Livewire\Admin;

use App\Models\Question;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class QuestionsTable extends LivewireDatatable
{
    public $model = Question::class;
    public $exportable = true;
    public $searchable = 'title';
    public $hideable = 'select';
    public $exclude = ['body'];
    public $sort = 'id|asc';

    // public function columns()
    // {
    //     //
    // }
}
