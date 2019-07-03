<div>
    <p>
        Cher {{ Auth::user($transaction->user_id)->name }},
        <br>
        <br>
        @if ($transaction->status === 'completed')
            La transaction a été effectuée avec succès. Veuillez cliquer sur le lien suivant pour retourner sur le site de votre auto-école :
            <br>
            <br>
            <a href="{{ route('trainings.mine.show', $transaction->training_id) }}">Retourner sur le site</a>
        @else
            La transaction n'a pas abouti. Veuillez cliquer sur le lien suivant pour réessayer :
            <br>
            <br>
            <a href="{{ route('trainings.show', $transaction->training_id) }}">Retourner sur le site</a>
        @endif
        <br>
        <br>
        L'équipe Auto-école Université
    </p>
</div>