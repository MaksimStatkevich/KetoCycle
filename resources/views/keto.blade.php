@extends('layouts.base')
@section('content')
    <section class="diet">
        <div class="container-xl">

            <h1 class="diet__heading text-center ">Your personalized Keto Diet is ready! </h1>

        </div>

        @if($user_inform)
            <div class="diet__stats">
                <div class="container-xl">

                    <div class="diet__wrapper d-flex justify-content-center align-items-center">


                        <div class="diet__item">
                    <span class="value"><svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd"
          d="M18.6665 5.33341C18.6665 6.80617 17.4726 8.00008 15.9998 8.00008C14.5271 8.00008 13.3332 6.80617 13.3332 5.33341C13.3332 3.86066 14.5271 2.66675 15.9998 2.66675C17.4726 2.66675 18.6665 3.86066 18.6665 5.33341ZM18.5732 11.0801L21.9332 19.5067C22.2932 20.3867 21.6399 21.3334 20.7065 21.3334H18.6665V28.0001C18.6665 28.7334 18.0665 29.3334 17.3332 29.3334H15.9999H14.6665C13.9332 29.3334 13.3332 28.7334 13.3332 28.0001V21.3334H11.2932C10.3599 21.3334 9.70655 20.3867 10.0399 19.5067L13.3999 11.0801C13.8265 10.0134 14.8532 9.33341 15.9865 9.33341C17.1332 9.34675 18.1465 10.0267 18.5732 11.0801Z"
          fill="#56468F"/>
    </svg>
    </span>
                        @if($user_inform->sex === 0)
                            Man
                        @else
                            Woman
                        @endif
                            
                        </div>


                        <div class="diet__item">
                            <span class="value">{{ $user_inform->age }}</span>Age(real)
                        </div>
                        <div class="diet__item">
                            <span class="value meta">35</span>Age(metabolic)
                        </div>

                        @if(isset($user_inform->system_of_units) && $user_inform->system_of_units === 0)

                            <div class="diet__item">
                                <span class="value">
                                    {{ $user_inform->height }}
                                </span>
                                Height(cm)
                            </div>

                            <div class="diet__item">
                                <span class="value">
                                    {{ ConvertImMeService::convertLbsToKg($user_inform->weight) }}
                                </span>
                                Weight(lb)
                            </div>
                        @else
                            <div class="diet__item">
                                <span class="value">
                                    {{ $user_inform->height }}
                                </span>
                                Height(cm)
                            </div>

                            <div class="diet__item">
                                <span class="value">
                                    {{ $user_inform->weight }}
                                </span>
                                Weight(kg)
                            </div>
                        @endif



                    </div>



                </div>

            </div>

            </div>
        @endif

        <div class="diet__choose">
            <div class="container-xl">
                <div class="row align-items-center justify-content-center">
                    <h2 class="diet__title text-center">
                        By choosing our app you get
                    </h2>
                    <div class="col-lg-6 d-flex flex-column align-items-center">
                        <li class="diet__inner">
                            <h3 class="diet__h3"> Personalized meal plan</h3>
                            <p class="diet__about">Breakfast, lunch, dinner, even snacks – it's all planned for you in the app. You don't have to spend time tracking calories or counting carbs because all meals are already customized for instant fat burning.</p>
                        </li>
                        <li class="diet__inner">
                            <h3 class="diet__h3"> Recipes and shopping list</h3>
                            <p class="diet__about">With easy, quick-to-prepare recipes, you'll never have to wonder what's for dinner again. Each dish comes with a list of inexpensive ingredients you can find at your local grocery store. Open your app on your phone or online, print the list, and stock up for the weeks ahead.</p>
                        </li>
                        <li class="diet__inner">
                            <h3 class="diet__h3"> Daily tracker</h3>
                            <p class="diet__about"> Whether you use the app on your phone or online, you'll track your steps, water consumption, calories and weight every day, giving you valuable insight into your progress. The app will help you make informed decisions and develop new habits.</p>
                        </li>

                    </div>
                    <div class="col-lg-6">

                        <picture><source srcset="/img/smart.avif" type="image/avif"><source srcset="/img/smart.webp" type="image/webp"><img src="/img/smart.png" alt="" class="diet__img"></picture>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


