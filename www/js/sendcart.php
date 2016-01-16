<?php
$to = 'alsu.fatxullina@mail.ru'; 

if ( $_SERVER['REQUEST_METHOD']=='POST' )
complete_mail($to);

function complete_mail($to) {

$name =  substr(htmlspecialchars(trim($_POST['name'])), 0, 500);
$city =  substr(htmlspecialchars(trim($_POST['city'])), 0, 500);
$address =  substr(htmlspecialchars(trim($_POST['address'])), 0, 1500);
$email =  substr(htmlspecialchars(trim($_POST['email'])), 0, 150);
$tel =  substr(htmlspecialchars(trim($_POST['tel'])), 0, 25);
$comments =  substr(htmlspecialchars(trim($_POST['comments'])), 0, 20000);
$content.=" <ul><li>$name <li>$city <li>$address<li>$email <li>$tel <li>$comments </ul> ";
    
$content.='<br><hr><br>';
    
    foreach ( $_POST as $k => $v ){
     if( strncmp($k,"name_",5)==0){
     $title='Наименование';
     }elseif( strncmp($k,"article_",8)==0){
     $title='Артикул';
	}elseif( strncmp($k,"quantity_",9)==0){
     $title='Количество';
    }elseif( strncmp($k,"price_", 6)==0){
     $title='Цена';
    }
    else{
        continue;
    }
      
$content.= $v." \r\n ";

    }    
    $content.="</hr>";
   
    $subject = 'Заказ с сайта ' .$_SERVER['SERVER_NAME'];
    $headers="Content-Type: text/html; charset=windows-1251\r\n";
    $headers .= "From: <".$email.">\r\n"; 
    mail($to, $subject, $content,  $headers);
        
    header('Location: /done.html');
}
?>

