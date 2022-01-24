<?php

namespace Kalnoy\Nestedset\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class DuplicateCategory extends Model
{
    use NodeTrait;

    protected $table = 'categories';

    protected $fillable = [ 'name' ];

    public $timestamps = false;
}