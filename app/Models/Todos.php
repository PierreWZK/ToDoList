<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Todos extends Model
{
    use HasFactory;
    protected $fillable = ['texte', 'termine'];

    public function saveTodo(Request $request){
        Todos::create($request->all());
        return redirect()->route('liste');
        }
    
    
}

