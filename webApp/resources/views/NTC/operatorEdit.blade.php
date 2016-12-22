@extends('layout.NTC.ntcmaster')

@section('title')
    NIC Admin
@endsection

@section('content')



    <div id="form" class="row" style="padding-bottom: 10px">
        <div class="col s12 z-depth-6 card-panel" >
            <form class="login-form r " style="color: #2e6da4; margin-left: 0%; margin-right: 0%; width: 100%" method="post" action="/savenewoperatorstation">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="opeid" value="{{ $result[0]->operator_id }}">
                <div class="row">
                    <div style="float: left; width: 40%;">
                        <div class="row">
                            <div class="row margin" >
                                <label style="color:#2e3436; font-size: large">Name - </label><label style="font-size: large"><?php echo $result[0]->name; ?></label>
                            </div>
                            <div class="row margin" >
                                <label style="color:#2e3436; font-size: large">NIC - </label><label style="font-size: large"><?php echo $result[0]->nic; ?></label>
                            </div>
                            <div class="row margin" >
                                <label style="color:#2e3436; font-size: large">Address - </label><label style="font-size: large"><?php echo $result[0]->address; ?></label>
                            </div>
                            <div class="row margin" >
                                <label style="color:#2e3436; font-size: large">E-Mail - </label><label style="font-size: large"><?php echo $result[0]->email; ?></label>
                            </div>
                            <div class="row margin" >
                            <label style="color:#2e3436; font-size: large">Telephone No - </label><label style="font-size: large"><?php echo $result[0]->telephone; ?></label>
                        </div>

                            <div class="row margin" >
                                <label style="color:#2e3436; font-size: large">Station - </label><label style="font-size: large"><?php echo $station[0]->station; ?></label>
                            </div>

                            </div>

                    </div>
                    <div style="float: left; width: 60%;">
                        <div class="row">
                            <div class="row margin" >
                            <label style="color:#2e3436; font-size: large">Enter New Station</label>
                        </div>
                            <div id="mainrow" class="row margin" >
                                <div class="col s12">
                                    <div style=" width: 100%">
                                        <div class="input-field col s12" id="prior">New Station<br><div class="ui-widget"><input class="element" type="text" id="new" name="new"></div></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col s10 center" style="width: 70%;margin-left: 15%">
                        <button class="btn waves-effect waves-light col s6"  style="background-color:  #2e6da4" type="submit">Save Changes</button>
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