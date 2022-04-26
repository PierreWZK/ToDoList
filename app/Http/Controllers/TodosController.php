<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodosController extends Controller
{
    public function listeTermine()
    {
        return view("compteur", ["todos" => Todos::all()]);
    }
    public function liste()
    {
        return view("home", ["todos" => Todos::all()]);
    }
    public function saveTodo(Request $request)
    {
        $texte = $request->input('texte');
        if ($texte) {
            $todo = new Todos();
            $todo->texte = $texte;
            $todo->termine = 0;
            $todo->save();
        }
        return redirect()->route('liste');
    }

    public function markAsDone($id)
    {
        $todo = Todos::find($id);
        if ($todo) {
            $todo->termine = 1;
            $todo->save();
            Session::flash('messageTer', "Tâche terminée de la ToDoList");
        }
        return redirect()->route('liste');
    }

    public function deleteTodo($id)
    {
        $todo = Todos::find($id);
        if ($todo) {
            $todo->delete();
            Session::flash('messageSup', "Tâche supprimée de la ToDoList");
        }
        return redirect()->route('liste');
    }

    public function makeFav($id)
    {
        $todo = Todos::find($id);
        if ($todo) {
            if ($todo->importance == 1){
                $todo->importance = 0;
                Session::flash('messageFav', "La tâche selectionné a été remis en 'non importante'");
            }else{
                $todo->importance = 1;
                Session::flash('messageFav', "La tâche selectionné a été mis a jour en 'importante'");
            }
            $todo->save();
        }
        return redirect()->route('liste');
    }
}
