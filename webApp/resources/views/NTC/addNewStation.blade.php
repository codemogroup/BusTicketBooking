@extends('layout.NTC.ntcmaster')

@section('title')
    NIC Admin
@endsection

@section('content')
    <?php

    foreach($count as $count2){
        $var1= $count2->count1;
    }
    $var1=$var1+1;
 ?>

    <div id="form" class="row" style="padding-bottom: 10px">
        <div class="col s12 z-depth-6 card-panel" >
            <form class="login-form r " style="color: #2e6da4; margin-left: 0%; margin-right: 0%; width: 100%" method="post" action="/submitaddstation">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div style="float: left; width: 50%;">
                        <div class="row margin">
                            <div class="input-field  col s4">
                                <input id="rid" name="rid" type="text" value="<?php echo $var1; ?>" readonly="readonly" />
                                <label for="rid">Route ID</label>
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s4">
                                <input id="name" type="text" name="name">
                                <label for="name">Station Name</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col s10 center" style="width: 70%;margin-left: 15%">
                        <button class="btn waves-effect waves-light col s6"  style="background-color:  #2e6da4" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection