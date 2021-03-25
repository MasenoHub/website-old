<?php

namespace App\Http\Livewire\Admin;

use App\Models\Project;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProjectsTable extends LivewireDatatable
{
    public $model = Project::class;
    public $exportable = true;
    public $searchable = 'title';
    public $hideable = 'select';
    public $sort = 'id|asc';

    // public function columns()
    // {
    //     //
    // }
}
