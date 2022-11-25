<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>please Hire me :)</title>
    <meta http-equiv="cache-control" content="no-cache" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <script defer src="../assets/js/moj.js"> </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <div class="container kontejner1">
 <form class="forma" method="POST" action="/createData">
  <label for="Serbia" >From 1 to 5 how would you rate Serbia  </label>
  <select id="Serbia" name="Serbia" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>

<label for="Kipar" >From 1 to 5 how would you rate Kipar  </label>
  <select id="Kipar" name="Kipar" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>

<label for="Malta" >From 1 to 5 how would you rate Malta  </label>
  <select id="Malta" name="Malta" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>

<label for="Italia" >From 1 to 5 how would you rate Italia  </label>
  <select id="Italia" name="Italia" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>

<label for="Island" >From 1 to 5 how would you rate Island  </label>
  <select id="Island" name="Island" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>

</div>

<div class="container kontejner2 nevidljiv">
 
  <label for="Portugal" >From 1 to 5 how would you rate Portugal  </label>
  <select id="Portugal" name="Portugal" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>

<label for="Andora" >From 1 to 5 how would you rate Andora  </label>
  <select id="Andora" name="Andora" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>

<label for="Spain" >From 1 to 5 how would you rate Spain  </label>
  <select id="Spain" name="Spain" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>

<label for="France" >From 1 to 5 how would you rate France  </label>
  <select id="France" name="France" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>

<label for="Greece" >From 1 to 5 how would you rate Greece  </label>
  <select id="Greece" name="Greece" class="form-control form-select">
  <option value="0" name="0">0</option>
  <option value="1" name="1">1</option>
  <option value="2" name="2">2</option>
  <option value="3" name="3">3</option>
  <option value="4" name="4">4</option>
  <option value="5" name="5">5</option>
</select>
</div>

<button style="margin-left:42rem; margin-bottom:4rem; border:1px solid red" type="submit" name="submit"> submit </button>


</form>

 


<div class="centrirani"><button class="dugme dugme1">1</button ><button class="dugme dugme2">2</button></div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script >$(".tab").click(function(){

  $(this).parent().find(".tab").removeClass("activeTab");
  $(this).addClass("activeTab");
});</script>

  </body>
</html>
