<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table="products";


    protected $fillable = [
        'id',
        'nom',
        'marque',
        'prix',
        'description',
        'image',
        'quantite',
        'carburant',
        'categorie_id',

    ];

    public static $rules = [
        'nom'       => 'required|string',
        'marque'    => 'required|string',
        'description'       => 'required',
        'prix'    => 'required|integer',
        'image'       => 'required',
        'quantite'    => 'required|integer',

    ];

    public function categorie(){
        return $this->belongTo(Categorie::class);
    }


    public static function search($motscles){
        $results = Product::where('nom','like','%'.$motscles.'%')
        ->get();
    return  $results;
    }
}
