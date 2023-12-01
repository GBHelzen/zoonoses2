<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaServico extends Model
{
    use HasFactory, SoftDeletes;

    const CASTRACAO = 'castracao';

    protected $guarded = [];
}
