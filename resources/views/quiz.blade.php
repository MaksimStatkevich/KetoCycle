@foreach($questions as $question)
  <div>
   <p>
       {{ $question->question_text }}
   </p>
    <ul>
       @foreach($question->answers as $answer)
           <li>{{ $answer->text_answer }}</li>
        @endforeach
   </ul>
  </div>
@endforeach
