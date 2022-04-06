@extends('layouts.base')
@section('header')
@endsection
@section('content')
    <section class="quiz-form">
        <div class="container-lg">
            <div class="row">
                <div class="quiz col-lg-12 mx-auto">
                    <div id="quiz-form-container" class="step active">
                        <div class="quiz__main">
                            <div class="quiz__head">
                                <span class="back-btn"></span>
                                <div class="quiz__logo">
                                    <picture>
                                        <source srcset="/img/Logo.avif" type="image/avif">
                                        <source srcset="/img/Logo.webp" type="image/webp">
                                        <img src="/img/Logo.png" alt="" class="quiz__img"></picture>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 33.333%" role="progressbar"
                                         aria-valuenow="33.3333" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="quiz__metric d-flex ">
                                    <button class="quiz-btn" data-system="0">Imperial</button>
                                    <button class="quiz-btn active" data-system="1">Metric</button>
                                </div>
                            </div>

                            <div id="errors" class="errors alert alert-danger">
                                <ul class="">
                                </ul>
                            </div>

                            <div class="quiz__body">
                                <h2 class="quiz__title">
                                    Measurements
                                </h2>
                                <span class="quiz__description">
            Let's start with some basic details, which will help us accurately determine your metabolic age.
          </span>
                                <form method="post" class="quiz__form" action="{{route('quiz.store')}}">
                                    @csrf
                                    
                                    <input type="hidden" name="sex" value="">
                                    <input type="hidden" name="system_of_units" value="1">
                                    <div class="metric-fields">
                                    <div class="form-group">
                                        <input class="form-field" type="number" id="age" name="age" placeholder="Age">
                                        <div class="age">years</div>
                                    </div>
                                        <div class="form-group metric">
                                            <input class="form-field" type="number" id="metric-height" name="height" value="0"
                                                   placeholder="Height">
                                            <div class="height">cm</div>
                                        </div>

                                        
                                        <div class="form-group imperial" style="display:none;">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-6 ft-container">
                                                    <input class="form-field" type="number" id="feet" name="ft"
                                                           placeholder="Ft">
                                                    <div class="ft-label">Ft</div>
                                                </div>
                                                <div class="col-md-6 col-xs-6 mt-container">
                                                    <input class="form-field" type="number" id="inch" name="inc"
                                                           placeholder="In">
                                                    <div class="in-label">In</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-field" type="number" id="metric-weight" name="weight"
                                                   placeholder="Weight">
                                                   
                                            <div class="lb-label metric">kg</div>
                                            <div class="lb-label imperial">lb</div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-field" type="email" id="email" name="email"
                                                   placeholder="Email Address">
                                                   <div class="email-label">email</div>
                                        </div>
                                    </div>
                                    <button class="next-btn">Next</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @foreach($questionsList as $index => $question)
                        <div id='step-{{ $index + 1}} ' class="step">
                            <div class="quiz__main">
                                <div class="quiz__head">
                                    <span class="back-btn"></span>
                                    <div class="quiz__logo">
                                        <picture>
                                            <source srcset="/img/Logo.avif" type="image/avif">
                                            <source srcset="/img/Logo.webp" type="image/webp">
                                            <img src="/img/Logo.png" alt="" class="quiz__img"></picture>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 66.6666%" role="progressbar"
                                             aria-valuenow="66.666" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="quiz__body">
                                    <h2 class="quiz__title" style="margin-bottom: 24px; padding-top: 26px;">
                                        {{ $question->question_text}}
                                    </h2>

                                    <div class="quiz__radio">
                                        @foreach($question->answers as $answers)
                                            <div class="radio-button" data-question="{{ $question->id }}" data-answer="{{ $answers->id }}">
                                                {{ $answers->text_answer }}
                                                <div class="status"></div>
                                                <div class="icon">-</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@push('child-scripts')
<script type="text/javascript">
    $('input[name="sex"]').val(localStorage.getItem("sex"));
</script>
@endpush
