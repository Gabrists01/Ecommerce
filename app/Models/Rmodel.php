<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rmodel extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    public $timestamps = true; // created_at e updated_at
    public $incrementing = true;
    protected $fillable = [];

    public function beforeSave()
    {
        return true;
    }

    public function save(array $options = [])
    {
        try {
            if (!$this->beforeSave()) {
                return false;
            }

            return parent::save($options); // Corrigido para $options
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
