<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Datetimepicker</title>

     <!-- CRUD C CREATE R RETRIEVE U UPDATE D DELETE BORRAR  -->
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
    <!-- dtp abre --> 
       <link rel="stylesheet" href="../../css/bootstrap.min.css" />
       <link rel="stylesheet" href="../../css/bootstrap-datepicker.min.css" />
       <script src="../../js/jquery.min.js"></script>
       <script src="../../js/bootstrap-datepicker.min.js"></script>
    <!-- dtp cierre -->  
    <script>
        $( document ).ready(function() {
			// el nombre #Fecha viene de la propiedad id del objeto input
        $('#Fecha').datepicker({ format: 'yyyy-mm-dd' , todayHighlight: true, orientation: "bottom right" , autoclose: true});
			
        });
		
	</script>

      <script>
        $( document ).ready(function() {
      // el nombre #Fecha viene de la propiedad id del objeto input
        $('#Fecha1').datepicker({ format: 'yyyy-mm-dd' , todayHighlight: true, orientation: "bottom right" , autoclose: true});
      
        });
    
  </script>
   		    </head>
	<body>
<p><br></br></p>
<div class="container">
<form method="post">     
     <div class="form-group">
     	<div class="hero-unit">
         <label for="fa">Fecha</label>
       <input type="text" id="Fecha" name="Fecha" class="form-control" placeholder="Agrega una Fecha"> 
        </div>
     </div> 
     <p><br></br></p>
<div class="container">
<form method="post">     
     <div class="form-group">
      <div class="hero-unit">
         <label for="fa">Fecha</label>
       <input type="text" id="Fecha" name="Fecha1" class="form-control" placeholder="Agrega una Fecha"> 
        </div>
     </div>        
     <button type="submit" class="btn btn-success">Guardar</button>
</form>
</div>            
	</body>
</html>