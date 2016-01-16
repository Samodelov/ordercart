<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Order</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

<link rel="stylesheet" type="text/css" href="/css/style.css">

<script type="text/javascript" src="https://yastatic.net/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" rel="prefetch" src="/js/simpleCart.js"></script>


<script type="text/javascript">simpleCart.cartHeaders = ["name", "article" , "price" , "quantity", "total" ]</script>
</head><body>


<div id="main" role="main"><article>

<h1>Оформление заявки на поставку запчастей</h1>

<form action="/sendcart.php" method='post'>
<table id="final">
<tr><th>#</th><th>артикул</th><th>наименование</th><th>цена</th><th>количество</th></tr>
<?php 
for($i=0; $i< $_POST['itemCount']; $i++){ ?>
<?php
  $title = htmlspecialchars($_POST['item_name_'. ($i+1)]);
  $article = htmlspecialchars($_POST['item_op_article_'. ($i+1)]);
  $price = htmlspecialchars($_POST['item_price_'. ($i+1)]);
  $quantity = htmlspecialchars($_POST['item_quantity_'. ($i+1)]);
?>
<tr><td>
	<?=$i+1?>
	<input type="hidden" name="title[]" value="<?=$title?>" />
	<input type="hidden" name="article[]" value="<?=$article?>" />
	<input type="hidden" name="price[]" value="<?=$price?>" />
	<input type="hidden" name="quantity[]" value="<?=$quantity?>" />
</td><td><?=$article?></td><td><?=$title?></td><td><?=$price?></td><td><?=$quantity?></td></tr>
<?php
}
?>
</table>


<div id='form'>
<label>Компания / Ф.И.О.:</label><input name='name' type='text' required  /> 
<label>Город, район, область:</label><input name='city' type='text' required />
<label>Адрес доставки:</label><input name='address' type='text' required />
<label>Ваш е-mail:</label><input name='email' type='email' required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}"  />
<label>Контактный телефон:</label><input name='tel' type='tel' required pattern="(\+?\d[- .]*){5,13}"  />
<textarea name='comments' placeholder="Примечания, дополнительная информация."></textarea>
<input type='submit' value='Отправить заказ' onClick="emailCheckout(this.form)">
</div>
</form>



</article></div><div class="clearing"></div><footer></footer></body></html>