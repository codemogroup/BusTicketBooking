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

            <form class="login-form r " style="color: #2e6da4; margin-left: 0%; margin-right: 0%; width: 100%" method="post" action="/submitaddroute">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div style="float: left; width: 40%;">

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
                    <div  style="float: left; width: 60%;">
                        <div class="row margin" >
                        <label >Add Intermediate Stations In Order</label>
                        </div>

                        <div id="mainrow" class="row margin" >

                            <div class="col s4">
                            <div style=" width: 100%">
                                <div class="input-field col s12" id="main">Intermediate Station 1<br><div class="ui-widget"><input class="element" type="text" id="mymainInputsid[]" name="mymainInputs[]"></div></div>
                            </div>
                            </div>

                        </div>






                </div>

                <div class="row">
                    <div class="col s10 center" style="width: 70%;margin-left: 15%">
                        <button class="btn waves-effect waves-light col s6"  style="background-color:  #2e6da4" type="submit">Submit</button>
                    </div>
                </div>
              </div>
            </form>
            <div class="row margin" >
                <button class="btn waves-effect waves-light col col-sm-offset-6"  style="background-color:  #2e6da4"  onclick="addInputmain('main')">Add a Intermediate Station</button>

            </div>

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

                        setData(data,'#base');

                    }
                });
            }
        });

        function setData(data,id) {
            array2=JSON.parse(data.res);
            array3=[];
            array2.forEach(function (item) {
                array3.push(item.toString());
            });
            array1=array3;
            $(id).autocomplete({
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

                        setData(data,'#end');

                    }
                });
            }
        });


///////////////////////////////////////////////


        var counterMain = 1;
        function addInputmain(divName){


            var newdiv = document.createElement('div');
            newdiv.innerHTML = 'Intermediate Station '+ (counterMain + 1) + " <br><div class='ui-widget'><input class='element type='text' id='mymainInputsid' name='mymainInputsname[]'></div>";
            document.getElementById(divName).appendChild(newdiv);
            counterMain++;

        }



        /////////////////////////////////////////////////////




        $('.element').keyup(function () {

            var value=$(this).val();
            if(value!=""){
                $.ajax({
                    type:'POST',
                    url:'/ntcstationsearch/'+value,
                    data:'_token=<?php echo csrf_token() ?>',
                    success:function (data) {

                        setData(data,'.element');

                    }
                });
            }
        });

        $( ".element" ).autocomplete({
            source:array1
        } );



    </script>



@endsection

