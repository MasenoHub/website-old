<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    public $exportable = true;
    public $searchable = 'title';
    public $hideable = 'select';
    public $exclude = ['current_team_id'];
    public $sort = 'id|asc';

    // public function columns()
    // {
    //     //
    // }
}
