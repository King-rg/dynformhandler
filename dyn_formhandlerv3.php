<script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<?php

//Get input for input codes
(int) $input_codes = $_GET['ic'];

//Declare functions

function ic_handler($ic)
{
    // Full Name - 1
    // DOB - 2
    // 4D SSN - 3 
    // Industry - 4
    // Business Website - 5
    // Email - 6
    // Phone Number - 7
    // Address - 8
    
    if ($ic == 1) {
        echo '
    <h3>Full Name</h3>
    <input type="text" name="name" id="name" placeholder="Name">
    ';
        return 0;
    } else if ($ic == 2) {
        echo '
    <h3>Date of Birth</h3>
    <input type="text" name="dob.day" id="name" placeholder="DD">
    <input type="text" name="dob.month" id="name" placeholder="MM">
    <input type="text" name="dob.year" id="name" placeholder="YYYY">
    ';
        return 0;
    } else if ($ic == 3) {
        echo '
    <h3>Last Four Digits of Social Security Number</h3>
    <input type="text" name="4ssn" id="name" placeholder="1234">
    ';
        return 0;
    } else if ($ic == 4) {
        echo '
    <h3>What Industry Are You In?</h3>
    <input type="text" name="industry" id="name" placeholder="Industry">    
    ';
        return 0;
    } else if ($ic == 5) {
        echo '
    <h3>Business Website</h3>
    <input type="text" name="b_site" id="name" placeholder="Website">
    ';
        return 0;
    } else if ($ic == 6) {
        echo '
    <h3>Email</h3>
    <input type="text" name="email" id="name" placeholder="Email">
    ';
        return 0;
    } else if ($ic == 7) {
        echo '
    <h3>Phone Number</h3>
    <input type="text" name="phone" id="name" placeholder="(###)-###-####">
    ';
        return 0;
    } else if ($ic == 8) {
        echo '
    <h3>Location</h3>
    <input type="text" name="loc.address" id="name" placeholder="Address">
    <input type="text" name="loc.town" id="name" placeholder="Town">
    <input type="text" name="loc.state" id="name" placeholder="State">
    <input type="text" name="loc.country" id="name" placeholder="Country">
    <input type="text" name="loc.post" id="name" placeholder="Postal Code">
    ';
        return 0;
    }
    return 0;
}

//Generate header

$step_count = strlen((string) $input_codes);

if ($step_count > 0) {
    echo '
  <div class="container">
      <div class="wrapper">
        <ul class="steps">
  ';
    $visual_counter = 1;
    for ($i = 0; $i < $step_count; $i++) {
        if ($i == 0) {
            echo '<li class="is-active">Step ' . $visual_counter . '</li>';
            $visual_counter++;
        } else {
            echo '<li>Step ' . $visual_counter . '</li>';
            $visual_counter++;
        }
        
    }
    echo '
        </ul>
        <form class="form-wrapper" action="handler.php" method="get">
  ';
    for ($i = 0; $i < $step_count; $i++) {
        if ($i == 0) {
            echo '
      <fieldset class="section is-active">
      ';
            ic_handler($input_codes[$i]);
            echo '
        <div class="button">Next</div>
      </fieldset>
      ';
        } else {
            echo '
      <fieldset class="section">
      ';
            ic_handler($input_codes[$i]);
            
            if ($i == $step_count - 1) {
                echo '
          <input class="submit button" type="submit" value="Sign Up">
        </fieldset>
        ';
            } else {
                echo '
          <div class="button">Next</div>
        </fieldset>
        ';
            }
        }
    }
    echo '
        </form>
      </div>
  </div>
  ';
}
?>

<style type="text/css">
html, body{
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  font-family: 'Open Sans', sans-serif;
  background-color: #3498db;
}

h1, h2, h3, h4, h5 ,h6{
  font-weight: 200;
}

a{
  text-decoration: none;
}

p, li, a{
  font-size: 14px;
}

fieldset{
  margin: 0;
  padding: 0;
  border: none;
}

/* GRID */

.twelve { width: 100%; }
.eleven { width: 91.53%; }
.ten { width: 83.06%; }
.nine { width: 74.6%; }
.eight { width: 66.13%; }
.seven { width: 57.66%; }
.six { width: 49.2%; }
.five { width: 40.73%; }
.four { width: 32.26%; }
.three { width: 23.8%; }
.two { width: 15.33%; }
.one { width: 6.866%; }

