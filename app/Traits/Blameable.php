<?php

namespace App\Traits;

use App\User;
use Illuminate\Support\Facades\Auth;

trait Blameable
{

    public static function bootBlameable()
    {
        if (Auth::check()) {
            static::creating(function ($model) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id();
            });

            static::updating(function ($model) {
                $model->updated_by = Auth::id();
            });

            static::deleted(function ($model) {
                // dd($model->deleted_by );
                $model->deleted_by = Auth::id();
            });
        }
    }
    //Usuário criador da model
    public  function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
