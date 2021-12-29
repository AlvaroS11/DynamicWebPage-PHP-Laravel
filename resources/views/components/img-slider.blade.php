@props(['post'])
<div style="max-width:800px">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
     <?php    
     $count = 0; 
     $output = ''; 
     $all = $post->imgs;
     ?>
       
     <?php
        if($all->count()){
         foreach ($all as $img) {        
          ?>
           <img src=" {{asset('storage/postImages/'. $img->file_path )}}" alt="POST IMG" style="width:100%" height="100px" class="slides">
          <?php
          }
        ?>
        <br>
           <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
        <?php
          }
        ?>
      </div>
     

     <script>
      var slideIndex = 1;
      showDivs(slideIndex);
      
      function plusDivs(n) {
        showDivs(slideIndex += n);
      }
      
      function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("slides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
        }
        x[slideIndex-1].style.display = "block";  
      }
      </script>
 
 