/* COLUMNS */

.col {
	display: block;
	float:left;
	margin: 0 0 0 1.6%;
}

.col:first-of-type {
  margin-left: 0;
}

.container{
  width: 100%;
  max-width: 700px;
  margin: 0 auto;
  position: relative;
}

.row{
  padding: 20px 0;
}

/* CLEARFIX */

.cf:before,
.cf:after {
    content: " ";
    display: table;
}

.cf:after {
    clear: both;
}

.cf {
    *zoom: 1;
}

.wrapper{
  width: 100%;
  margin: 30px 0;
}

/* STEPS */

.steps{
  list-style-type: none;
  margin: 0;
  padding: 0;
  background-color: #fff;
  text-align: center;
}


.steps li{
  display: inline-block;
  margin: 20px;
  color: #ccc;
  padding-bottom: 5px;
}

.steps li.is-active{
  border-bottom: 1px solid #3498db;
  color: #3498db;
}

/* FORM */

.form-wrapper .section{
  padding: 0px 20px 30px 20px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  background-color: #fff;
  opacity: 0;
  -webkit-transform: scale(1, 0);
  -ms-transform: scale(1, 0);
  -o-transform: scale(1, 0);
  transform: scale(1, 0);
  -webkit-transform-origin: top center;
  -moz-transform-origin: top center;
  -ms-transform-origin: top center;
  -o-transform-origin: top center;
  transform-origin: top center;
  -webkit-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  text-align: center;
  position: absolute;
  width: 100%;
  min-height: 300px
}

.form-wrapper .section h3{
  margin-bottom: 30px;
}

.form-wrapper .section.is-active{
  opacity: 1;
  -webkit-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
}

.form-wrapper .button, .form-wrapper .submit{
  background-color: #3498db;
  display: inline-block;
  padding: 8px 30px;
  color: #fff;
  cursor: pointer;
  font-size: 14px !important;
  font-family: 'Open Sans', sans-serif !important;
  position: absolute;
  right: 20px;
  bottom: 20px;
}

.form-wrapper .submit{
  border: none;
  outline: none;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.form-wrapper input[type="text"],
.form-wrapper input[type="password"]{
  display: block;
  padding: 10px;
  margin: 10px auto;
  background-color: #f1f1f1;
  border: none;
  width: 50%;
  outline: none;
  font-size: 14px !important;
  font-family: 'Open Sans', sans-serif !important;
}

.form-wrapper input[type="radio"]{
  display: none;
}

.form-wrapper input[type="radio"] + label{
  display: block;
  border: 1px solid #ccc;
  width: 100%;
  max-width: 100%;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  cursor: pointer;
  position: relative;
}

.form-wrapper input[type="radio"] + label:before{
  content: "✔";
  position: absolute;
  right: -10px;
  top: -10px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 100%;
  background-color: #3498db;
  color: #fff;
  display: none;
}

.form-wrapper input[type="radio"]:checked + label:before{
  display: block;
}

.form-wrapper input[type="radio"] + label h4{
  margin: 15px;
  color: #ccc;
}

.form-wrapper input[type="radio"]:checked + label{
  border: 1px solid #3498db;
}

.form-wrapper input[type="radio"]:checked + label h4{
  color: #3498db;
}
</style>

<script>
$(document).ready(function() {
    $(".form-wrapper .button").click(function() {
        var button = $(this);
        var currentSection = button.parents(".section");
        var currentSectionIndex = currentSection.index();
        var headerSection = $('.steps li').eq(currentSectionIndex);
        currentSection.removeClass("is-active").next().addClass("is-active");
        headerSection.removeClass("is-active").next().addClass("is-active");

        $(".form-wrapper").submit(function(e) {
            //e.preventDefault();
        });

        if (currentSectionIndex === <?php echo strlen((string) $input_codes) ?> ) { //Change this number to amount of total steps
            $(document).find(".form-wrapper .section").first().addClass("is-active");
            $(document).find(".steps li").first().addClass("is-active");
        }
    });
});
</script>