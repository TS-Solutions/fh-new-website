@extends('frontend_new.master')
    
@push('plugin-styles')
    <style type="text/css">
        .map-responsive{
            overflow:hidden;
            padding-bottom:35%;
            position:relative;
            height:0;
        }
        .map-responsive iframe{
            left:0;
            top:0;
            height:100%;
            width:98%;
            position:absolute;
        }
        .ui-tooltip{
          display:none !important;
        }

        .ui-helper-hidden-accessible {
          display:none !important;
        }
    </style>
@endpush

@section('content')
  <?php 
    $selected_lang = 'en';
    if(Session::has('locale')){
      if(Session::get('locale') == 'ar'){
        $selected_lang = 'ar';
      }
      else{
        $selected_lang = 'en';
      }
    }
  ?>

  <form action="{{ route('subscription_post') }}" method="post">
    @csrf()
  
    
    <div id="Div1" class="container section">
      <div class="row justify-content-center">
        <div class="col-md-7 text-center heading-section stranger mb-4">
            <h1>DON'T BE<br> A STRANGER</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10 col-lg-3 d-flex mb-sm-4 justify-content-center ftco-animate">
          <div class="staff mb-4 pb-4">
            <div class="info text-center">
                <div class="form-group input-material mb-3 pb-3">
                  <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Tell us your name" required>
                </div>
                <input id="Button1" type="button" class="btn btn-next btn-lg" value="Continue" onclick="switchVisible();" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <section>
        <div id="Div2" class="container section">
            <div class="row justify-content-center">
              <div class="col-md-7 text-center heading-section stranger">
                  <h1>HELLO <span id="customer_name_span"></span>,</h1>
              </div>
              <div class="col-md-7 text-left heading-section stranger mb-4">
                  <h4>Little Bit More Information To Serve You Better</h4>
              </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-lg-3 d-flex mb-sm-4 justify-content-center ftco-animate">
                        <div class="body-content">
                            <div class="body-main staff text-left" role="group"
                                aria-label="Basic radio toggle button group">
                                <h2>I'M A
                                    <input type="radio" class="btn-check gender_radio" name="gender_radio"
                                        id="male_gender_radio" autocomplete="off" value="Male" checked>
                                    <label class="btn btn-text m-2" for="male_gender_radio">HANDSOME
                                        MAN</label>
                                    /
                                    <input type="radio" class="btn-check gender_radio" name="gender_radio"
                                        id="female_gender_radio" autocomplete="off" value="Female">
                                    <label class="btn btn-text m-2" for="female_gender_radio">PRETTY
                                        LADY</label>
                                    <span id="dob_area"> ,
                                        BORN IN <fieldset class="field-inline-block">
                                            <div class="field-inline-block">
                                                <input name="dob_day" id="dob_day" placeholder="DD"
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    type="number" pattern="[0-9]*" maxlength="2" size="2"
                                                    min="1" max="31" class="date-field" />
                                            </div>
                                            <div class="field-inline-block">
                                                <input name="dob_month" id="dob_month" placeholder="MM"
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    type="number" pattern="[0-9]*" maxlength="2" size="2"
                                                    class="date-field" />
                                            </div>
                                            <div class="field-inline-block">
                                                <input name="dob_year" id="dob_year" placeholder="YYYY"
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    type="number" pattern="[0-9]*" maxlength="4" size="4"
                                                    class="date-field-year" />
                                            </div>
                                        </fieldset>
                                    </span>
                                </h2>

                                <div class="row" id="weight_height_area">
                                    <div class="col-lg-12 text-left heading-section stranger">
                                        <h2 class="field-inline-block">MY WEIGHT IS
                                            <fieldset class="field-inline-block">
                                                <div class="field-inline-block">
                                                    <input name="customer_weight" id="customer_weight"
                                                        placeholder="00"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type="number" pattern="[0-9]*" maxlength="2"
                                                        size="2" class="date-field" />
                                                </div> KG, AND HEIGHT IS
                                                <div class="field-inline-block">
                                                    <input name="customer_height" id="customer_height"
                                                        placeholder="000"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type="number" pattern="[0-9]*" maxlength="3"
                                                        size="3" class="weight-field" />
                                                </div> CM
                                            </fieldset>
                                        </h2>
                                    </div>
                                </div>

                                <div class="row" id="goal_area">
                                    <div class="col-lg-12 text-center heading-section stranger">
                                        <h2>MY FITNESS GOAL IS
                                            <input type="radio" class="btn-check customer_goal"
                                                name="customer_goal" id="lean_bulk" autocomplete="off"
                                                value="1" checked>
                                            <label class="btn btn-text m-2" for="lean_bulk">LEAN
                                                BULK</label>,
                                            <input type="radio" class="btn-check customer_goal"
                                                name="customer_goal" id="dirty_bulk" autocomplete="off"
                                                value="2">
                                            <label class="btn btn-text m-2" for="dirty_bulk">DIRTY
                                                BULK</label>,
                                            <input type="radio" class="btn-check customer_goal"
                                                name="customer_goal" id="maintain_weight" autocomplete="off"
                                                value="3">
                                            <label class="btn btn-text m-2"
                                                for="maintain_weight">MAINTAIN</label>,
                                            <input type="radio" class="btn-check customer_goal"
                                                name="customer_goal" id="cut_weight" autocomplete="off"
                                                value="4">
                                            <label class="btn btn-text m-2" for="cut_weight">CUT</label>
                                        </h2>
                                    </div>
                                </div>

                                <div class="row" id="exercise_area">
                                    <div class="col-lg-12 text-center heading-section stranger">
                                        <h2>MY ACTIVITY LEVEL
                                            <input type="radio" class="btn-check exercise_frequency" value="1" name="exercise_frequency" id="sendentary" autocomplete="off" checked>
                                            <label class="btn btn-text m-2" for="sendentary">SENDENTARY</label>,
                                            <input type="radio" class="btn-check exercise_frequency" value="2" name="exercise_frequency" id="lightly_active" autocomplete="off">
                                            <label class="btn btn-text m-2" for="lightly_active">LIGHTLY ACTIVE</label>,
                                            <input type="radio" class="btn-check exercise_frequency" value="3" name="exercise_frequency" id="moderately_active" autocomplete="off">
                                            <label class="btn btn-text m-2" for="moderately_active">MODERATELY ACTIVE</label>,
                                            <input type="radio" class="btn-check exercise_frequency" value="4" name="exercise_frequency" id="very_active" autocomplete="off">
                                            <label class="btn btn-text m-2" for="very_active">VERY ACTIVE</label>,
                                            <input type="radio" class="btn-check exercise_frequency" value="5" name="exercise_frequency" id="extremely_active" autocomplete="off">
                                            <label class="btn btn-text m-2" for="extremely_active">EXTREMELY ACTIVE</label>
                                        </h2>
                                    </div>
                                </div>
                                <div class="row justify-content-center btn-or pt-4 pb-4" id="continue_area">
                                    <input id="Button1" type="button" class="btn btn-next btn-lg"
                                        value="Continue" onclick="switchVisible1();" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe" class="">
        <div id="mealtype" class="container section">
            <div class="row justify-content-center">
                <div class="col-md-4 heading-section meal">
                    <div class="row justify-content-start">
                        <ol>
                            <div>
                                <li><a href="#">
                                        <h3>MEAL TYPE</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>SELECT MEALS</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>STARTING DATE</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>DELIVERY OPTIONS</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>PAYMENT</h3>
                                    </a></li>
                            </div>
                        </ol>
                    </div>
                    <div class="row green-box">
                        <div class="text-box">
                            <!-- <h5 id="needtoburn">Your Need To Burn:</h5> -->
                            <h5>Your Daily Need:</h5>
                            <p>Calories:<span id="need_calories"> </span></p>
                            <p>Protein:<span id="need_protein"> </span></p>
                            <p>Carb:<span id="need_carb"> </span></p>
                            <p class="m-0">Fat:<span id="need_fat"> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 text-center meal2 heading-section stranger mb-4">
                    <div class="btn-toolbar row justify-content-center h-70" role="group"
                        aria-label="Basic radio toggle button group">
                        <h4 class="pb-4">Choose Your Meal Type</h4>

                        <div class="col-md-4 text-center meal-type meal_selection" data-mealtype="Keto">
                            <input class="div-box" type="radio" name="meal_selection" id="divradio1" value="Keto" 
                                checked>
                            <label class="label-box" id="bowla" for="divradio1" class="meal_selection" data-mealtype="Keto">
                                <div class="bowl-img">
                                    <img src="{{ asset('new_frontend_assets/img/bowl-a.png') }}" alt="">
                                    <h4 class="heading pt-4">Keto</h4>
                                </div>
                            </label>
                            <div class="box">
                                <a href="#">View Menu</a>
                            </div>
                        </div>

                        <div class="col-md-4 text-center meal-type meal_selection" data-mealtype="Non-Veg">
                            <input class="div-box" type="radio" name="meal_selection" id="divradio2" value="Non-Veg" >
                            <label class="label-box" id="bowla" for="divradio2" class="meal_selection" data-mealtype="Non-Veg">
                                <div class="bowl-img">
                                    <img src="{{ asset('new_frontend_assets/img/bowl-b.png') }}" alt="">
                                    <h4 class="heading pt-4">Non-Veg</h4>
                                </div>
                            </label>
                            <div class="box">
                                <a href="#">View Menu</a>
                            </div>
                        </div>

                        <div class="col-md-4 text-center meal-type meal_selection" data-mealtype="Veg">
                            <input class="div-box" type="radio" name="meal_selection" id="divradio3" value="Veg" >
                            <label class="label-box" id="bowla" for="divradio3" class="meal_selection" data-mealtype="Veg">
                                <div class="bowl-img">
                                    <img src="{{ asset('new_frontend_assets/img/bowl-c.png') }}" alt="">
                                    <h4 class="heading pt-4">Veg</h4>
                                </div>
                            </label>
                            <div class="box">
                                <a type="button" href="#">View Menu</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe" class="">
        <div id="selectmeal1" class="container section">
            <div class="row justify-content-center">
                <div class="col-md-4 heading-section meal">
                    <div class="row justify-content-start">
                        <ol>
                            <div class="completed">
                                <li><a href="#" onclick="switchVisible2();">
                                        <h3>MEAL TYPE</h3>
                                    </a></li>
                            </div>
                            <div class="">
                                <li><a href="#">
                                        <h3>SELECT MEALS</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>STARTING DATE</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>DELIVERY OPTIONS</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>PAYMENT</h3>
                                    </a></li>
                            </div>
                        </ol>
                    </div>
                    <div class="row green-box">
                        <div class="text-box">
                            <h5>Your Daily Intake:</h5>
                            <p>Calories:<span id="used_calories"> </span> / <span id="need_calories_intake"> </span></p>
                            <p>Protein:<span id="used_protein"> </span> / <span id="need_protein_intake"> </span></p>
                            <p>Carb:<span id="used_carb"> </span> / <span id="need_carb_intake"> </span></p>
                            <p class="m-0">Fat:<span  id="used_fat"> </span> / <span id="need_fat_intake"> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 text-center heading-section selection stranger mb-4">
                    <div class="row justify-content-center">
                        <h4>Select Your Meals</h4>
                        <div class="row justify-content-center meal-selection">
                            <div class="col-md-4 text-center meal-type">
                                <img src="{{ asset('new_frontend_assets/img/breakfastbox.png') }}" alt="">
                                <h4 class="heading">Breakfast</h4>
                                <input type="text" name="breakfast_count" class="form-control input-type input-number breakfast_count" value="0" min="0" max="10">
                                <p>Meal</p>
                                <div tabindex="1" id="bowlb" class="bowl-box">
                                </div>

                                <div class="toggle justify-content-start" role="group"
                                    aria-label="Basic radio toggle button group">
                                    <div class="wrapper">

                                        <input type="button" class="btn-check btn-working" name="dbtnradio1"
                                            id="dbtnradio1" autocomplete="off" data-type="minus"
                                            data-field="breakfast_count" checked>
                                        <label class="plusminus minus" for="dbtnradio1">-</label>
                                        <hr>
                                        <input type="button" class="btn-check btn-working" name="dbtnradio1"
                                            id="dbtnradio2" autocomplete="off" data-type="plus" data-field="breakfast_count">
                                        <label class="plusminus plus" for="dbtnradio2">+</label>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 text-center meal-type">
                                <div>
                                    <div class="select-img">
                                        <img class="double-box" src="{{ asset('new_frontend_assets/img/lunchbox.png') }}" alt="">
                                    </div>
                                    <img src="{{ asset('new_frontend_assets/img/lunchbox.png') }}" alt="">
                                </div>
                                <h4 class="heading">Lunch</h4>
                                <input type="text" name="lunch_count" class="form-control input-type input-number lunch_count" value="0" min="0" max="10">
                                <p>Meals</p>
                                <div tabindex="1" id="bowlb" class="bowl-box">
                                </div>

                                <div class="toggle justify-content-start" role="group"
                                    aria-label="Basic radio toggle button group">
                                    <div class="wrapper">

                                        <input type="button" class="btn-check btn-working" name="dbtnradio2"
                                            id="dbtnradio3" autocomplete="off" data-type="minus"
                                            data-field="lunch_count" checked>
                                        <label class="plusminus minus" for="dbtnradio3">-</label>
                                        <hr>
                                        <input type="button" class="btn-check btn-working" name="dbtnradio2"
                                            id="dbtnradio4" autocomplete="off" data-type="plus" data-field="lunch_count">
                                        <label class="plusminus plus" for="dbtnradio4">+</label>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center meal-type">
                              <img src="{{ asset('new_frontend_assets/img/dinnerbox.png') }}" alt="">
                              <h4 class="heading">Dinner</h4>
                              <input type="text" name="dinner_count" class="form-control input-type input-number dinner_count" value="0" min="0" max="10">
                              <p>Meals</p>
                              <div tabindex="1" id="bowlb" class="bowl-box">
                              </div>

                              <div class="toggle justify-content-start" role="group" aria-label="Basic radio toggle button group">
                                <div class="wrapper">

                                  <input type="button" class="btn-check btn-working" name="dbtnradio3"
                                      id="dbtnradio5" autocomplete="off" data-type="minus"
                                      data-field="dinner_count" checked>
                                  <label class="plusminus minus" for="dbtnradio5">-</label>
                                  <hr>
                                  <input type="button" class="btn-check btn-working" name="dbtnradio3"
                                      id="dbtnradio6" autocomplete="off" data-type="plus"
                                      data-field="dinner_count">
                                  <label class="plusminus plus" for="dbtnradio6">+</label>

                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center menu">
                        <div class="d-flex align-items-center bottom-menu justify-content-between">
                            <div class="toggle2">
                                <div class="wrapper2">
                                    <input type="button" class="btn-check btn-working" name="dbtnradiob3"
                                        id="dbtnradio12" autocomplete="off" data-type="minus"
                                        data-field="salad_count" checked>
                                    <label class="plusminus minus" for="dbtnradio12">-</label>
                                    <hr>
                                    <input type="button" class="btn-check btn-working" name="dbtnradiob3"
                                        id="dbtnradio13" autocomplete="off" data-type="plus" data-field="salad_count">
                                    <label class="plusminus plus" for="dbtnradio13">+</label>
                                </div>
                            </div>
                            <div class="img1-box">
                                <div class="img-pos">
                                    <img class="img1" src="{{ asset('new_frontend_assets/img/salad.png') }}" alt="">
                                </div>
                                <div class="circle-pos">
                                    <div class="circle"></div>
                                </div>
                                <div class="text-pos">
                                    <input type="text" name="salad_count" class="form-control text input-number salad_count" value="0" min="0" max="10">
                                </div>
                            </div>
                            <div class="img2-box">
                                <div class="img-pos">
                                    <img class="img2" src="{{ asset('new_frontend_assets/img/snack.png') }}" alt="">
                                </div>
                                <div class="circle-pos2">
                                    <div class="circle"></div>
                                </div>
                                <div class="text-pos2">
                                    <input type="text" name="snack_count" class="form-control text input-number snack_count" value="0" min="0" max="10">
                                </div>
                            </div>
                            <div class="toggle2">
                                <div class="wrapper2">
                                    <input type="button" class="btn-check btn-working" name="cbtnradioa3"
                                        id="cbtnradio15" autocomplete="off" data-type="minus"
                                        data-field="snack_count" checked>
                                    <label class="plusminus minus" for="cbtnradio15">-</label>
                                    <hr>
                                    <input type="button" class="btn-check btn-working" name="cbtnradioa3"
                                        id="cbtnradio16" autocomplete="off" data-type="plus"
                                        data-field="snack_count">
                                    <label class="plusminus plus" for="cbtnradio16">+</label>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-text">
                            <span>Including</span>
                            <p>Salad + Snack</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe" class="">
        <div id="selectmeal2" class="container section">
            <div class="row justify-content-center">
                <div class="col-md-4 heading-section meal">
                    <div class="row justify-content-start">
                        <ol>
                            <div class="completed">
                                <li><a href="#" onclick="switchVisible2();">
                                        <h3>MEAL TYPE</h3>
                                    </a></li>
                            </div>
                            <div class="">
                                <li><a href="#">
                                        <h3>SELECT MEALS</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>STARTING DATE</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>DELIVERY OPTIONS</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>PAYMENT</h3>
                                    </a></li>
                            </div>
                        </ol>
                    </div>
                </div>
                <div class="col-md-8 text-center heading-section stranger mb-4">
                    <div class="row justify-content-center">
                        <h4 class="mb-4">We Want To Serve You Better</h4>
                        <p class="text-green-p pb-4">Remove the food you dislike?</p>
                        <div class="row justify-content-center">


                            <div tabindex="1" id="mealbox2" class="col-md-4 text-center meal-box">
                                <input type="checkbox" name="unliked_items[]" value="Egg" id="r1" />
                                <label class="whatever" for="r1" onclick="greenegg();">
                                    <div class="img-box">
                                        <img id="green-egg" src="{{ asset('new_frontend_assets/icons/green egg.png') }}" alt="">
                                        <img id="hover-egg" src="{{ asset('new_frontend_assets/icons/eggs-hover.png') }}" alt="">
                                    </div>
                                    <div class="box-text">
                                        <p>Eggs</p>
                                    </div>
                                </label>
                            </div>

                            <div tabindex="1" id="mealbox2" class="col-md-4 text-center meal-box">
                                <input type="checkbox" name="unliked_items[]" value="Salmon" id="r2" />
                                <label class="whatever" for="r2" onclick="greenfish();">
                                    <div class="img-box">
                                        <img id="green-fish" src="{{ asset('new_frontend_assets/icons/green fish.png') }}" alt="">
                                        <img id="hover-fish" src="{{ asset('new_frontend_assets/icons/fish-hover.png') }}" alt="">
                                    </div>
                                    <div class="box-text">
                                        <p>Salmon</p>
                                    </div>
                                </label>
                            </div>

                            <div tabindex="1" id="mealbox2" class="col-md-4 text-center meal-box">
                                <input type="checkbox" name="unliked_items[]" value="Shrimp" id="r3" />
                                <label class="whatever" for="r3" onclick="greenshrimp();">
                                    <div class="img-box">
                                        <img id="green-shrimp" src="{{ asset('new_frontend_assets/icons/green shrimp.png') }}" alt="">
                                        <img id="hover-shrimp" src="{{ asset('new_frontend_assets/icons/shrimp-hover.png') }}" alt="">
                                    </div>
                                    <div class="box-text">
                                        <p>Shrimps</p>
                                    </div>
                                </label>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div tabindex="1" id="mealbox2" class="col-md-4 text-center meal-box">
                                <input type="checkbox" name="unliked_items[]" value="Red Meat" id="r4" />
                                <label class="whatever" for="r4" onclick="greenmeat();">
                                    <div class="img-box">
                                        <img id="green-meat" src="{{ asset('new_frontend_assets/icons/green meet.png') }}" alt="">
                                        <img id="hover-meat" src="{{ asset('new_frontend_assets/icons/red meat-hover.png') }}" alt="">
                                    </div>
                                    <div class="box-text">
                                        <p>Red Meat</p>
                                    </div>
                                </label>
                            </div>

                            <div tabindex="1" id="mealbox2" class="col-md-4 text-center meal-box">
                                <input type="checkbox" name="unliked_items[]" value="Chicken" id="r5" />
                                <label class="whatever" for="r5" onclick="greenchicken();">
                                    <div class="img-box">
                                        <img id="green-chicken" src="{{ asset('new_frontend_assets/icons/green chicken.png') }}" alt="">
                                        <img id="hover-chicken" src="{{ asset('new_frontend_assets/icons/chicken-hover.png') }}" alt="">
                                    </div>
                                    <div class="box-text">
                                        <p>Chicken</p>
                                    </div>
                                </label>
                            </div>

                            <div tabindex="1" id="mealbox2" class="col-md-4 text-center meal-box">
                                <input type="checkbox" name="unliked_items[]" value="Nuts" id="r6" />
                                <label class="whatever" for="r6" onclick="greennut();">
                                    <div class="img-box">
                                        <img id="green-nut" src="{{ asset('new_frontend_assets/icons/green nut.png') }}" alt="">
                                        <img id="hover-nut" src="{{ asset('new_frontend_assets/icons/nuts-hover.png') }}" alt="">
                                    </div>
                                    <div class="box-text">
                                        <p>Nuts</p>
                                    </div>
                                </label>
                            </div>

                        </div>
                        <div class="note-form">
                            <p class="col-4 text-green-p pb-2">Add additional notes</p>
                            <div class="form-group">
                                <input type="text" class="form-control" id="input-text" name="additional_notes" autocomplete="off" placeholder="Note if any allergies">
                            </div>
                            <p class="text-subtitle">We will do our level best to fulfill these requirements! However, it is not compulsory.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe" class="">
        <div id="startdate" class="container section">
            <div class="row justify-content-center">

                <div class="col-md-4 heading-section meal">
                    <div class="row justify-content-start">
                        <ol>
                            <div class="completed" onclick="switchVisible2();">
                                <li><a href="#">
                                        <h3>MEAL TYPE</h3>
                                    </a></li>
                            </div>
                            <div class="completed" onclick="switchVisible3();">
                                <li><a href="#">
                                        <h3>SELECT MEALS</h3>
                                    </a></li>
                            </div>
                            <div class="">
                                <li><a href="#">
                                        <h3>STARTING DATE</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>DELIVERY OPTIONS</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>PAYMENT</h3>
                                    </a></li>
                            </div>
                        </ol>
                    </div>
                </div>

                <div class="col-md-8 text-center heading-section start-date stranger mb-4">
                    <div class="row justify-content-center">
                        <h4 class="mb-4">When Do You Wish To Start?</h4>

                        <div class="row justify-content-center">
                            <p class="text-green-p justify-content-start ml-2 text-left">Starting Date
                            </p>
                            <div class="btn-toolbar justify-content-start" role="radio-group" aria-label="">

                                <input type="radio" class="btn-check tommorrow_date" name="start_date" id="startradio1"
                                    autocomplete="off" checked value="">
                                <label class="btn btn-date m-2" for="startradio1">Tommorrow</label>

                                <input type="radio" class="btn-check tommorrow_plus1_date" name="start_date" id="startradio2"
                                    autocomplete="off">
                                <label class="btn btn-date m-2 tommorrow_plus1_date_label" for="startradio2">May 2nd</label>

                                <input type="radio" class="btn-check tommorrow_plus2_date" name="start_date" id="startradio3"
                                    autocomplete="off">
                                <label class="btn btn-date m-2 tommorrow_plus2_date_label" for="startradio3">May 3rd</label>

                                <input type="text" id="datepicker1" value="" />
                                <input type="radio" id="startradio4" class="btn-check picked_date" name="start_date"
                                    value="">
                                <label class="btn btn-date m-2 choose_date_label" for="startradio4">Choose Date</label>

                            </div>
                        </div>

                        <div class="row justify-content-center pt-4">
                            <p class="text-green-p justify-content-start ml-2 text-left">Duration of the
                                Course
                            </p>

                            <div class="btn-toolbar justify-content-start" role="group"
                                aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="no_of_weeks" id="abtnradio1" value="1" autocomplete="off">
                                <label class="btn btn-date m-2" for="abtnradio1">1 Week</label>

                                <input type="radio" class="btn-check" name="no_of_weeks" id="abtnradio2" value="2" autocomplete="off">
                                <label class="btn btn-date m-2" for="abtnradio2">2 Weeks</label>

                                <input type="radio" class="btn-check" name="no_of_weeks" id="abtnradio3" value="3" autocomplete="off" checked>
                                <label class="btn btn-date m-2" for="abtnradio3">4 Week</label>
                            </div>
                        </div>

                        <div class="row justify-content-center pt-4 days">
                            <p class="text-green-p justify-content-start ml-2 text-left">Choose your
                                days
                                &nbsp;
                                <span> You can skip up to 1 day only!</span>
                            </p>

                            <div class="btn-group days-buttons justify-content-start" role="group"
                                aria-label="Basic checkbox toggle button group">

                                <input type="radio" name="no_of_days[]" class="btn-check" id="checkbox-group-1-A" autocomplete="off"
                                    checked value="Saturday">
                                <label class="btn btn-date-days m-2" for="checkbox-group-1-A">Sa</label>

                                <input type="radio" name="no_of_days[]" class="btn-check" id="checkbox-group-1-B" autocomplete="off"
                                    checked value="Sunday">
                                <label class="btn btn-date-days m-2" for="checkbox-group-1-B">Su</label>

                                <input type="radio" name="no_of_days[]" class="btn-check" id="checkbox-group-1-C" autocomplete="off"
                                    checked value="Monday">
                                <label class="btn btn-date-days m-2" for="checkbox-group-1-C">Mo</label>

                                <input type="radio" name="no_of_days[]" class="btn-check" id="checkbox-group-1-D" autocomplete="off"
                                    checked value="Tuesday">
                                <label class="btn btn-date-days m-2" for="checkbox-group-1-D">Tu</label>

                                <input type="radio" name="no_of_days[]" class="btn-check" id="checkbox-group-1-E" autocomplete="off"
                                    checked value="Wednesday">
                                <label class="btn btn-date-days m-2" for="checkbox-group-1-E">We</label>

                                <input type="radio" name="no_of_days[]" class="btn-check" id="checkbox-group-1-F" autocomplete="off"
                                    checked value="Thursday">
                                <label class="btn btn-date-days m-2" for="checkbox-group-1-F">Th</label>

                                <input type="radio" name="no_of_days[]" class="btn-check" id="btncheck7" autocomplete="off"
                                    disabled  value="Friday">
                                <label class="btn disabled btn-date-days m-2" for="btncheck7">Fr</label>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <section id="subscribe" class="deliver">
        <div id="deliveryopt" class="container section">
            <div class="row justify-content-center">
                <div class="col-md-4 heading-section meal">
                    <div class="row justify-content-start">
                        <ol>
                            <div class="completed">
                                <li><a href="#" onclick="switchVisible2();">
                                        <h3>MEAL TYPE</h3>
                                    </a></li>
                            </div>
                            <div class="completed">
                                <li><a href="#" onclick="switchVisible3();">
                                        <h3>SELECT MEALS</h3>
                                    </a></li>
                            </div>
                            <div class="completed">
                                <li><a href="#" onclick="switchVisible5();">
                                        <h3>STARTING DATE</h3>
                                    </a></li>
                            </div>
                            <div class="">
                                <li><a href="#">
                                        <h3>DELIVERY OPTIONS</h3>
                                    </a></li>
                            </div>
                            <div class="disabled">
                                <li><a href="#">
                                        <h3>PAYMENT</h3>
                                    </a></li>
                            </div>
                        </ol>
                    </div>
                </div>
                <div class="col-md-8 text-center heading-section stranger mb-4">
                    <div class="row justify-content-center delivery">
                        <h4 class="mb-4">How You’d Like To Get Your Meals?</h4>
                        <div class="row justify-content-center mb-3">
                            <div class="btn-toolbar justify-content-center">
                                <div>

                                    <input type="radio" value="Delivery" onchange="show(this.value)" class="btn-check" name="delivery_option" id="deliverybtn1" autocomplete="off" checked>
                                    <label class="btn btn-date m-2" for="deliverybtn1">Delivery</label>

                                    <input type="radio" value="Pickup" onchange="show2()" class="btn-check" name="delivery_option" id="deliverybtn2" autocomplete="off">
                                    <label class="btn btn-date m-2" for="deliverybtn2">Pick up</label>

                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">

                            <div class="desc" id="deliverytab2">
                                <div class="location">
                                    <div class="col map-responsive" id="map" data-aos="fade-up">
                                        
                                    </div>
                                    <div class="note-form mt-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter your address" name="delivery_address" onfocus="initAutocomplete()" id="autocomplete">
                                            <input type="hidden" name="latitude"  id="latitude" value="">
                                            <input type="hidden" name="longitude" id="longitude" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="desc" id="deliverytab3">

                                <div class="dropdown m-2">
                                    <div class="select-side">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                    <select class="btn btn-dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" title="Select Region" name="pickup_region">
                                        <div class="dropdown-menu">
                                            @foreach($regions as $r_key => $r)
                                                <option class="dropdown-item" value="{{ $r->id }}">{{ $r->name }}</option>
                                            @endforeach
                                        </div>
                                    </select>
                                </div>


                                <div class="dropdown m-2">
                                    <div class="select-side">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                    <select class="btn btn-dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" title="Select City" name="pickup_city" >
                                        <div class="dropdown-menu">
                                            <option hidden class="dropdown-item" value="">Select City
                                            </option>
                                            <optgroup class="header" label="Select City">
                                            </optgroup>
                                            @foreach($cities as $c_key => $c)
                                                <option class="dropdown-item" value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </div>
                                    </select>
                                </div>


                                <div class="dropdown m-2">
                                    <div class="select-side">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                    <select class="btn btn-dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" title="Eastern Region" name="pickup_branch" >
                                        <div class="dropdown-menu">
                                            <option hidden class="dropdown-item" value="">Select Branch
                                            </option>

                                            <optgroup class="header" label="Select your preferred pickup
                                                branch">
                                            </optgroup>
                                            @foreach($branches as $b_key => $b)
                                                <option class="dropdown-item" value="{{ $b->id }}">{{ $b->name }}</option>
                                            @endforeach
                                        </div>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe" class="theme-color1">
        <div id="payment" class="container section">
            <div class="row justify-content-center m-10">
                <h1 class="mb-4">Payment</h1>
                <div class="container white payment">
                    <div class="row justify-content-center p-5">

                        <div class="col-md-4 staff left-side">
                            <div class="row">
                                <h4>Keto Plan</h4>
                                <img src="{{ asset('new_frontend_assets/img/meal-box.png') }}" alt="">
                            </div>
                            <div class="row">
                                <div class="main">
                                    <h4 class="heading">Total Price</h4>
                                    <p class="body">1,248.10 <span>SAR</span></p>
                                </div>
                                <div class="details">
                                    <h4 class="heading">VAT</h4>
                                    <p class="body">162.8 <span>SAR</span></p>
                                    <h4 class="heading">Delivery</h4>
                                    <p class="body">200 <span>SAR</span></p>
                                </div>
                                <hr>
                                <div class="intake">
                                    <p class="heading">Average Daily Intake</p>
                                    <p class="body">1,200&nbsp;<span>Calories</span></p>
                                    <p class="body">98g&nbsp;<span>Protein</span></p>
                                    <p class="body">58g&nbsp;<span>Carb</span></p>
                                    <p class="body">101g&nbsp;<span>Fat</span></p>
                                </div>
                                <hr>
                                <div class="intake">
                                    <p class="heading">Delivery Address</p>
                                    <p class="body"><span>7386, Gharb Al Dhahran, Dhahran<br> 34461 3630, Saudi Arabia</span></p>
                                </div>
                                <a class="switch" href="#" onclick="switchVisible6();">Switch to free
                                    pickup</a>
                                <div class="row justify-content-center">
                                    <input type="submit" name="submit" value="Subscribe" class="btn btn-next btn-lg">
                                    <a class="promo" href="#">Do you have promo code?</a>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-8 right-side">
                            <div class="row">
                                <h4 class="mb-3">Subscription Details</h4>
                                <div class="row heading">
                                    <div class="col-md-2">
                                        <h5>Meals</h5>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-2">
                                        <h5>Qty</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="float-right" href="#" onclick="switchVisible3();">
                                            Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row bill">
                                <div class="row details">
                                    <div class="col-md-2 body">
                                        <p>Breakfast</p>
                                    </div>
                                    <div class="col-md-6 line">
                                        <hr>
                                    </div>
                                    <div class="col-md-2 body-bold">
                                        <p>1</p>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                            </div>
                            <div class="row bill">
                                <div class="row details">
                                    <div class="col-md-2 body">
                                        <p>Lunch</p>
                                    </div>
                                    <div class="col-md-6 line">
                                        <hr>
                                    </div>
                                    <div class="col-md-2 body-bold">
                                        <p>2</p>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                            </div>
                            <div class="row bill">
                                <div class="row details">
                                    <div class="col-md-2 body">
                                        <p>Dinner</p>
                                    </div>
                                    <div class="col-md-6 line">
                                        <hr>
                                    </div>
                                    <div class="col-md-2 body-bold">
                                        <p>1</p>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                            </div>
                            <div class="row bill">
                                <div class="row details">
                                    <div class="col-md-2 body">
                                        <p>Salad</p>
                                    </div>
                                    <div class="col-md-6 line">
                                        <hr>
                                    </div>
                                    <div class="col-md-2 body-bold">
                                        <p>1</p>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                            </div>
                            <div class="row bill">
                                <div class="row details">
                                    <div class="col-md-2 body">
                                        <p>Snack</p>
                                    </div>
                                    <div class="col-md-6 line">
                                        <hr>
                                    </div>
                                    <div class="col-md-2 body-bold">
                                        <p>1</p>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row heading">
                                <h5>NO OF DAYS</h5>
                                <div class="row">
                                    <div class="d-flex justify-content-between">
                                        <p class="field-inline-block">Saturday to Thursday (6 Days)</p>
                                        <a class="field-inline-block float-right" href="#"
                                            onclick="switchVisible5();"> Edit</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row heading">
                                <h5>NO OF WEEKS</h5>
                                <div class="row">
                                    <div class="d-flex justify-content-between">
                                        <p class="field-inline-block">4 weeks</p>
                                        <a class="field-inline-block float-right" href="#"
                                            onclick="switchVisible5();"> Edit</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row heading">
                                <h5>START DATE</h5>
                                <div class="row">
                                    <div class="d-flex justify-content-between">
                                        <p class="field-inline-block">18-05-2022</p>
                                        <a class="field-inline-block float-right" href="#"
                                            onclick="switchVisible5();"> Edit</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row heading">
                                <h5>Notes:</h5>
                                <div class="row">
                                    <div class="d-flex justify-content-between">
                                        <p class="field-inline-block">No Chicken<br>No Shrimp<br><br>I’m
                                            allergic to Tomatoes.</p>
                                        <a class="field-inline-block float-right" href="#"
                                            onclick="switchVisible4();"> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="bottombtns" class="bottom-position">
        <div id="" class="row bottom-bar height-3 justify-content-between">
            <div class="col-4">
                <p>Meal Type: <span id="meal_type_span"></span></p>
            </div>
            <div class="col-4">
                <p>Starting From: <span id="starting_from_span"></span> </p>
            </div>

            <div id="orange-button" class="col-4 orange">

                <div id="bottombtn1">
                    <p>
                        <input id="Button1" type="button" class="continue-btn" value="Continue"
                            onclick="switchVisible2();" />
                    </p>
                </div>

                <div id="bottombtn2">
                    <p>
                        <input id="Button1" type="button" class="continue-btn" value="Continue"
                            onclick="switchVisible3();" />
                    </p>
                </div>

                <div id="bottombtn3">
                    <p>
                        <input id="Button1" type="button" class="continue-btn" value="Continue"
                            onclick="switchVisible4();" />
                    </p>
                </div>

                <div id="bottombtn4">
                    <p>
                        <input id="Button1" type="button" class="continue-btn" value="Continue"
                            onclick="switchVisible5();" />
                    </p>
                </div>

                <div id="bottombtn5">
                    <p>
                        <input id="Button1" type="button" class="continue-btn" value="Continue"
                            onclick="switchVisible6();" />
                    </p>
                </div>
            </div>
        </div>
    </div>
  </form>


