
<!DOCTYPE html>
<html>
<title>UCSB HGC</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../stylesheets/style.css">
<style>


html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:2400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third" style="max-width:150px">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
		<?php echo $sidebar?>
		
          
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-rest" >
    
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom" style="max-width:2000px">
        
		<?php echo $header.$column_names.$attributes;?>      
	
			
<div class="w3-container">
	
        </div>
      </div>


    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>



</body>
</html>

