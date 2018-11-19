<?php
session_start();

include "db.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM tbl_categoria";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categorias</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cat_name = $row["nombre"];
			$cid = $row["id_categoria"];
			$id= $row['id'];
			echo "
					<li><a href='#' class='category' cid='$id'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}

if(isset($_POST["page"])){
	$sql = "SELECT * FROM tbl_productos";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM tbl_productos LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_clave    = $row['sku'];
			$pro_nombre   = $row['nombre'];
			$pro_descripcion = $row['descripcion'];
			$pro_image = $row['imagen'];
			$pro_stock = $row['stock'];
			$pro_price = $row['precio'];
			$pro_id= $row['id'];
			$pro_fkcategoria= $row['fk_categoria'];
		
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_nombre</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								
								<div class='panel-heading'>$.$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Añadir al carrito</button>
								</div>
							</div>
						</div>	
			";
		}
	}
}
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["id_categoria"];
		$sql = "SELECT * FROM tbl_productos WHERE fk_categoria = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
		$pro_clave    = $row['sku'];
		$pro_nombre   = $row['nombre'];
		$pro_descripcion = $row['descripcion'];
		$pro_image = $row['imagen'];
		$pro_stock = $row['stock'];
		$pro_price = $row['precio'];
		$pro_id= $row['id'];
	
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_nombre</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$.$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Añadir a la cesta</button>
								</div>
							</div>
						</div>	
			";
		}
	}
									
	if(isset($_POST["addToProduct"])){
		
		if(isset($_SESSION["uid"])){
			$p_id = $_POST["proId"];
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>El producto ya está agregado al carrito Continuar comprando..!</b>
				</div>
			";//not in video
		} else {
			$sql = "SELECT * FROM tbl_productos WHERE id = '$p_id'";
			$run_query = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($run_query);
				//$id = $row["product_id"];
				$pro_descripcion = $row['descripcion'];
			    $pro_id= $row['id'];
			    $pro_image = $row['imagen'];
				$pro_price = $row['precio'];
				$pro_stock = $row['stock'];
			
			$sql = "INSERT INTO `cart` 
			(`id`, `p_id`, `ip_add`, `user_id`, `product_title`,
			`product_image`, `qty`, `price`, `total_amt`)
			VALUES (NULL, '$p_id', '0', '$user_id', '$pro_descripcion', 
			'$pro_image', '1', '$pro_price', '$pro_price')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Producto agregado..!</b>
					</div>
				";
			}
		}
		}else{
			echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Lo siento ..! Ir y Registrarse Primero, entonces puedes agregar un producto a tu carrito</b>
					</div>
				";
		}
		
		
		
		
	}
if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){
	$uid = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$uid'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$no = 1;
		$total_amt = 0;
		while($row=mysqli_fetch_array($run_query)){
			$id = $row["id"];
			$pro_id = $row["p_id"];
			$pro_name = $row["product_title"];
			$pro_image = $row["product_image"];
			$qty = $row["qty"];
			$pro_price = $row["price"];
			$total = $row["total_amt"];
			$price_array = array($total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			setcookie("ta",$total_amt,strtotime("+1 day"),"/","","",TRUE);
			if(isset($_POST["get_cart_product"])){
				echo "
				<div class='row'>
					<div class='col-md-3 col-xs-3'>$no</div>
					<div class='col-md-3 col-xs-3'><img src='product_images/$pro_image' width='60px' height='50px'></div>
					<div class='col-md-3 col-xs-3'>$pro_name</div>
					<div class='col-md-3 col-xs-3'>$.$pro_price.00</div>
				</div>
			";
			$no = $no + 1;
			}else{
				echo "
					<div class='row'>
							<div class='col-md-2 col-sm-2'>
								<div class='btn-group'>
									<a href='#' remove_id='$pro_id' class='btn btn-danger btn-xs remove'><span class='glyphicon glyphicon-trash'></span></a>
									<a href='' update_id='$pro_id' class='btn btn-primary btn-xs update'><span class='glyphicon glyphicon-ok-sign'></span></a>
								</div>
							</div>
							<div class='col-md-2 col-sm-2'><img src='product_images/$pro_image' width='50px' height='60'></div>
							<div class='col-md-2 col-sm-2'>$pro_name</div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
						</div>
				";
			}
				
		}
		if(isset($_POST["cart_checkout"])){
			echo "<div class='row'>
				<div class='col-md-8'></div>
				<div class='col-md-4'>
					<h1>Total $$total_amt</h1>
				</div>";
		}
		echo '
		
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				  <input type="hidden" name="cmd" value="_cart">
				  <input type="hidden" name="business" value="shoppingcart@khanstore.com">
				  <input type="hidden" name="upload" value="1">';
				  
				  $x=0;
				  $uid = $_SESSION["uid"];
				  $sql = "SELECT * FROM cart WHERE user_id = '$uid'";
				  $run_query = mysqli_query($con,$sql);
				  while($row=mysqli_fetch_array($run_query)){
					  $x++;
				 echo  '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
				  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
				  <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
				  <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
				  
				  }
				  
				echo   '
				<input type="hidden" name="return" value="http://www.sysc.esy.es/shoppingCart/payment_success.php"/>
				<input type="hidden" name="cancel_return" value="http://www.sysc.esy.es/shoppingCart/cancel.php"/>
				<input type="hidden" name="currency_code" value="USD"/>
				<input type="hidden" name="custom" value="'.$uid.'"/>
				<input style="float:right;margin-right:80px;" type="image" name="submit"
					src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
					alt="PayPal - The safer, easier way to pay online">
				</form>';
		
		
		
		
	}
}

if(isset($_POST["cart_count"]) AND isset($_SESSION["uid"])){
	$uid = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$uid'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST["removeFromCart"])){
	$pid = $_POST["removeId"];
	$uid = $_SESSION["uid"];
	$sql = "DELETE FROM cart WHERE user_id = '$uid' AND p_id = '$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>El producto se retira del carrito Continuar comprando..!</b>
			</div>
		";
	}
}

if(isset($_POST["updateProduct"])){
	$uid = $_SESSION["uid"];
	$pid = $_POST["updateId"];
	$qty = $_POST["qty"];
	$price = $_POST["price"];
	$total = $_POST["total"];
	
	$sql = "UPDATE cart SET qty = '$qty',price='$price',total_amt='$total' 
	WHERE user_id = '$uid' AND p_id='$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>El producto está actualizado Continuar comprando..!</b>
			</div>
		";
	}
}
?>






























