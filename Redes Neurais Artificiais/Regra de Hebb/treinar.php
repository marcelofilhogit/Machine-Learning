<?php
    session_start();

    if(isset($_POST['saida1'])){
        $saida1 = $_POST['saida1'];
    } else {
        $saida1 = -1;
    }

    if(isset($_POST['saida2'])){
        $saida2 = $_POST['saida2'];
    } else {
        $saida2 = -1;
    }

    if(isset($_POST['saida3'])){
        $saida3 = $_POST['saida3'];
    } else {
        $saida3 = -1;
    }

    if(isset($_POST['saida4'])){
        $saida4 = $_POST['saida4'];
    } else {
        $saida4 = -1;
    }

    function regraDeHebb($saida1, $saida2, $saida3, $saida4){
        $x1 = array(-1,-1,1,1);
        $x2 = array(-1,1,-1,1);
        $t = array($saida1, $saida2, $saida3, $saida4);
        $delW1 = array($x1[0]*$t[0], $x1[1]*$t[1], $x1[2]*$t[2], $x1[3]*$t[3]);
        $delW2 = array($x2[0]*$t[0], $x2[1]*$t[1], $x2[2]*$t[2], $x2[3]*$t[3]);
        $delB = $t;
        $w1 = 0;
        $w2 = 0;
        $b = 0;

        for($i=0; $i<4; $i++){
            $w1 += ($delW1[$i] + $w1[$i]);
            $w2 += ($delW2[$i] + $w2[$i]);
            $b += ($delB[$i] + $b[$i]);
        }

        $_SESSION['$W1'] = $w1;
        $_SESSION['$W2'] = $w2;
        $_SESSION['$b']  =  $b;

        $_SESSION['$saida1'] = $saida1;
        $_SESSION['$saida2'] = $saida2;
        $_SESSION['$saida3'] = $saida3;
        $_SESSION['$saida4'] = $saida4;

        testar($x1, $delW1, $delB);

        header('Location: index.php');
    }


    function testar($x1, $delW1, $delB) {
        $net = array();

        for($i=0; $i<4; $i++){
            $netTemp = ($x1[$i] * $delW1[$i]) + $delB[$i];

            if($netTemp >= 0){
                $net[] .= 1;
            } else {
                $net[] .= -1;
            }
        }

        $_SESSION['net'] = $net;

    }

    regraDeHebb($saida1, $saida2, $saida3, $saida4);
?>
