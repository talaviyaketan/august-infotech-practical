<?php 

/* Template Name: Delete Child */

get_header();
?>


<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
  
    <script>
        $(document).ready(function () {
            $("#exercises p").not(':first').remove();
        });
    </script>

<div id="exercises">
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