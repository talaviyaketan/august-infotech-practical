<?php 

/* Template Name: Charcter Limit With the Counter */

get_header();
?>


<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
  
    <script>
        $(document).ready(function () {
            var max_length = 50;
            $('textarea').keyup(function () {
                var len = max_length - $(this).val().length;
                $('.GFG').text(len);
            });
  
        });
    </script>

<form>
          
<p>Maximum input characters: 50</p>
<textarea maxlength="50"></textarea>        
<p><span class="GFG">50</span>Characters Remaining</p>
</form>

<?php
get_footer();

?>