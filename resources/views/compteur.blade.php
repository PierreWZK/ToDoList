@extends("template")
@section('title', 'Ma Todo List')
@section('content')


<div class="container">
    <div class="card">
        <div class="card-body">
            
            <!-- Liste LECTURE SEULE -->
                
            @php $compteur = 0 @endphp
            <h2>Liste de taches Importantes : </h2>
            @forelse ($todos as $todo)
                    @if ($todo->importance == 1) @php $compteur = $compteur + 1 @endphp 
                    @endif
                @if ($todo->importance == 1)
                    @if($todo->termine==1)
                        <li class="list-group-item termine">
                            <a href="/action/{{ $todo->id }}/importance"><i class="fa fa-star" aria-hidden="true"></i></a>
                            <span>{{ $todo->texte }}</span>
                    @else
                        <li class="list-group-item notermine">
                            <a href="/action/{{ $todo->id }}/importance"><i class="fa fa-star" aria-hidden="true"></i></a>
                            <span>{{ $todo->texte }}</span>
                    @endif
                    </li>
                @endif
                @empty
                    <li class="list-group-item text-center">C'est vide !</li>
            @endforelse

            <!-- COMPTEUR NON TERMINE -->
            <ul class="list-group">
                <br>
                <h3 class="text-warning">Il y a encore {{ $compteur }} tâches non terminé. </h3>
            
            </ul>
            
        </div>
    </div>
</div>
@endsection
