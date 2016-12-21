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

            <form class="login-form r" style="color: #2e6da4; margin-left: 2%;width: 80%" method="post" action="/submitaddroute">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-lg-6">

                    <div class="row margin">
                        <div class="input-field  col s4">
                            <input id="rid" name="rid" type="text" value="<?php echo $var1; ?>" readonly="readonly" />
                            <label for="rid">Route ID</label>

                        </div>
                    </div>
                <div class="row margin">
                    <div class="input-field col s4">
                        <input id="routeNo" type="text" name="routeNo">
                        <label for="routeNo">Route No</label>
                    </div>
                </div>

                    <div class="row margin">
                        <div class="input-field col s4">
                            <div class="ui-widget">
                                <input type="text" id="base" name="base" class="autocomplete">
                                <label for="base">Base Station</label>
                            </div>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s4">
                            <div class="ui-widget">
                                <input type="text" id="end" name="end" class="autocomplete">
                                <label for="end">End Station</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <label >Intermediate Stations</label>
                </div>

                <div class="row">
                    <div class="col s10 center" style="width: 70%;margin-left: 15%">
                        <button class="btn waves-effect waves-light col s6" style="background-color:  #2e6da4" type="submit">Submit</button>
                    </div>
                </div>
              </div>
            </form>

        </div>


        </div>





    <script type="text/javascript">




        var array1=[];




        $( "#base" ).autocomplete({
            source:array1
        } );


        $('#base').keyup(function () {

            var value=$(this).val();
            if(value!=""){
                $.ajax({
                    type:'POST',
                    url:'/ntcstationsearch/'+value,
                    data:'_token=<?php echo csrf_token() ?>',
                    success:function (data) {

                        setBaseData(data);

                    }
                });
            }
        });

        function setBaseData(data) {
            array2=JSON.parse(data.res);
            array3=[];
            array2.forEach(function (item) {
                array3.push(item.toString());
            });
            array1=array3;
            $("#base").autocomplete({
                source:array1
            } );

        }

      ///////////////////////////////////////////////////
        $( "#end" ).autocomplete({
            source:array1
        } );


        $('#end').keyup(function () {

            var value=$(this).val();
            if(value!=""){
                $.ajax({
                    type:'POST',
                    url:'/ntcstationsearch/'+value,
                    data:'_token=<?php echo csrf_token() ?>',
                    success:function (data) {

                        setEndData(data);

                    }
                });
            }
        });

        function setEndData(data) {
            array2=JSON.parse(data.res);
            array3=[];
            array2.forEach(function (item) {
                array3.push(item.toString());
            });
            array1=array3;
            $("#end").autocomplete({
                source:array1
            } );

        }

    </script>



@endsection

