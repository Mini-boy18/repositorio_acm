<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conteudo extends Model
{
    protected $fillable = ['titulo', 'descricao', 'file_path', 'area_id'];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}