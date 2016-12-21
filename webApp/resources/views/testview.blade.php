<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>Auto complete</title>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>

<body>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {{--<section class="panel panel-default">--}}
        {{----}}
        {{--<input type="text" name="searchname" class="" id="searchnameT" placeholder="Search">--}}
        {{----}}

        {{--</section>--}}
        <div class="row ">

            <div class="input-field  col s4">
                <input type="text" name="searchname" class="" id="searchnameT"  placeholder="Name">

            </div>

            <script type="text/javascript">
                $('#searchnameT').autocomplete({
                    source: "autocompleteTemp",
                    minlength: 1,
                    autoFocus: true
                })
            </script>


        </div>

    </div>
</div>


</body>




</html>