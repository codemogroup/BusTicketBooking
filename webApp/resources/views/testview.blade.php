@extends('layout.masterbasics')

<hi>this is test</hi>
<br>
<br>
<br>


<script type="text/javascript">
    $('#searchT').on('keyup',function () {
        var value=$(this).val();
        $.ajax({
            type:'POST',
            url:'/test/'+value,
            data:'_token=<?php echo csrf_token() ?>',
            success:function (data) {
                $('tbody').html(data);
            }
        });
    })
</script>

{{--//        $j=['f'=>'a','s'=>'b','t'=>'c'];--}}
{{--//        $h=['f'=>'d','s'=>'e','t'=>'f'];--}}
{{--//        $i=['f'=>'g','s'=>'h','t'=>'j'];--}}
{{--//        $hi=[$j,$h,$i];--}}
{{--//        --}}
{{--//foreach ($hi as $h){--}}
{{--//--}}
{{--//    $h['f']='bro';--}}
{{--//    foreach ($h as $a){--}}
{{--//        echo $a;--}}
{{--//    }--}}
{{--//}--}}
{{--//--}}
{{--//--}}
