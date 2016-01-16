<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$to = 'alsu.fatxullina@mail.ru'; 

if ( $_SERVER['REQUEST_METHOD']=='POST' )
complete_mail($to);

function complete_mail($to) {
	
$item_title=$_POST['title'];
$item_price=$_POST['price'];
$item_article=$_POST['article'];
$item_quantity=$_POST['quantity'];


$name =  substr(htmlspecialchars(trim($_POST['name'])), 0, 500);
$city =  substr(htmlspecialchars(trim($_POST['city'])), 0, 500);
$address =  substr(htmlspecialchars(trim($_POST['address'])), 0, 1500);
$email =  substr(htmlspecialchars(trim($_POST['email'])), 0, 150);
$tel =  substr(htmlspecialchars(trim($_POST['tel'])), 0, 25);
$comments =  substr(htmlspecialchars(trim($_POST['comments'])), 0, 20000);
$content=" <ul><li>$name <li>$city <li>$address<li>$email <li>$tel <li>$comments </ul> ";
    
$content.='<br><hr><br>';
    
    for($i=0;$i< count($item_title);$i++){
		$content.=$item_article[$i].'; наименование:'. $item_title[$i]." цена:".$item_price[$i]. " количество:".$item_quantity[$i]."<br>";
		
	}
	
	
    $content.="</hr>";
	
	echo $content;
    /*
    $subject = 'Заказ с сайта ' .$_SERVER['SERVER_NAME'];
    $headers="Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "From: <".$email.">\r\n"; 
    mail($to, $subject, $content,  $headers);
        
    header('Location: /done.html'); */
}
?>

