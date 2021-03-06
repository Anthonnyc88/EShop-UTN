
//Metodo que carga las categorias
$(document).ready(function(){
	cat();
	product();
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
	}
	//Funcion que carga los productos
		function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}
	//Metodo que recibe los parametros de la categoria y el producto relacionado hacia esa categoria
	$("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Cargando Productos...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,id_categoria:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
	
	//Funcion del boton de registro trae los datos del formulario de registro
	$("#signup_button").click(function(event){
		event.preventDefault();
			$.ajax({
			url		:	"register.php",
			method	:	"POST",
			data	:	$("form").serialize(),
			success	:	function(data){ 
				$("#signup_msg").html(data);
			}
		})
		
	})

	//Funcion que valida si es usuario o administrador
	$("#login").click(function(event){
		event.preventDefault();
		var email = $("#email").val();
		var pass = $("#password").val();
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:{userLogin:1,userEmail:email,userPassword:pass},
			success	:function(data){
				if(email != "admin@gmail.com"){ 
					window.location.href = "profile.php";
					//Si es diferente al admnistrador
				}
				else if(email == "admin@gmail.com"){
					window.location.href = "Vista/Admin.php";
					//Validamos para que solo ingrese el administrador
	
				}
			}
		})
	})
	



	cart_count();
	$("body").delegate("#product","click",function(event){
		event.preventDefault();
		var p_id = $(this).attr('pid');
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{addToProduct:1,proId:p_id},
			success	:	function(data){
				$("#product_msg").html(data);
				cart_count();
			}
		})
	})
	cart_container();
	function cart_container(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{get_cart_product:1},
			success	:	function(data){
				$("#cart_product").html(data);
			}
		})
		
	};
	function cart_count(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{cart_count:1},
			success	:	function(data){
				$(".badge").html(data);
			}
		})
	}
	
	$("#cart_container").click(function(event){
		event.preventDefault();
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{get_cart_product:1},
			success	:	function(data){
				$("#cart_product").html(data);
			}
		})
		
	})
	cart_checkout();
	function cart_checkout(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{cart_checkout:1},
			success	: function(data){
				$("#cart_checkout").html(data);
			}
		})
	}
	$("body").delegate(".qty","keyup",function(){
		var pid = $(this).attr("pid");
		var qty = $("#qty-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = qty * price;
		$("#total-"+pid).val(total);
	})

	//Funcion que elimina el producto del carrito de compras
	$("body").delegate(".remove","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("remove_id");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{removeFromCart:1,removeId:pid},
			success	:	function(data){
				$("#cart_msg").html(data);
				cart_checkout();
			}
		})
	})


	//Funcion que modifica la cantidad de producto comprado del carrito
	$("body").delegate(".update","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("update_id");
		var qty = $("#qty-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = $("#total-"+pid).val();
		$.ajax({
			url	:"action.php",
			method	:	"POST",
			data	:	{updateProduct:1,updateId:pid,qty:qty,price:price,total:total},
			success	:	function(data){
				$("#cart_msg").html(data);
				cart_checkout();
			}
		})
	})
	page();

	//Paginacion de la pagina segun la cantidad de articulos agregados por el administrador
	function page(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{page:1},
			success	:	function(data){
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	})
})




















