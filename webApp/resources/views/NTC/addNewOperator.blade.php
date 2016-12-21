@extends('layout.NTC.ntcmaster')

@section('title')
    NIC Admin
@endsection

@section('content')
    <?php
            $var1=0;
    foreach($count as $count2){
            $var1= $var1+$count2->count1;
        }
            $var1=$var1+1;
            ?>
    <div id="form" class="row" style="padding-bottom: 100px">
        <div class="col s12 z-depth-6 card-panel" >
            <form class="login-form r" style="color: #2e6da4; margin-left: 2%;width: 80%" method="post" action="/submitaddoperator">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">

                </div>
                <div class="row margin">
                    <div class="input-field  col s4">
                        <input id="opid" name="opid" type="text" value="<?php echo $var1; ?>" readonly="readonly" />
                        <label for="opid">Operator ID</label>

                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s4">
                        <input id="name" type="text" name="name">
                        <label for="name">Name</label>
                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s4">
                        <input id="nic" type="text" name="nic">
                        <label for="nic">NIC</label>
                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s4">
                        <input id="tel" type="tel" name="tel">
                        <label for="tel">Telephone</label>
                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s4">
                        <input id="address" type="text" name="address">
                        <label for="address">Address</label>
                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s4">
                        <input id="email" type="email" name="email">
                        <label for="email">E-Mail</label>
                    </div>
                </div>

                <div class="row margin">
                            <div class="input-field col s4">
                                <div class="ui-widget">
                                    <input type="text" id="autocomplete-input" name="autocomplete-input" class="autocomplete">
                                    <label for="autocomplete-input">Station</label>
                                </div>
                            </div>
                </div>



                                <div class="row">
                                    <div class="input-field col s10 center" style="width: 70%;margin-left: 15%">
                        <button class="btn waves-effect waves-light col-lg-offset-6" style="background-color:  #2e6da4"
                                type="submit">Submit
                        </button>
                    </div>
                </div>

            </form>




        </div>


    </div>

    <script type="text/javascript">




        var array1=[];




            $( "#autocomplete-input" ).autocomplete({
                source:array1
        } );


            $('#autocomplete-input').keyup(function () {

                var value=$(this).val();
                if(value!=""){
                    $.ajax({
                        type:'POST',
                        url:'/ntcstationsearch/'+value,
                        data:'_token=<?php echo csrf_token() ?>',
                        success:function (data) {

                            setData(data);

                        }
                    });
                }
            });

            function setData(data) {
                array2=JSON.parse(data.res);
                array3=[];
                array2.forEach(function (item) {
                    array3.push(item.toString());
                });
                array1=array3;
                $( "#autocomplete-input" ).autocomplete({
                    source:array1
                } );

            }



    </script>


@endsection

