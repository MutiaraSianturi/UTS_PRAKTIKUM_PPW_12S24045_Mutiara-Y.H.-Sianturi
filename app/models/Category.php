<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
 
    public function books()
    {
        return $this->hasMany(Equipment::class);
        return $this->hasMany(Equipment belongsTo Category::class);
        return $this->hasMany(Equipment hasMany LoanRequest::class);

    }
}
