<?php

function calculerMoyenne($a, $b, $c) {
    return ($a + $b + $c) / 3;
}

function afficherResultat($nom, $moyenne) {
    if ($moyenne >= 10) {
        return "La moyenne est suffisante, $nom a $moyenne";
    } 
    return "La moyenne est insuffisante, $nom a $moyenne";
}

echo calculerMoyenne(15, 20, 18) . "<br>";
echo calculerMoyenne(3, 8, 5) . "<br>";
echo calculerMoyenne(4, 20, 0) . "<br>";
echo afficherResultat('Alice', 15.8)
?>