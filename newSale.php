<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type='text/javascript' src="scripts/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="css/desktop.css">
<title>Venta</title>
<script>

var productDictionary = {};

function loadProduct(code,name,data)
{
	productDictionary[code] = name+'/--/'+data;
}

function controlProduct()
{
	var productFind;
	productFind = productDictionary[code];
	if(productFind != null)
	{
		vProductFind = productFind.split('/--/');
		$('#nameProduct').val(vProductFind[0]);
	}
}

</script>
</head>
<?php

//Aca leo los productos y los guardo en un diccionario - EJ: 0124535161565 : "Agua"

?>
<body>
<input type="text" name="codProduct" id="codProduct" onchange="controlProduct();" onkeyup="addProduct();" />
<input type="text" name="nameProduct" id="nameProduct" disabled="true" />
<input type="text" name="dataProduct" id="dataProduct" disabled="true"/>
</body>
</html>