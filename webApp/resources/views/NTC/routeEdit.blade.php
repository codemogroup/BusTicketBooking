@extends('layout.NTC.ntcmaster')

@section('title')
    NIC Admin
@endsection

@section('content')

    <?php
    $stationNames=null;
    $stationids=null;
    $count=0;
    foreach ($inter as $result){
        $stationNames[$count]=$result->station;
        $stationids[$count]=$result->intermediate_id;
        $count++;

    }

    ?>


    <div id="form" class="row" style="padding-bottom: 10px">
        <div class="col s12 z-depth-6 card-panel" >

            <form class="login-form r " style="color: #2e6da4; margin-left: 0%; margin-right: 0%; width: 100%" method="post" action="/submitIntermediate">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="routeid" value="{{$route_id}}">
                <div  style="float: left; width: 40%;">
                <div class="row">
                    <div class="row margin" >
                        <label style="color:#2e3436; font-size: large">Route Id - </label><label style="font-size: large"><?php echo $route_id; ?></label>
                    </div>
                    <div class="row margin" >
                        <label style="color:#2e3436; font-size: large">Route No - </label><label style="font-size: large"><?php echo $route_no; ?></label>
                    </div>
                    <div class="row margin" >
                        <label style="color:#2e3436; font-size: large">Base Station - </label><label style="font-size: large"><?php echo $base; ?></label>
                    </div>
                    <div class="row margin" >
                        <label style="color:#2e3436; font-size: large">End Station - </label><label style="font-size: large"><?php echo $end; ?></label>
                    </div>
                    <div class="row margin" >
                        <label style="color:#2e3436; font-size: large">Intermediate Stations :</label>
                    </div>
                    @foreach($stationNames as $station)
                    <div class="row margin" >
                    <label style="font-size: large"><?php echo $station; ?></label>
                    </div>


                    @endforeach

                </div>
                </div>
                <div  style="float: left; width: 60%;">

                    <div class="row margin" >
                        <label style="font-size: larger">Add new Intermediate Station</label>
                    </div>
                    <div style="width: 33%; float:left">
                        <div id="mainrow" class="row margin" >
                            <div class="col s12">
                                <div style=" width: 100%">
                                    <div class="input-field col s12" id="prior">Prior Station<br><div class="ui-widget"><input class="element" type="text" id="priors" name="priors"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="width: 33%; float:left">
                        <div id="mainrow" class="row margin" >
                            <div class="col s12">
                                <div style=" width: 100%">
                                    <div class="input-field col s12" id="main">Intermediate Station<br><div class="ui-widget"><input class="element" type="text" id="mains" name="mains"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="width: 33%; float:left">
                        <div id="mainrow" class="row margin" >
                            <div class="col s12">
                                <div style=" width: 100%">
                                    <div class="input-field col s12" id="next">Next Station<br><div class="ui-widget"><input class="element" type="text" id="nexts" name="nexts"></div></div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row margin">
                        <div class="row">
                            <div class="col s12 center" style="width: 70%;margin-left: 15%">
                                <button class="btn waves-effect waves-light col s12"  style="background-color:  #2e6da4" type="submit">Add New Intermediate Station</button>
                            </div>
                        </div>
                    </div>


                    </div>


            </form>


        </div>


    </div>


    <script type="text/javascript">




        var array1=[];
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