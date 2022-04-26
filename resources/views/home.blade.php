@extends("template")
@section('title', 'Ma Todo List')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- Action -->
                <form action="/action/add" method="post" class="add">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="oi oi-pencil"></span></span>
                        <input id="texte" name="texte" type="text" class="form-control" placeholder="Prendre une note..."
                            aria-label="My new idea" aria- describedby="basic-addon1">
                    </div>
                </form action="{{ route('save') }}" method="post" class="add">
                <!-- Liste -->
                <ul class="list-group">

                    @forelse ($todos as $todo)
                        @if ($todo->termine == 1)
                            <li class="list-group-item termine">
                            @if ($todo->importance == 1) 
                                <a href="/action/{{ $todo->id }}/importance"><i class="fa fa-star" aria-hidden="true"></i></a>
                                <span>{{ $todo->texte }}</span>
                                <!-- Action à ajouter pour Terminer et supprimer -->
                                <a href ="/" class="btn btn-dark disabledLink linker"><i
                                        class="fa fa-bandcamp"></i></a>
                                <a href="/action/{{ $todo->id }}/delete" class="btn btn-dark disabledLink linker"><i
                                        class="fa fa-times"></i></a>
                            @else
                                <a href="/action/{{ $todo->id }}/importance"><i class="fa fa-star text-secondary" aria-hidden="true"></i></a>
                                <span>{{ $todo->texte }}</span>
                                <!-- Action à ajouter pour Terminer et supprimer -->
                                <a href ="/" class="btn btn-dark disabledLink linker"><i
                                        class="fa fa-bandcamp"></i></a>
                                <a href="/action/{{ $todo->id }}/delete" class="btn btn-danger linker"><i
                                        class="fa fa-times"></i></a>
                            @endif
                        @else    
                            <li class="list-group-item notermine">
                            @if ($todo->importance == 1) 
                                <a href="/action/{{ $todo->id }}/importance"><i class="fa fa-star" aria-hidden="true"></i></a>
                                <span>{{ $todo->texte }}</span>
                                <!-- Action à ajouter pour Terminer et supprimer -->
                                <a href ="/" class="btn btn-dark disabledLink linker"><i
                                        class="fa fa-bandcamp"></i></a>
                                <a href="/action/{{ $todo->id }}/delete" class="btn btn-dark disabledLink linker"><i
                                        class="fa fa-times"></i></a>
                            @else
                                <a href="/action/{{ $todo->id }}/importance"><i class="fa fa-star text-secondary" aria-hidden="true"></i></a>
                                <span>{{ $todo->texte }}</span>
                                <!-- Action à ajouter pour Terminer et supprimer -->
                                <a href="/action/{{ $todo->id }}/done" class="btn btn-success linker"><i
                                        class="fa fa-bandcamp"></i></a>
                                <a href="/action/{{ $todo->id }}/delete" class="btn btn-danger linker"><i
                                        class="fa fa-times"></i></a>
                            @endif
                        @endif
                        </li>
                    @empty
                        <li class="list-group-item text-center">C'est vide !</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
