<?php

namespace App\Http\Livewire\Admin;

use App\Models\Event;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class EventsTable extends LivewireDatatable
{
    public $model = Event::class;
    public $exportable = true;
    public $searchable = 'title';
    public $hideable = 'select';
    public $sort = 'id|asc';

    // public function columns()
    // {
    //     //
    // }
}
