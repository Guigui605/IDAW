<?php
    //if(isset($_COOKIE['style'])){
    //    echo("<link rel=\"stylesheet\" href=\"style".$_COOKIE['style'].".css\" type=\"text/css\" media=\"screen\" title=\"default\" charset=\"utf-8\" />");
    //}
    //else if(isset($_GET['css'])){
    //    setcookie('style',$_GET['css']);
    //    echo("<link rel=\"stylesheet\" href=\"style".$_GET['css'].".css\" type=\"text/css\" media=\"screen\" title=\"default\" charset=\"utf-8\" />");
    //}
?>


<!doctype html>
<html>
<head>
    <?php
        if(isset($_COOKIE['style'])){
            echo("<link rel=\"stylesheet\" href=\"".$_COOKIE['style'].".css\" type=\"text/css\" media=\"screen\" title=\"default\" charset=\"utf-8\" />");
        }
        if(isset($_GET['css'])){
            setcookie('style',$_GET['css']);
            echo("<link rel=\"stylesheet\" href=\"".$_GET['css'].".css\" type=\"text/css\" media=\"screen\" title=\"default\" charset=\"utf-8\" />");
        }
    ?>
</head>
<body>
    <form id="style_form" action="index.php" method="GET">
        <select name="css">
            <option value="style1">style1</option>
            <option value="style2">style2</option>
        </select>
        <input type="submit" value="Appliquer" />
    </form>
</body>
</html>