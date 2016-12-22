@extends('layout.NTC.ntcmaster')

@section('title')
NIC Admin
@endsection

@section('content')

     <div class="container">
         <div class="row">
             <div class="panel panel-default">
                 <div class="panel-heading">

                 </div>
                 <div class="panel-body" style="padding-top: 10px">
                     <div class="form-group">

                         <nav >
                             <div class="nav-wrapper" style="background-color: #2e6da4">
                                 <form >
                                     <div class="input-field">

                                         <input class="form-control" placeholder="Search Using Staion Name or Route No" name="search" id="search" type="search"  required>

                                         <label for="search"><i class="material-icons">search</i></label>
                                         <i class="material-icons">close</i>
                                     </div>
                                 </form>
                             </div>
                         </nav>
                     </div>
                     <table class="table table-bordered table-hover" style="padding-top: 10px">
                        <thead>
                        <tr>
                            <th>Route No</th>
                            <th>Base Station</th>
                            <th>End Station</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                         <tbody>

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
    <script type="text/javascript">

        $('#search').keyup(function () {

            var value=$(this).val();
            if(value!=""){
            $.ajax({
                type:'POST',
                url:'/ntcsearch/'+value,
                data:'_token=<?php echo csrf_token() ?>',

                success:function (data) {

                        $('tbody').html(data);

                }
            });}
        });




    </script>

@endsection
