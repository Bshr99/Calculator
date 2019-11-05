<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eindopdracht2</title>

        <link rel="stylesheet" type="text/css" href="css22/style.css">
</head>
        <body>
        <?php
        // Variables
        $num1 = 0;
        $num2 = 0;
        $totaal = 0;
        $operator = "";
        $error = "";
        // Default decimale
        $precision = 2;

        if(isset($_POST['submit'])) 
        {
            $num1 = $_POST['number_one'];
            $num2 = $_POST['number_two'];
            $operator = $_POST['operator'];

        // let user choose how many decimals he wants.
        if(is_numeric($_POST['sliderDecimals']))
        {
            $precision = $_POST['sliderDecimals'];
        }
        // display error when num1 and num2 are empty.  
        if (empty($num1) && empty($num2))       
        {
            $error = "Typ a number in!";
        }
      
        // check number values.
        else if(is_numeric($num1) && is_numeric($num2))
        {
            if ($operator == 'plus')
            {
                $totaal = $num1 + $num2;
            } 
            if ($operator == 'multiply')
            {
                $totaal = $num1 * $num2;
            }
            if ($operator == 'min')
            {
                 $totaal = $num1 - $num2;
            }
            if ($operator == 'divide')               
            {
                if($num2 == 0)
                {
                    $error = "You can't divide by 0";
                }
                else
                {
                    $totaal = $num1 / $num2;
                }
            }

            if ($operator == 'power')
            {
                $totaal = pow($num1,$num2);
            }
        }

                
            else if (is_numeric($num1))
            {
            if($operator == 'sqrt')
            {
                if($num1 < 0)
                {
                    $error = "You cant use negative numbers!";
                }
                else
                {
                    $totaal = sqrt($num1);
                }

            }
            }
        }
                            
        ?>

        <div class="container">
        <div class="top-part">  
        <?php

        if($error != "")
        {
            echo $error;
        }
        else
        {
            $totaal = round($totaal, $precision);
            echo '<span class="topanswer">'.$totaal.'</span>';
        }

        ?>

        <div class="bottom-part">
        <form method = "post" action="">
            <ul>
                <li>
                <label >Number 1</label>
                <input name="number_one" class="input-numbers" type="number" value="" placeholder="your first number">
                </li>
                    <li>                
                        <label>operator</label>
                        <select name="operator" id="operator-list">
                        <option value="plus">+</option>
                        <option value="min">-</option>
                        <option value="multiply">*</option>
                        <option value="divide">/</option>
                        <option value="power">power</option>
                        <option value="sqrt">roots</option>
                        </select>
                    </li>

                    <li id="second-input" >
                    <label>Number 2</label>
                    <input name="number_two" class="input-numbers" type="number" value=""
                    placeholder="Your second number">
                    </li>

                        <li>
                        <label>Decimals:</label>
                        <input id="decimals-input" class="input-numbers" type="text" name="sliderDecimals" placeholder="How many decimals?" />
                        <input id="decimals-slider" class="range-slider" type="range" min="1" max="10" step="1" value="1">
                        </li>

                        <li>
                        <input class="btn-calculate" name="submit" type="submit" value="Calculate">
                        <input class="btn-reset" name="submit" type="reset" value="Reset">
                        </li>

            </ul>
</form>
</div>

            <script type="text/javascript">
            let decimalSlider = document.getElementById("decimals-slider");
            let decimalsInput = document.getElementById("decimals-input");
                decimalSlider.oninput = function(){
                decimalsInput.value = this.value;
            console.log(decimalsInput.value);
            }
            console.log(decimalsInput.value);
            </script>

            <script type="text/javascript">
            //hide second input
            let operatorlist = document.getElementById("operator-list");
            let secondInput = document.getElementById("second-input");
            operatorlist.oninput = function(){

            let selectedOperator = this.value;
                if(selectedOperator == "sqrt"){
                    secondInput.style.display = "none";
                }else {
                    secondInput.style.display = "block";
                }
            }
            </script>
            
</body>
</html>