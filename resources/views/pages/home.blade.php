@foreach($questions as $question)
    <li>{{ $question->title }} - {{ $question->category->name }} - Asked by {{ $question->user->name }}</li>
@endforeach