<div>
    Cher {{ $user->name }},
    <br>
    <br>
    La liste de vos formations a été mise à jour. Voici la nouvelle liste :
    <ul>
        @foreach ($trainingsArray as $training)
            <li>{{ $training->category->name }} : {{ $training->name }}</li>
        @endforeach
    </ul>
    <br>
    <br>
    L'équipe Auto-école Université
</div>