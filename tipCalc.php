<!DOCTYPE html>
<html>
    <head>
        <title>Tip Calculator</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id='container'>
            <h1>Tip Calculator</h1>
            <?php if (isset($_POST['subtotal'])){
                $subtotal = $_POST['subtotal'];
              }
            else{
              $subtotal = 0;
            } ?>
            <form method='POST' action='tipCalc.php'>
                <p id="subtotal">Bill subtotal: $
                    <?php

                        echo "<input type='text' id='textbox' name='subtotal' value='{$subtotal}' />";
                    ?>
                </p>

                <p>Tip Percentage: </p>
                <p>
                    <?php
                    if (isset($_POST['percentage'])){
                        $percentage = $_POST['percentage'];
                      }
                      for ($percent_Value = 10; $percent_Value <= 20; $percent_Value+=5) {
                          //adds radio button for the different percentage
                          echo "<input type='radio' name='percentage' value='{$percent_Value}' ";
                          if ($percentage == $percent_Value) echo "checked";
                          echo "/> {$percent_Value}% ";
                      }
                    ?>
                </p>
                <input id="submit" type='submit' value='Submit'>
            </form>
            <div id="result">
                <?php
                    $tip = intval($percentage) * $subtotal * 0.01;
                    $total = $subtotal + $tip;
                    echo "<p>Tip: $".sprintf("%0.2f", $tip)."</p>";
                    echo "<p>Total: $".sprintf("%0.2f", $total)."</p>";
                    if (!is_numeric($subtotal) || $subtotal < 0 || $subtotal == '') {
                      echo "
                        <style type='text/css'>
                            #subtotal {color: red; font-weight: bold;}
                            #result {display: none;}
                        </style>$subtotal=0";

                    } else {
                        echo "
                        <style type='text/css'>
                            #subtotal {color: black; font-weight: regular;}
                            #result {display: block;}
                        </style>";
                    }
                ?>
            </div>

        </div>

    </body>
</html>
