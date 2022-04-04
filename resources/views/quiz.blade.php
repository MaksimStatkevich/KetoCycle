@extends('layouts.base')
@section('header')
@endsection
@section('content')
    <section class="quiz-form">
        <div class="container-lg">
            <div class="row">
                <div class="quiz col-lg-12 mx-auto">

                    <div id="step-1" class="step">
                        <div class="quiz__main">
                            <div class="quiz__head">
                                <span class="back-btn"></span>
                                <div class="quiz__logo">
                                    <picture><source srcset="/img/Logo.avif" type="image/avif"><source srcset="/img/Logo.webp" type="image/webp"><img src="/img/Logo.png" alt="" class="quiz__img"></picture>
                                </div>
                                <div class="progress" >
                                    <div class="progress-bar" style="width: 33.333%" role="progressbar" aria-valuenow="33.3333" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div  i class="quiz__metric d-flex ">
                                    <button class="quiz-btn " >Imperial</button>
                                    <button class="quiz-btn " >Metric</button>

                                </div>

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
                                    <div class="form-group">
                                        <input class="form-field" type="number" id="age" name="age" placeholder="Age">
                                        <div class="age">years</div>
                                    </div>
                                    <div class="metric-fields">
                                        <div class="form-group">
                                            <input class="form-field" type="number" id="metric-height" name="height" placeholder="Height">
                                            <div class="height">cm</div>
                                        </div>
                                        <div class="form-group imperial" style="display:none;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <input class="form-field" type="number" id="feet" name="feet" placeholder="Ft">
                                                    <div class="height">Ft</div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <input class="form-field" type="number" id="inch" name="inch" placeholder="In">
                                                    <div class="height">In</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-field" type="number" id="metric-weight" name="weight" placeholder="Weight">
                                            <div class="weight">kg</div>
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <input class="form-field" type="number" id="imperial-weight" name="lb" placeholder="Weight">
                                            <div class="weight">lb</div>
                                        </div>
                                        <div class="form-group">
                                            <input  class="form-field" type="email" id="email" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <button class="next-btn">Next</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="step-2" class="step">
                        <div class="quiz__main">
                            <div class="quiz__head">
                                <span class="back-btn"></span>
                                <div class="quiz__logo">
                                    <picture><source srcset="/img/Logo.avif" type="image/avif"><source srcset="/img/Logo.webp" type="image/webp"><img src="/img/Logo.png" alt="" class="quiz__img"></picture>
                                </div>
                                <div class="progress" >
                                    <div class="progress-bar" style="width: 66.6666%" role="progressbar" aria-valuenow="66.666" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="quiz__body">
                                <h2 class="quiz__title" style="margin-bottom: 24px; padding-top: 26px;">
                                    How familiar are you with the Keto diet?
                                </h2>

                                <div class="quiz__radio">
                                    <input type="hidden" name="answer" value="0">
                                    <div class="radio-button">
                                        Expert
                                        <div class="status"></div>
                                        <div class="icon">-</div>
                                    </div>
                                    <div class="radio-button _active">
                                        I've heard a thing or two
                                        <div class="status"></div>
                                        <div class="icon">-</div>
                                    </div>
                                    <div class="radio-button">
                                        Beginner
                                        <div class="status"></div>
                                        <div class="icon">-</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="step-3" class="step">
                        <div class="quiz__main">
                            <div class="quiz__head">
                                <span class="back-btn"></span>
                                <div class="quiz__logo">
                                    <picture><source srcset="/img/Logo.avif" type="image/avif"><source srcset="/img/Logo.webp" type="image/webp"><img src="/img/Logo.png" alt="" class="quiz__img"></picture>
                                </div>
                                <div class="progress" >
                                    <div class="progress-bar" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="quiz__body">
                                <h2 class="quiz__title" style="margin-bottom: 24px; padding-top: 26px;">
                                    Our lifestyle also has a great impact on our metabolic age. Which of these statements best describes yours?
                                </h2>

                                <div class="quiz__radio">
                                    <input type="hidden" name="answer" value="0">
                                    <div class="radio-button">
                                        I mostly eat well and stay active
                                        <div class="status"></div>
                                        <div class="icon">-</div>
                                    </div>
                                    <div class="radio-button _active">
                                        I have some healthy habits, but I'm not perfect
                                        <div class="status"></div>
                                        <div class="icon">-</div>
                                    </div>
                                    <div class="radio-button">
                                        My diet and activity levels could use some help
                                        <div class="status"></div>
                                        <div class="icon">-</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
