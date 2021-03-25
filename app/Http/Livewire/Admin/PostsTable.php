<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PostsTable extends LivewireDatatable
{
    public $model = Post::class;
    public $exportable = true;
    public $searchable = 'title';
    public $hideable = 'select';
    public $exclude = ['summary', 'body'];
    public $sort = 'id|asc';

    // public function columns()
    // {
    //     //
    // }
}
