<!DOCTYPE html>
<html>
  <head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
    <meta charset="utf-8">
    <title>Johan's blog 2.0</title>
    <script src=//cdn.tinymce.com/4/tinymce.min.js></script>
    <script>
            tinymce.init({
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
    </script>



  </head>
  <body>

    <div class="container">

    @yield ('content')
    
    <div id="colors" >@include ('layouts.themes')</div>
    </div>

  </body>
</html>
