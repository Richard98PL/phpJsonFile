<?php
function galeria($rows, $cols){
    $pictureName="obraz";
    $pictureNumber=1;
    for($i=0;$i<$rows;$i++){
        for($j=0;$j<$cols;$j++){
            print(" <img src='obrazki/$pictureName$pictureNumber.JPG' alt='$pictureName'/>");
            $pictureNumber++;
        }
        print("<br />");
    }
}
galeria(2,4);
?>

