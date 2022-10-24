<?php
if (isset($_COOKIE['success'])){
    echo ' <script>setTimeout(function(){ document.getElementById("sucessmsg").style.display="none"; }, 5000);</script>';
    echo '<div id="sucessmsg" class="alert alert-success">'.$_COOKIE['success'].'</div>';

}
if (isset($_COOKIE['error'])){
    echo ' <script>setTimeout(function(){ document.getElementById("errormsg").style.display="none"; }, 5000);</script>';
    echo '<div  id="errormsg" class="alert alert-danger">'.$_COOKIE['error'].'</div>';

}
if (isset($_COOKIE['info'])){
    echo ' <script>setTimeout(function(){ document.getElementById("infomsg").style.display="none"; }, 5000);</script>';
    echo '<div  id="infomsg" class="alert alert-info">'.$_COOKIE['info'].'</div>';

}
?>