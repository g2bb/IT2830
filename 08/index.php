<!DOCTYPE html>
<html>
    <!--
        name: Joe Hays
        pawprint: JCH432
        date: 10/24/2019
        Challenge PHP
    -->
<head>
	<title>First PHP</title>
	<link rel="stylesheet" href="css.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js.js"></script>
</head>
<body onload="ShowVars()">
    <div class="container">
        <h1 class="header">PHP Challenge</h1>
        <div class="form">
            <h2>Form Section</h2>
            <?php
                function getParam($key){    
                    switch (true) {
                    case isset($_GET[$key]):
                        return $_GET[$key];
                    case isset($_POST[$key]):
                        return $_POST[$key];
                    }
                }

                $DDChoices = getParam("DDChoices");
            ?>
            
            <select name="DDChoices" id="DDChoices" class="dropdown" onchange="ShowVars()">
                <option <?php if (isset($DDChoices) && $DDChoices=="1") echo "selected";?> value="1">Select a Function</option>
                <option <?php if (isset($DDChoices) && $DDChoices=="2") echo "selected";?> value="2">Name</option>
                <option <?php if (isset($DDChoices) && $DDChoices=="3") echo "selected";?> value="3">Hamming Number</option>
                <option <?php if (isset($DDChoices) && $DDChoices=="4") echo "selected";?> value="4">Anagram Finder</option>
                <option <?php if (isset($DDChoices) && $DDChoices=="5") echo "selected";?> value="5">Hypotenuse Calculator</option>
            </select>

            <div class="Values" id="Values">
                <div id="Name">
                    <form action="index.php" method="post">
                        <div class="ValRow TwoWide">
                            <input type="text" name="fName" placeholder="First Name">
                            <input type="text" name="lName" placeholder="Last Name">
                            <input type="hidden" name="DDChoices" value="2">
                        </div>
                        <div class="ValRow TwoWide">
                            <input class="submit" type="submit" value="Submit">
                            <input class="clear" type="submit" value="Clear" formnovalidate onclick="ResetResult(fName, lName)">
                        </div>
                    </form>

                    <p class="center Display">
                        <?php
                            if ($_POST["fName"] != NULL && $_POST["lName"] != NULL){
                                echo "Hi " . $_POST["fName"] . " " . $_POST["lName"] . ", welcome to my PHP practice project.";
                            } else {
                                echo "Sorry, but all fields are required";
                            }
                        ?>
                    </p>
                </div>
                <div id="Hamming">
                    <form action="index.php" method="get">
                        <div class="ValRow OneWide">
                            <input type="number" name="HammingInput" placeholder="Provide a number">
                            <input type="hidden" name="DDChoices" value="3">
                        </div>
                        <div class="ValRow TwoWide">
                            <input class="submit" type="submit" value="Submit">
                            <input class="clear" type="submit" value="Clear" formnovalidate onclick="ResetResult(HammingInput)">
                        </div>
                    </form>
                    
                    <p class="center Display">
                        <?php
                            function is_hamming($x) {
                                if ($x == 1){
                                    return "is";
                                }
                                if ($x % 2 == 0){
                                    return is_hamming($x/2);
                                }
                                if ($x % 3 == 0){
                                    return is_hamming($x/3);
                                  }
                                if ($x % 5 == 0){
                                    return is_hamming($x/5);
                                }	
                                return "is not";
                            }
                        
                            if ($_GET["HammingInput"] != NULL){
                                echo "The provided number " . is_hamming($_GET["HammingInput"]) . " a Hamming Number!";
                            } else {
                                echo "Sorry, but all fields are required";
                            }
                        ?>
                    </p>
                </div>
                <div id="Anagram">
                    <form action="index.php" method="get">
                        <div class="ValRow TwoWide">
                            <input type="text" name="fWord" placeholder="First Word">
                            <input type="text" name="sWord" placeholder="Second Word">
                            <input type="hidden" name="DDChoices" value="4">
                        </div>
                        <div class="ValRow TwoWide">
                            <input class="submit" type="submit" value="Submit">
                            <input class="clear" type="submit" value="Clear" formnovalidate onclick="ResetResult(fWord, sWord)">
                        </div>
                    </form>
                    
                    <p class="center Display">
                        <?php
                            function is_anagram($string_1, $string_2) { 
                                if (count_chars($string_1, 1) == count_chars($string_2, 1)) 
                                    return ''; 
                                else 
                                    return 'not';        
                            }
                        
                            if ($_GET["fWord"] != NULL && $_GET["sWord"] != NULL){
                                echo "The provided strings are " . is_anagram($_GET["fWord"], $_GET["sWord"]) . " an anagram!";
                            } else {
                                echo "Sorry, but all fields are required";
                            }
                        ?>
                    </p>
                </div>
                <div id="Hypotenuse">
                    <form action="index.php" method="get">
                        <div class="ValRow TwoWide">
                            <input type="number" name="fLeg" placeholder="First Leg">
                            <input type="number" name="sLeg" placeholder="Second Leg">
                            <input type="hidden" name="DDChoices" value="5">
                        </div>
                        <div class="ValRow TwoWide">
                            <input class="submit" type="submit" value="Submit">
                            <input class="clear" type="submit" value="Clear" formnovalidate onclick="ResetResult(fLeg, sLeg)">
                        </div>
                    </form>
                    
                    <p class="center Display">                       
                        <?php
                            if ($_GET["fLeg"] != NULL && $_GET["sLeg"] != NULL){
                                echo "Hypotenuse of this triangle is: " . round(hypot($_GET["fLeg"], $_GET["sLeg"]), 2);
                            } else {
                                echo "Sorry, but all fields are required";
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <h2>PHP Request Simulation Section</h2>
        <p class="center">Physically type '?function=showPicture' in the URL after the .php extension to simulate a PHP request!</p>
        <?php
            switch($_GET['function']) {
            case 'showPicture':
                showPicture();
            }
    
            function showPicture(){
                echo '<div class="picDiv"><img src="cool.gif" alt="Cool gif" class="showPicture"><a href="index.php" class="picClear">Clear Simulation</a></div>';
            }
        ?>

                
    </div>
</body>
</html>