@extends('layouts.base')
@section('content')
    <section class="landing">
        <div class="container-xl">
            <div class="row  align-items-center  ">
                <div class="col-lg-6">
                    <h1 class="landing__heading">
                        Fill this FREE quiz and find out your biological age
                    </h1>
                    <span class="gender d-block mb-3">
                Select your gender:
              </span>
                    <div class="landing__buttons d-flex-md flex-column-md">
                        <button class="btn female-btn ">
                            Women click here
                        </button>
                        <button class="btn male-btn ">
                            Men click here
                        </button>
                    </div>

                </div>

                <div class="col-lg-6">
                    <picture><source srcset="/img/landing-img.avif" type="image/avif"><source srcset="/img/landing-img.webp" type="image/webp"><img src="/img/landing-img.jpg" alt="" class="landing__img"></picture>
                </div>
            </div>
        </div>
    </section>
@endsection
