<?php

        session_start();
        $diary_content="";
        // if(array_key_exists('id',$_COOKIE)&&$_COOKIE['id'])
        // {
        //     $_SESSION['id']=$_COOKIE['id'];
        // }
        if(array_key_exists("id",$_SESSION)&&$_SESSION['id'])
        {
            $link=mysqli_connect("localhost","root","","secreat_diary");
            if(mysqli_connect_error())
            {
              die("Database not connected successfully");
            }
            $query="SELECT `information` FROM `users` WHERE id='".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
            $row=mysqli_fetch_array(mysqli_query($link,$query));
            $diary_content=$row['information'];
            
        }
        else{
            header("Location:sign_in.php");
        }




?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Your Diary</title>
    <style type='text/css'>

        body{
            background-image:url("background.jpeg");
        }
        textarea{
           width:180%;
           height:800px;
           margin-left:-0px
        }
        .container{
            text-align:center;
            
        }

    </style>
</head>
<body>     

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Secret Diary</b></a>
        <a href="sign_in.php?logout=1"><button class="btn btn-outline-success" type="submit">Log Out</button></a>
  </div>
</nav>
        
        <div class="container">
            <form method="post">
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" id="Area" rows="3" name='content' placeholder="Start writing your diary"><?php echo $diary_content ?></textarea>
            </div>
            <form>
        </div>


        <script type="text/javascript">

                    $('#Area').bind('input propertychange', function() {

                        $.ajax({
                                method: "POST",
                                url: "update.php",
                                data: { content: $("#Area").val() }
                                });
                               
                    });





        </script>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
-->
</body>
</html>