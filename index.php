<?php
$json = file_get_contents("data.json");
$data = json_decode($json, true);
//echo '<pre>' . print_r($data, true) . '</pre>';
?>

<!DOCTYPE html>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $data["page_meta"]["title"];?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $data['page_meta']['meta_description'];?>">
    <meta name="keywords" content="<?php echo $data['page_meta']['meta_keywords'];?>">
    <!-- <link rel="stylesheet" href="assets/css/normalize.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/css/style.css">  -->
  </head>
  <body>	

	  <div class="container mt-2">
		<div class="row">
		  <div class="col">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
				  <ul class="navbar-nav">
					<?php foreach ($data["nav"] as $key => $value) { ?>
					<li class="nav-item">
					  <a class="nav-link" href="<?php echo $value['href'];?></a>"><?php echo $value["text"];?></a>
					</li>
					<?php }?>
				  </ul>
				</div>
			  </nav>
		  </div>
		</div>
	  </div> 
	  
	   <div class="container my-3">
		<div class="row">
		  <div class="col">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<?php foreach ($data["breadcrumbs"] as $key => $value) { ?>
						<li class="breadcrumb-item"><a href="<?php echo $value['href'];?>"><?php echo $value["text"];?></a></li>
						<?php }?>
				</ol>
			  </nav>
		  </div>
		</div>
	  </div>
	  
	   <div class="container mb-2">
		<div class="row">
		  <div class="col">
			  <h1 class="text-center"><?php echo $data["page_meta"]["h1"];?></h1>
		  </div>
		</div>
	  </div>
	  
	  
	    <div class="container mb-3">
		<div class="row">
		  <div class="col  border border-dark rounded pt-2">
			<form>
				<fieldset class="form-group row i-group" data-filter-group="vendor">
				  <legend class="col-form-label col-sm-2 float-sm-left pt-0">Vendor</legend>
				  <div class="col-sm-10">
				      	<div class="form-check">
					  <input class="form-check-input a" data-name="*" type="radio" name="gridRadios" id="vendor0" value="ALL" checked>
					  <label class="form-check-label" for="vendor0">
						All
					  </label>
					  	</div>
					<div class="form-check">
					  <input class="form-check-input a" data-name=".daf" type="radio" name="gridRadios" id="vendor1" value="DAF">
					  <label class="form-check-label" for="vendor1">
						DAF
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input a" data-name=".ford" type="radio" name="gridRadios" id="vendor2" value="FORD">
					  <label class="form-check-label" for="vendor2">
						FORD
					  </label>
					</div>
					 </div>
				</fieldset>
				<fieldset class="form-group row i-group" data-filter-group="type">
				  <legend class="col-form-label col-sm-2 float-sm-left pt-0">Type</legend>
				  <div class="col-sm-10">
				      	<div class="form-check">
					  <input class="form-check-input b" data-name="*" type="radio" name="gridRadios1" id="type5" value="all" checked>
					  <label class="form-check-label" for="type">
						All
					  </label>
					  	</div>
				      	<div class="form-check">
					  <input class="form-check-input b" data-name=".swap" type="radio" name="gridRadios1" id="type0" value="swap">
					  <label class="form-check-label" for="type0">
						Container transporter/ swap body truck
					  </label>
					  	</div>
					<div class="form-check">
					  <input class="form-check-input b" data-name=".cab" type="radio" name="gridRadios1" id="type1" value="cab">
					  <label class="form-check-label" for="type1">
						Cab chassis truck
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input b" data-name=".truck" type="radio" name="gridRadios1" id="type2" value="truck">
					  <label class="form-check-label" for="type2">
						Curtainsider truck
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input b" data-name=".box" type="radio" name="gridRadios1" id="type3" value="box">
					  <label class="form-check-label" for="type3">
						Box truck
					  </label>
					</div>
					 </div>
				</fieldset>
				<div class="form-group row">
				  <div class="col-sm-10">
					<button type="button" class="s btn btn-primary">Search</button>
				  </div>
				</div>
			  </form>
		  </div>
		</div>
	  </div>

	  
	   <div class="container mb-2">
		<div class="row justify-content-end">
		  <div class="col text-right">
			<label for="sort">Sort by</label>
			<select class="" id="sort">
			  <option data-name="original-order">not sorted</option>
			  <option data-name="price">price</option>
			  <option data-name="year">year</option>
			</select>
		  </div>
		</div>
	  </div>
    
    
<div class="container mb-5">
		<div class="row cards">
		  
			<?php foreach ($data["stock"] as $key => $value) { ?>
			<div class="<?php if ($value['make'] === 'DAF') {echo 'daf ';} if ($value['make'] === 'FORD') {echo 'ford ';} if ($value['type'] === 'Container transporter/ swap body truck') {echo 'swap ';} if ($value['type'] === 'Cab chassis truck') {echo 'cab ';} if ($value['type'] === 'Curtainsider truck') {echo 'truck ';}  if ($value['type'] === 'Box truck') {echo 'box ';} ?>card w-100 mb-3 flex-grow-1">
				<div class="row no-gutters">
				  <div class="col-md-4">
				      <a class="d-block" href="<?php echo $value['href'];?>">
					<img class="img-fluid" src="images/<?php echo $value['image'];?>" alt="img">
				  </a>
				  </div>
				  <div class="col-md-8">
					<div class="card-body">
					  <h5 class="card-title"><?php echo $value['title'];?></h5>
					  <p class="card-text">Price: <span class="text-primary price"><?php echo $value["price"];?></span> <span><?php echo $value["price_currency"];?></span></p>
					  <p class="card-text"><small class="text-muted">Vendor: <?php echo $value["make"];?></small></p>
					  <p class="card-text text-info">Model: <?php echo $value["model"];?></p>
					  <p class="card-text text-muted">Type: <?php echo $value["type"];?></p>
					  <p class="card-text">Year: <span class="year"><?php echo $value["year"];?></span></p>
					  <p class="card-text">Mileage: <span class=""><?php echo $value["mileage"];?></span> <span><?php echo $value["mileage_measure"];?></span></p>
					  <p class="card-text">Axle configuration: <?php echo $value["axle_configuration"];?></p>
					  <p class="card-text">Power: <span class=""><?php echo $value["power"];?></span> <span><?php echo $value["power_measure"];?></span></p>
					  <p class="card-text text-info">Payload: <?php echo $value["payload"];?></p>
					  <p class="card-text">Gross weight: <?php echo $value["gross_weight"];?></p>
					</div>
				  </div>
				</div>
			  </div>
			<?php }?>
		</div>
	  </div>		

    <div class="container">
		<div class="row">
		  <div class="col">
			<?php foreach ($data["page_text"] as $key => $value) { ?>
				<p><?php echo $value["content"];?></p>
				<?php }?>
		  </div>
		</div>
	  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="isotope.pkgd.min.js"></script>
<script src="main.js"></script>
  </body>
</html>