@endsection

@push('plugin-scripts')
    
    @if($selected_lang == 'ar')
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwJuilrPjiHysDrKaPuZ7zm4LP9vNKHO8&libraries=places&language=ar&callback=initAutocomplete"
      async defer></script>
    @else
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwJuilrPjiHysDrKaPuZ7zm4LP9vNKHO8&libraries=places&callback=initAutocomplete"
          async defer></script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"
        integrity="sha512-cViKBZswH231Ui53apFnPzem4pvG8mlCDrSyZskDE9OK2gyUd/L08e1AC0wjJodXYZ1wmXEuNimN1d3MWG7jaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.datepicker.min.js"
        integrity="sha512-s4nJt9M6CoYZQSWgFdWunitdPcKXfvsAAHyRZ/c/P3pkeSvHpRcEMCld0SerDnUfu0wSrEBtZWutoqWwfz9BTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>

    <!-- maps script -->
    <script type="text/javascript">
        var placeSearch, autocomplete;

        function initAutocomplete() {
            initmap(false);
          autocomplete = new google.maps.places.Autocomplete(
              document.getElementById('autocomplete'), { types: ['establishment'], componentRestrictions: {country: "sa"} });
          autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            var place = autocomplete.getPlace();

            document.getElementById("autocomplete").value = place.formatted_address;
            document.getElementById("latitude").value = place.geometry.location.lat();
            document.getElementById("longitude").value = place.geometry.location.lng();
            initmap(true);
        }

        function initmap(pickup_set){
            @if(\Auth::check())
                @if(auth()->user()->latitude != null && auth()->user()->longitude != null)
                    $('#latitude').val({{ auth()->user()->latitude }});
                    $('#longitude').val({{ auth()->user()->longitude }});
                    $('#autocomplete').val('{{ auth()->user()->address }}');
                @endif
            @endif
            
            if($('#latitude').val() != ""  &&  $('#latitude').val() != "undefined")
            {
                var initialLat = $('#latitude').val();
                var initialLong = $('#longitude').val();
            }
            else
            {
                var initialLat = 26.32180100000001;
                var initialLong = 50.215458999999996;
            }


          initialLat = initialLat?initialLat:26.32180100000001;
          initialLong = initialLong?initialLong:50.215458999999996;

          var latlng = new google.maps.LatLng(initialLat, initialLong);
          var options = {
              zoom: 13,
              center: latlng,
              streetViewControl: false,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };

          map = new google.maps.Map(document.getElementById("map"), options);

          geocoder = new google.maps.Geocoder();

          marker = new google.maps.Marker({
              map: map,
              draggable: true,
              position: latlng,
              title: "Location"
          });

          google.maps.event.addListener(marker, 'dragend', function(marker){
            geocodePosition(marker.latLng, "#autocomplete");
            var latLng = marker.latLng;
            currentLatitude = latLng.lat();
            currentLongitude = latLng.lng();
            $("#latitude").val(currentLatitude);
            $("#longitude").val(currentLongitude);
          });


          // Configure the click listener.
          map.addListener("click", (mapsMouseEvent) => {
            
            geocodePosition(mapsMouseEvent.latLng, "#autocomplete");
            var latLng = mapsMouseEvent.latLng;
            currentLatitude = latLng.lat();
            currentLongitude = latLng.lng();
            $("#latitude").val(currentLatitude);
            $("#longitude").val(currentLongitude);

            marker.setPosition(mapsMouseEvent.latLng);
          });

          addYourLocationButton(map);
        }

        function geocodePosition(pos, inputbox)
        {
           geocoder = new google.maps.Geocoder();
           geocoder.geocode
            ({
                latLng: pos
            },
                function(results, status)
                {
                    if (status == google.maps.GeocoderStatus.OK)
                    {
                        $(inputbox).val(results[0].formatted_address);
                    }
                    else
                    {
                      alert('Cannot determine address at this location.');
                      $(inputbox).val('');
                    }
                }
            );
        }

        function addYourLocationButton(map, latitude = 0, longitude = 0) 
        {
            var myMarker = new google.maps.Marker({
              map: map,
              animation: google.maps.Animation.DROP,
              draggable: true,
              position: new google.maps.LatLng(latitude, longitude)
            });

              var controlDiv = document.createElement('div');

              var firstChild = document.createElement('button');
              firstChild.style.backgroundColor = '#fff';
              firstChild.style.border = 'none';
              firstChild.style.outline = 'none';
              firstChild.style.width = '40px';
              firstChild.style.height = '40px';
              firstChild.style.borderRadius = '2px';
              firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
              firstChild.style.cursor = 'pointer';
              firstChild.style.marginRight = '10px';
              firstChild.style.padding = '0px';
              firstChild.title = 'Your Location';
              controlDiv.appendChild(firstChild);

              var secondChild = document.createElement('div');
              secondChild.style.marginLeft = '10px';
              secondChild.style.width = '22px';
              secondChild.style.height = '22px';
              secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
              secondChild.style.backgroundSize = '180px 18px';
              secondChild.style.backgroundPosition = '0px 0px';
              secondChild.style.backgroundRepeat = 'no-repeat';
              secondChild.id = 'you_location_img';
              firstChild.appendChild(secondChild);

              // google.maps.event.addListener(map, 'dragend', function() {
              //     $('#you_location_img').css('background-position', '0px 0px');
              // });

              firstChild.addEventListener('click', function(e) {
                e.preventDefault();
                  var imgX = '0';
                  var animationInterval = setInterval(function(){
                      if(imgX == '-18') imgX = '0';
                      else imgX = '-18';
                      $('#you_location_img').css('background-position', imgX+'px 0px');
                  }, 500);
                  if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        marker.setPosition(latlng);

                        geocodePosition(latlng, "#autocomplete");
                        //var latLng2 = marker.latLng;
                        currentLatitude = latlng.lat();
                        currentLongitude = latlng.lng();
                        $("#latitude").val(currentLatitude);
                        $("#longitude").val(currentLongitude);

                        map.setZoom(12);
                        map.setCenter(latlng);
                        var new_infowindow = new google.maps.InfoWindow();
                        new_infowindow.setContent('Your selected location');
                        new_infowindow.open(map, marker);
                        clearInterval(animationInterval);
                        $('#you_location_img').css('background-position', '-144px 0px');
                    });
                  }
                  else{
                      clearInterval(animationInterval);
                      $('#you_location_img').css('background-position', '0px 0px');
                  }

                google.maps.event.addListener(myMarker, 'dragend', function(marker){

                    geocodePosition(marker.latLng, "#autocomplete");
                    var latLng = marker.latLng;
                    currentLatitude = latLng.lat();
                    currentLongitude = latLng.lng();
                    $("#latitude").val(currentLatitude);
                    $("#longitude").val(currentLongitude);
                });
            });

            controlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
        }
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            const today_date = new Date();
            const tomorrow_date = new Date(today_date);
            tomorrow_date.setDate(tomorrow_date.getDate() + 1);
            $('.tommorrow_date').val(tomorrow_date);

            const tomorrow_date_plus1 = new Date(today_date);
            tomorrow_date_plus1.setDate(tomorrow_date_plus1.getDate() + 2);
            $('.tommorrow_plus1_date').val(tomorrow_date_plus1.toISOString().split('T')[0]);
            var month = tomorrow_date_plus1.toLocaleString("default", { month: "short" });
            var day = tomorrow_date_plus1.toLocaleString("default", { day: "2-digit" });
            var formattedDate = month + "-" + day;
            $('.tommorrow_plus1_date_label').text(formattedDate);

            const tomorrow_date_plus2 = new Date(today_date);
            tomorrow_date_plus2.setDate(tomorrow_date_plus2.getDate() + 3);
            $('.tommorrow_plus2_date').val(tomorrow_date_plus2.toISOString().split('T')[0]);
            var month = tomorrow_date_plus2.toLocaleString("default", { month: "short" });
            var day = tomorrow_date_plus2.toLocaleString("default", { day: "2-digit" });
            var formattedDate = month + "-" + day;
            $('.tommorrow_plus2_date_label').text(formattedDate);
        });

        

        $('.btn-working').click(function (e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });


        function greenegg() {
            var div1 = document.getElementById('green-egg');
            var div2 = document.getElementById('hover-egg');

            if (div1 !== undefined && div2 !== undefined) {
                div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
                div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
            }
        }

        function greenfish() {
            var div1 = document.getElementById('green-fish');
            var div2 = document.getElementById('hover-fish');

            if (div1 !== undefined && div2 !== undefined) {
                div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
                div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
            }
        }

        function greenshrimp() {
            var div1 = document.getElementById('green-shrimp');
            var div2 = document.getElementById('hover-shrimp');

            if (div1 !== undefined && div2 !== undefined) {
                div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
                div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
            }
        }

        function greenmeat() {
            var div1 = document.getElementById('green-meat');
            var div2 = document.getElementById('hover-meat');

            if (div1 !== undefined && div2 !== undefined) {
                div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
                div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
            }
        }

        function greenchicken() {
            var div1 = document.getElementById('green-chicken');
            var div2 = document.getElementById('hover-chicken');

            if (div1 !== undefined && div2 !== undefined) {
                div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
                div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
            }
        }

        function greennut() {
            var div1 = document.getElementById('green-nut');
            var div2 = document.getElementById('hover-nut');

            if (div1 !== undefined && div2 !== undefined) {
                div1.style.display = div2.style.display === '' ? 'none' : div2.style.display === 'none' ? 'none' : 'inline-block';
                div2.style.display = div1.style.display === 'inline-block' ? 'none' : 'inline-block';
            }
        }



        function show(str) {
            document.getElementById('deliverytab3').style.display = 'none';
            document.getElementById('deliverytab2').style.display = 'block';
            initAutocomplete();
        }

        function show2(sign) {
            document.getElementById('deliverytab3').style.display = 'block';
            document.getElementById('deliverytab2').style.display = 'none';
        }




        function switchVisible2() {
            if (document.getElementById('mealtype')) {

                if (document.getElementById('mealtype').style.display == 'none') {
                    document.getElementById('mealtype').style.display = 'block';
                    document.getElementById('bottombtn1').style.display = 'block';
                    document.getElementById('selectmeal1').style.display = 'none';
                    document.getElementById('selectmeal2').style.display = 'none';
                    document.getElementById('startdate').style.display = 'none';
                    document.getElementById('deliveryopt').style.display = 'none';
                    document.getElementById('bottombtn2').style.display = 'none';
                    document.getElementById('bottombtn3').style.display = 'none';
                    document.getElementById('bottombtn4').style.display = 'none';
                    document.getElementById('bottombtn5').style.display = 'none';
                    document.getElementById('bottombtns').style.display = 'block';
                } else {
                    document.getElementById('mealtype').style.display = 'none';
                    document.getElementById('bottombtn1').style.display = 'none';
                    document.getElementById('selectmeal1').style.display = 'block';
                    document.getElementById('selectmeal2').style.display = 'none';
                    document.getElementById('bottombtn2').style.display = 'block';
                    document.getElementById('bottombtns').style.display = 'block';
                }
            }
        }

        function switchVisible3() {
            if (document.getElementById('selectmeal1')) {

                if (document.getElementById('selectmeal1').style.display == 'none') {
                    document.getElementById('selectmeal1').style.display = 'block';
                    document.getElementById('bottombtn2').style.display = 'block';
                    document.getElementById('selectmeal2').style.display = 'none';
                    document.getElementById('startdate').style.display = 'none';
                    document.getElementById('deliveryopt').style.display = 'none';
                    document.getElementById('payment').style.display = 'none';
                    document.getElementById('bottombtn1').style.display = 'none';
                    document.getElementById('bottombtn3').style.display = 'none';
                    document.getElementById('bottombtn4').style.display = 'none';
                    document.getElementById('bottombtn5').style.display = 'none';
                    document.getElementById('bottombtns').style.display = 'block';
                } else {
                    document.getElementById('selectmeal1').style.display = 'none';
                    document.getElementById('bottombtn2').style.display = 'none';
                    document.getElementById('selectmeal2').style.display = 'block';
                    document.getElementById('startdate').style.display = 'none';
                    document.getElementById('bottombtn3').style.display = 'block';
                    document.getElementById('bottombtns').style.display = 'block';
                }
            }
        }

        function switchVisible4() {
            if (document.getElementById('selectmeal2')) {

                if (document.getElementById('selectmeal2').style.display == 'none') {
                    document.getElementById('selectmeal2').style.display = 'block';
                    document.getElementById('bottombtn3').style.display = 'block';
                    document.getElementById('startdate').style.display = 'none';
                    document.getElementById('mealtype').style.display = 'none';
                    document.getElementById('selectmeal1').style.display = 'none';
                    document.getElementById('deliveryopt').style.display = 'none';
                    document.getElementById('payment').style.display = 'none';
                    document.getElementById('bottombtn1').style.display = 'none';
                    document.getElementById('bottombtn2').style.display = 'none';
                    document.getElementById('bottombtn4').style.display = 'none';
                    document.getElementById('bottombtn5').style.display = 'none';
                    document.getElementById('bottombtns').style.display = 'block';
                } else {
                    document.getElementById('selectmeal2').style.display = 'none';
                    document.getElementById('bottombtn3').style.display = 'none';
                    document.getElementById('startdate').style.display = 'block';
                    document.getElementById('deliveryopt').style.display = 'none';
                    document.getElementById('bottombtn4').style.display = 'block';
                    document.getElementById('bottombtns').style.display = 'block';
                }
            }
        }

        function switchVisible5() {
            if (document.getElementById('startdate')) {

                if (document.getElementById('startdate').style.display == 'none') {
                    document.getElementById('startdate').style.display = 'block';
                    document.getElementById('bottombtn4').style.display = 'block';
                    document.getElementById('mealtype').style.display = 'none';
                    document.getElementById('selectmeal1').style.display = 'none';
                    document.getElementById('selectmeal2').style.display = 'none';
                    document.getElementById('deliveryopt').style.display = 'none';
                    document.getElementById('payment').style.display = 'none';
                    document.getElementById('bottombtn1').style.display = 'none';
                    document.getElementById('bottombtn2').style.display = 'none';
                    document.getElementById('bottombtn3').style.display = 'none';
                    document.getElementById('bottombtn5').style.display = 'none';
                    document.getElementById('bottombtns').style.display = 'block';
                } else {
                    document.getElementById('startdate').style.display = 'none';
                    document.getElementById('bottombtn4').style.display = 'none';
                    document.getElementById('deliveryopt').style.display = 'block';
                    document.getElementById('mealtype').style.display = 'none';
                    document.getElementById('selectmeal1').style.display = 'none';
                    document.getElementById('selectmeal2').style.display = 'none';
                    document.getElementById('payment').style.display = 'none';
                    document.getElementById('bottombtn5').style.display = 'block';
                    document.getElementById('bottombtns').style.display = 'block';
                }
            }
        }

        function switchVisible6() {
            if (document.getElementById('deliveryopt')) {

                if (document.getElementById('deliveryopt').style.display == 'none') {
                    document.getElementById('deliveryopt').style.display = 'block';
                    document.getElementById('bottombtn5').style.display = 'block';
                    document.getElementById('mealtype').style.display = 'none';
                    document.getElementById('selectmeal1').style.display = 'none';
                    document.getElementById('selectmeal2').style.display = 'none';
                    document.getElementById('startdate').style.display = 'none';
                    document.getElementById('payment').style.display = 'none';
                    document.getElementById('bottombtn1').style.display = 'none';
                    document.getElementById('bottombtn2').style.display = 'none';
                    document.getElementById('bottombtn3').style.display = 'none';
                    document.getElementById('bottombtn4').style.display = 'none';
                    document.getElementById('bottombtns').style.display = 'block';
                } else {
                    document.getElementById('deliveryopt').style.display = 'none';
                    document.getElementById('bottombtn5').style.display = 'none';
                    document.getElementById('payment').style.display = 'block';
                    document.getElementById('mealtype').style.display = 'none';
                    document.getElementById('selectmeal1').style.display = 'none';
                    document.getElementById('selectmeal2').style.display = 'none';
                    document.getElementById('startdate').style.display = 'none';
                    document.getElementById('bottombtns').style.display = 'none';
                }
            }
        }

        function switchVisible7() {
            if (document.getElementById('payment')) {

                if (document.getElementById('payment').style.display == 'none') {
                    document.getElementById('payment').style.display = 'block';
                    document.getElementById('Div9').style.display = 'none';
                    document.getElementById('startdate').style.display = 'none';
                } else {
                    document.getElementById('payment').style.display = 'none';
                    document.getElementById('startdate').style.display = 'none';
                    document.getElementById('Div9').style.display = 'block';
                }
            }
        }



        (function ($) {
    $(document).ready(function () {
      $(document).on("change", ".days-buttons input", function () {
        var numberOfChecked = $(".days-buttons input:checkbox:checked").length;
        if (numberOfChecked >= 5) {
          $(".days-buttons input:not(:checked)").prop("disabled", true);
        } else {
          $(".days-buttons input:not(:checked)").removeAttr("disabled", true);
        }
      });
    });
  })(jQuery);



        $(document).ready(function () {

            $("#datepicker1").datepicker({
                autoclose: true,
                dateFormat: 'dd/mm/yy',
                todayHighlight: true,
                onSelect: function () {
                    $('label[for="startradio4"]').text($(this).val());
                    $('.choose_date_label').text($(this).val());
                    $('.picked_date').val($(this).val());
                }
            });

            $("#startradio4").click(function () {
                var today = new Date(); 
                $("#datepicker1").datepicker("show");
                $("#datepicker1").datepicker('destroy').datepicker(
                    {
                        startDate: new Date(today.getTime() + (4 * (24 * 60 * 60 * 1000))), 
                        dateFormat: 'yy-mm-dd',
                        daysOfWeekDisabled: [5],
                        autoclose: true
                    }
                );
            });

            $('#datepicker1').change(function(){
                var pickup_date = $('#datepicker1').val();
                $('.choose_date_label').text(pickup_date);
                $('.picked_date').val(pickup_date);
            });

        });

        $(document).scroll(function () {
            var cutoff = $(window).scrollTop();

            $('section').each(function () {
                if ($(this).offset().top + $(this).height() > cutoff) {
                    $('section').removeClass('active-function');
                    $(this).addClass('active-function');
                    // console.log('chalgaya');
                    return false; // stops the iteration after the first one on screen
                }
            });
        });

        $("document").ready(function () {
            $('#Buttonpwr').click(function () {
                var files = new Array();

                //xzyId is table id.
                $('section').each(function () {
                    if ($(this).is('active-function')) {
                        alert(this.value);
                        console.log('chalgaya');
                        window.open(this.value);
                    }
                });
            });

        });
    </script>
  <script type="text/javascript">
    $( document ).ready(function() {
      
      hide_info_areas();

      $('.gender_radio').on('click', function(){
        var gender = $("input[name=gender_radio]:checked").val();
        // alert(gender);
        if(gender == 'Male'){
          $('#label_male').addClass('selected_choice');
          $('#label_female').removeClass('selected_choice');
          $("#inputmale").attr('checked', 'checked');
          $("#inputfemale").removeAttr('checked');
          $("#inputmale").prop('checked', true);
          $("#inputfemale").prop('checked', false);

        }
        else{
          $('#label_male').removeClass('selected_choice');
          $('#label_female').addClass('selected_choice');
          $("#inputfemale").attr('checked', 'checked');
          $("#inputmale").removeAttr('checked');
          $("#inputfemale").prop('checked', true);
          $("#inputmale").prop('checked', false);
        }
        $('#dob_area').show();
      });

      $("#dob_year").keyup(function(){
        var value = $("#dob_year").val();
        if(value.length == 4){
          $('#weight_height_area').show();
        }
      });

      $("#customer_height").keyup(function(){
        var value = $("#customer_height").val();
        if(value.length >= 2){
          $('#goal_area').show();
        }
      });

      $('.customer_goal').on('click', function(){
        var goal = $("input[name=customer_goal]:checked").val();
        if(goal == 1){
          $('#labelgoal1').addClass('selected_choice');
          $('#labelgoal2').removeClass('selected_choice');
          $('#labelgoal3').removeClass('selected_choice');
          $('#labelgoal4').removeClass('selected_choice');
          $("#inputgoal1").attr('checked', 'checked');
          $("#inputgoal2").removeAttr('checked');
          $("#inputgoal3").removeAttr('checked');
          $("#inputgoal4").removeAttr('checked');
        }
        else if(goal == 2){
          $('#labelgoal1').removeClass('selected_choice');
          $('#labelgoal2').addClass('selected_choice');
          $('#labelgoal3').removeClass('selected_choice');
          $('#labelgoal4').removeClass('selected_choice');
          $("#inputgoal1").removeAttr('checked');
          $("#inputgoal2").attr('checked', 'checked');
          $("#inputgoal3").removeAttr('checked');
          $("#inputgoal4").removeAttr('checked');
        }
        else if(goal == 3){
          $('#labelgoal1').removeClass('selected_choice');
          $('#labelgoal2').removeClass('selected_choice');
          $('#labelgoal3').addClass('selected_choice');
          $('#labelgoal4').removeClass('selected_choice');
          $("#inputgoal1").removeAttr('checked');
          $("#inputgoal2").removeAttr('checked');
          $("#inputgoal3").attr('checked', 'checked');
          $("#inputgoal4").removeAttr('checked');
        }
        else{
          $('#labelgoal1').removeClass('selected_choice');
          $('#labelgoal2').removeClass('selected_choice');
          $('#labelgoal3').removeClass('selected_choice');
          $('#labelgoal4').addClass('selected_choice');
          $("#inputgoal1").removeAttr('checked');
          $("#inputgoal2").removeAttr('checked');
          $("#inputgoal3").removeAttr('checked');
          $("#inputgoal4").attr('checked', 'checked');
        }
        $('#exercise_area').show();
      });

      $('.exercise_frequency').on('click', function(){
        var exercise = $("input[name=exercise_frequency]:checked").val();
        if(exercise == 1){
          $('#labelexercise1').addClass('selected_choice');
          $('#labelexercise2').removeClass('selected_choice');
          $('#labelexercise3').removeClass('selected_choice');
          $('#labelexercise4').removeClass('selected_choice');
          $('#labelexercise5').removeClass('selected_choice');
          $("#inputexercise1").attr('checked', 'checked');
          $("#inputexercise2").removeAttr('checked');
          $("#inputexercise3").removeAttr('checked');
          $("#inputexercise4").removeAttr('checked');
          $("#inputexercise5").removeAttr('checked');
        }
        else if(exercise == 2){
          $('#labelexercise1').removeClass('selected_choice');
          $('#labelexercise2').addClass('selected_choice');
          $('#labelexercise3').removeClass('selected_choice');
          $('#labelexercise4').removeClass('selected_choice');
          $('#labelexercise5').removeClass('selected_choice');
          $("#inputexercise1").removeAttr('checked');
          $("#inputexercise2").attr('checked', 'checked');
          $("#inputexercise3").removeAttr('checked');
          $("#inputexercise4").removeAttr('checked');
          $("#inputexercise5").removeAttr('checked');
        }
        else if(exercise == 3){
          $('#labelexercise1').removeClass('selected_choice');
          $('#labelexercise2').removeClass('selected_choice');
          $('#labelexercise3').addClass('selected_choice');
          $('#labelexercise4').removeClass('selected_choice');
          $('#labelexercise5').removeClass('selected_choice');
          $("#inputexercise1").removeAttr('checked');
          $("#inputexercise2").removeAttr('checked');
          $("#inputexercise3").attr('checked', 'checked');
          $("#inputexercise4").removeAttr('checked');
          $("#inputexercise5").removeAttr('checked');
        }
        else if(exercise == 4){
          $('#labelexercise1').removeClass('selected_choice');
          $('#labelexercise2').removeClass('selected_choice');
          $('#labelexercise3').removeClass('selected_choice');
          $('#labelexercise4').addClass('selected_choice');
          $('#labelexercise5').removeClass('selected_choice');
          $("#inputexercise1").removeAttr('checked');
          $("#inputexercise2").removeAttr('checked');
          $("#inputexercise3").removeAttr('checked');
          $("#inputexercise4").attr('checked', 'checked');
          $("#inputexercise5").removeAttr('checked');
        }
        else{
          $('#labelexercise1').removeClass('selected_choice');
          $('#labelexercise2').removeClass('selected_choice');
          $('#labelexercise3').removeClass('selected_choice');
          $('#labelexercise4').removeClass('selected_choice');
          $('#labelexercise5').addClass('selected_choice');
          $("#inputexercise1").removeAttr('checked');
          $("#inputexercise2").removeAttr('checked');
          $("#inputexercise3").removeAttr('checked');
          $("#inputexercise4").removeAttr('checked');
          $("#inputexercise5").attr('checked', 'checked');
        }
        $('#continue_area').show();
      });

      $('.meal_selection').on('click', function(){
        // var meal_type = $(this).attr('data-mealtype');
        var meal_type = $("input[name=meal_selection]:checked").val();
        var base_prices = {!! json_encode($base_prices) !!};
        // console.log(base_prices);
        $('#meal_type_span').text(meal_type);

        if(meal_type == "Keto"){
          $('#starting_from_span').text(base_prices.keto + " SAR");
        }
        else if(meal_type == "Veg"){
          $('#starting_from_span').text(base_prices.veg + " SAR");
        }
        else if(meal_type == "Non-Veg"){
          $('#starting_from_span').text(base_prices.non_veg + " SAR");
        }
        else{
          $('#meal_type_span').text('');
          $('#starting_from_span').text('');
        }

      });


      $(".breakfast_count").change(function() {
        // var base_price = get_meal_base_price();
        var breakfast_count = $('.breakfast_count').val();
        var lunch_count = $('.lunch_count').val();
        var dinner_count = $('.dinner_count').val();
        var salad_count = $('.salad_count').val();
        var snack_count = $('.snack_count').val();
        var meal_amount = calculate_meal_amount(breakfast_count, lunch_count, dinner_count, salad_count, snack_count);
        $('#starting_from_span').text(meal_amount + " SAR");
      });

      $(".lunch_count").change(function() {
        // var base_price = get_meal_base_price();
        var breakfast_count = $('.breakfast_count').val();
        var lunch_count = $('.lunch_count').val();
        var dinner_count = $('.dinner_count').val();
        var salad_count = $('.salad_count').val();
        var snack_count = $('.snack_count').val();
        var meal_amount = calculate_meal_amount(breakfast_count, lunch_count, dinner_count, salad_count, snack_count);
        $('#starting_from_span').text(meal_amount + " SAR");
      });

      $(".dinner_count").change(function() {
        // var base_price = get_meal_base_price();
        var breakfast_count = $('.breakfast_count').val();
        var lunch_count = $('.lunch_count').val();
        var dinner_count = $('.dinner_count').val();
        var salad_count = $('.salad_count').val();
        var snack_count = $('.snack_count').val();
        var meal_amount = calculate_meal_amount(breakfast_count, lunch_count, dinner_count, salad_count, snack_count);
        $('#starting_from_span').text(meal_amount + " SAR");
      });

      $(".salad_count").change(function() {
        // var base_price = get_meal_base_price();
        var breakfast_count = $('.breakfast_count').val();
        var lunch_count = $('.lunch_count').val();
        var dinner_count = $('.dinner_count').val();
        var salad_count = $('.salad_count').val();
        var snack_count = $('.snack_count').val();
        var meal_amount = calculate_meal_amount(breakfast_count, lunch_count, dinner_count, salad_count, snack_count);
        $('#starting_from_span').text(meal_amount + " SAR");
      });

      $(".snack_count").change(function() {
        // var base_price = get_meal_base_price();
        var breakfast_count = $('.breakfast_count').val();
        var lunch_count = $('.lunch_count').val();
        var dinner_count = $('.dinner_count').val();
        var salad_count = $('.salad_count').val();
        var snack_count = $('.snack_count').val();
        var meal_amount = calculate_meal_amount(breakfast_count, lunch_count, dinner_count, salad_count, snack_count);
        $('#starting_from_span').text(meal_amount + " SAR");
      });

    });

    function calculate_meal_amount(breakfast_count, lunch_count, dinner_count, salad_count, snack_count) {
      var base_price = 0;
      var meal_type = $("input[name=meal_selection]:checked").val();
      var base_prices = {!! json_encode($base_prices) !!};
      var used_calories = 0;
      var used_proteins = 0;
      var used_carbs = 0;
      var used_fats = 0;
      
      if(meal_type == "Keto"){
        base_price = base_prices.keto;
      }
      else if(meal_type == "Veg"){
        base_price = base_prices.veg;
      }
      else if(meal_type == "Non-Veg"){
        base_price = base_prices.non_veg;
      }

      var meal_amount = base_price;
      var base_salad_price = base_prices.salad;
      var base_snack_price = base_prices.snacks;

      if(meal_type == "Keto"){
        var breakfast_conf = {!! json_encode($configurations['breakfast_k']) !!};
        var lunch_conf = {!! json_encode($configurations['lunch_k']) !!};
        var dinner_conf = {!! json_encode($configurations['dinner_k']) !!};
        if(breakfast_count > 0){
          meal_amount +=  (breakfast_conf.unit_price * breakfast_count);
          used_calories += (breakfast_conf.calories * breakfast_count);
          used_proteins += (breakfast_conf.proteins * breakfast_count);
          used_carbs += (breakfast_conf.carbohydrates * breakfast_count);
          used_fats += (breakfast_conf.fats * breakfast_count);
        }
        if(lunch_count > 0){
          meal_amount +=  (lunch_conf.unit_price * lunch_count);
          used_calories += (lunch_conf.calories * lunch_count);
          used_proteins += (lunch_conf.proteins * lunch_count);
          used_carbs += (lunch_conf.carbohydrates * lunch_count);
          used_fats += (lunch_conf.fats * lunch_count);
        }
        if(dinner_count > 0){
          meal_amount +=  (dinner_conf.unit_price * dinner_count);
          used_calories += (dinner_conf.calories * dinner_count);
          used_proteins += (dinner_conf.proteins * dinner_count);
          used_carbs += (dinner_conf.carbohydrates * dinner_count);
          used_fats += (dinner_conf.fats * dinner_count);
        }
        if(salad_count > 0){
          meal_amount += (base_salad_price * salad_count);
        }
        if(snack_count > 0){
          meal_amount += (base_snack_price * snack_count);
        }
      }
      else if(meal_type == "Veg"){
        var breakfast_conf = {!! json_encode($configurations['breakfast_v']) !!};
        var lunch_conf = {!! json_encode($configurations['lunch_v']) !!};
        var dinner_conf = {!! json_encode($configurations['dinner_v']) !!};
        if(breakfast_count > 0){
          meal_amount +=  (breakfast_conf.unit_price * breakfast_count);
          used_calories += (breakfast_conf.calories * breakfast_count);
          used_proteins += (breakfast_conf.proteins * breakfast_count);
          used_carbs += (breakfast_conf.carbohydrates * breakfast_count);
          used_fats += (breakfast_conf.fats * breakfast_count);
        }
        if(lunch_count > 0){
          meal_amount +=  (lunch_conf.unit_price * lunch_count);
          used_calories += (lunch_conf.calories * lunch_count);
          used_proteins += (lunch_conf.proteins * lunch_count);
          used_carbs += (lunch_conf.carbohydrates * lunch_count);
          used_fats += (lunch_conf.fats * lunch_count);
        }
        if(dinner_count > 0){
          meal_amount +=  (dinner_conf.unit_price * dinner_count);
          used_calories += (dinner_conf.calories * dinner_count);
          used_proteins += (dinner_conf.proteins * dinner_count);
          used_carbs += (dinner_conf.carbohydrates * dinner_count);
          used_fats += (dinner_conf.fats * dinner_count);
        }
        if(salad_count > 0){
          meal_amount += (base_salad_price * salad_count);
        }
        if(snack_count > 0){
          meal_amount += (base_snack_price * snack_count);
        }
      }
      else if(meal_type == "Non-Veg"){
        var breakfast_conf = {!! json_encode($configurations['breakfast_nv']) !!};
        var lunch_conf = {!! json_encode($configurations['lunch_nv']) !!};
        var dinner_conf = {!! json_encode($configurations['dinner_nv']) !!};
        if(breakfast_count > 0){
          meal_amount +=  (breakfast_conf.unit_price * breakfast_count);
          used_calories += (breakfast_conf.calories * breakfast_count);
          used_proteins += (breakfast_conf.proteins * breakfast_count);
          used_carbs += (breakfast_conf.carbohydrates * breakfast_count);
          used_fats += (breakfast_conf.fats * breakfast_count);
        }
        if(lunch_count > 0){
          meal_amount +=  (lunch_conf.unit_price * lunch_count);
          used_calories += (lunch_conf.calories * lunch_count);
          used_proteins += (lunch_conf.proteins * lunch_count);
          used_carbs += (lunch_conf.carbohydrates * lunch_count);
          used_fats += (lunch_conf.fats * lunch_count);
        }
        if(dinner_count > 0){
          meal_amount +=  (dinner_conf.unit_price * dinner_count);
          used_calories += (dinner_conf.calories * dinner_count);
          used_proteins += (dinner_conf.proteins * dinner_count);
          used_carbs += (dinner_conf.carbohydrates * dinner_count);
          used_fats += (dinner_conf.fats * dinner_count);
        }
        if(salad_count > 0){
          meal_amount += (base_salad_price * salad_count);
        }
        if(snack_count > 0){
          meal_amount += (base_snack_price * snack_count);
        }
      }

      $('#used_calories').text(used_calories);
      $('#used_protein').text(used_proteins);
      $('#used_carb').text(used_carbs);
      $('#used_fat').text(used_fats);
      
      return meal_amount;
    }
  
    function get_meal_base_price() {
      // var meal_type = $('.meal_selection').attr('data-mealtype');
      var meal_type = $("input[name=meal_selection]:checked").val();
      var base_prices = {!! json_encode($base_prices) !!};
      // alert('meal_type: '+ meal_type);

      if(meal_type == "Keto"){
        return base_prices.keto;
      }
      else if(meal_type == "Veg"){
        return base_prices.veg;
      }
      else if(meal_type == "Non-Veg"){
        return base_prices.non_veg;
      }
      else{
        return 0;
      }
    }

    function hide_info_areas() {
      $('#dob_area').hide();
      $('#weight_height_area').hide();
      $('#goal_area').hide();
      $('#exercise_area').hide();
      $('#continue_area').hide();
    }

    function switchVisible() {

        if (document.getElementById('Div1')) {

            if (document.getElementById('Div1').style.display == 'none') {

                document.getElementById('Div1').style.display = 'block';

                document.getElementById('Div2').style.display = 'none';
                document.getElementById('bottombtns').style.display = 'none';

            }

            else {
                // alert('show2');
                var customer_name = $('#customer_name').val();
                if(customer_name != undefined && customer_name != ''){
                  console.log(customer_name);
                  document.getElementById('Div1').style.display = 'none';
                  document.getElementById('Div2').style.display = 'block';
                  document.getElementById('bottombtns').style.display = 'none';
                  $('#customer_name_span').text(customer_name);
                }
                else{
                  alert('Please enter your name');
                  document.getElementById('Div1').style.display = 'block';
                  document.getElementById('Div2').style.display = 'none';
                  document.getElementById('bottombtns').style.display = 'none';
                }
            }
        }
    }

    function switchVisible1() {
      if (document.getElementById('Div2')) {
        if (document.getElementById('Div2').style.display == 'none') {
          document.getElementById('Div2').style.display = 'block';
          document.getElementById('mealtype').style.display = 'none';
          document.getElementById('bottombtn1').style.display = 'none';
          document.getElementById('bottombtns').style.display = 'block';
          // alert('shown if');  
        }
        else {
          calculate_bmi(); 
          document.getElementById('Div2').style.display = 'none';
          document.getElementById('mealtype').style.display = 'block';
          document.getElementById('bottombtn1').style.display = 'block';
          document.getElementById('bottombtns').style.display = 'block';

          // alert('shown');   
        }
      }
    }

    function calculate_bmi(){
      var gender = $("input[name=gender_radio]:checked").val();
      var goal = $("input[name=customer_goal]:checked").val();
      var exercise = $("input[name=exercise_frequency]:checked").val();
      var dob_day = $('#dob_day').val();
      var dob_month = $('#dob_month').val();
      var dob_year = $('#dob_year').val();
      var customer_weight = $('#customer_weight').val();
      var customer_height = $('#customer_height').val();

      // alert('goal:'+ goal + " exercise: " + exercise + ' gender: '+ gender);
      // return 0;

      var url = "{{ route('calculate_bmi') }}";
      var data= {'gender':gender, 'dob_day':dob_day, 'dob_month':dob_month, 'dob_year':dob_year, 'customer_weight':customer_weight, 'customer_height':customer_height, 'activity_level':exercise, 'goal':goal, '_token':'{{csrf_token()}}' };

      $.ajax({
          url: url,
          data:data,
          type: "POST",
          success: function (result){
              console.log(result);
              // var youneedtoburncalories = result;
              // $('#needtoburn').text('You Need To Burn: ' + youneedtoburncalories + ' Cal');
              if(result != null){
                $('#need_calories').text(result.calories);
                $('#need_protein').text(result.proteins);
                $('#need_carb').text(result.carbs);
                $('#need_fat').text(result.fats); 
                $('#need_calories_intake').text(result.calories);
                $('#need_protein_intake').text(result.proteins);
                $('#need_carb_intake').text(result.carbs);
                $('#need_fat_intake').text(result.fats); 
              } 
              else{ 
                $('#need_calories').text("");
                $('#need_protein').text("");
                $('#need_carb').text("");
                $('#need_fat').text("");
                $('#need_calories_intake').text("");
                $('#need_protein_intake').text("");
                $('#need_carb_intake').text("");
                $('#need_fat_intake').text("");
              }
          }
      });
    }


    //plugin bootstrap minus and plus

    //http://jsfiddle.net/laelitenetwork/puJ6G/

    // $('.btn-check').click(function (e) {

    //     e.preventDefault();



    //     fieldName = $(this).attr('data-field');

    //     type = $(this).attr('data-type');

    //     var input = $("input[name='" + fieldName + "']");

    //     var currentVal = parseInt(input.val());

    //     if (!isNaN(currentVal)) {

    //         if (type == 'minus') {



    //             if (currentVal > input.attr('min')) {

    //                 input.val(currentVal - 1).change();

    //             }

    //             if (parseInt(input.val()) == input.attr('min')) {

    //                 $(this).attr('disabled', true);

    //             }



    //         } else if (type == 'plus') {



    //             if (currentVal < input.attr('max')) {

    //                 input.val(currentVal + 1).change();

    //             }

    //             if (parseInt(input.val()) == input.attr('max')) {

    //                 $(this).attr('disabled', true);

    //             }



    //         }

    //     } else {

    //         input.val(0);

    //     }

    // });

    $('.input-number').focusin(function () {

        $(this).data('oldValue', $(this).val());

    });

    $('.input-number').change(function () {



        minValue = parseInt($(this).attr('min'));

        maxValue = parseInt($(this).attr('max'));

        valueCurrent = parseInt($(this).val());



        name = $(this).attr('name');

        if (valueCurrent >= minValue) {

            $(".btn-check[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')

        } else {

            alert('Sorry, the minimum value was reached');

            $(this).val($(this).data('oldValue'));

        }

        if (valueCurrent <= maxValue) {

            $(".btn-check[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')

        } else {

            alert('Sorry, the maximum value was reached');

            $(this).val($(this).data('oldValue'));

        }





    });

    $(".input-number").keydown(function (e) {

        // Allow: backspace, delete, tab, escape, enter and .

        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||

            // Allow: Ctrl+A

            (e.keyCode == 65 && e.ctrlKey === true) ||

            // Allow: home, end, left, right

            (e.keyCode >= 35 && e.keyCode <= 39)) {

            // let it happen, don't do anything

            return;

        }

        // Ensure that it is a number and stop the keypress

        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

            e.preventDefault();

        }

    });


  </script>
@endpush