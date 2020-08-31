<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Table this model is associated with.
     * 
     * @var string
     */
    protected $table = 'task';

    /**
     * Set correct columns for created/updated
     */
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
