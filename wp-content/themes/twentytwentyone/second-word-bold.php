<?php 

/* Template Name: Second word bold */

get_header();
?>


<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
  
    <script>
        $(document).ready(function () {
            $(".bold p").each(function () {
                var txt = $(this);

                //var con = txt.text();
                var con = txt.text().split(' ');    

                //txt.text(new[0]);
                $(txt).html(con[0] + " <strong>"+con[1]+"</strong");
            });
        });
    </script>

<div class="bold">
    <p>PHP Exercises</p>
    <p>WordPress Exercises</p>
    <p>Drupal Exercises</p>
    <p>Python Exercises</p>
    <p>.NET Exercises</p>
    <p>Laravel Exercises</p>
    <p>ReactJS Exercises</p>
</div>

<?php
get_footer();

?>