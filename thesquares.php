<!doctype html>
<html>
<head>
<style>
body {
	font-family:tahoma;
	font-size:13px;
	color:#333;
}
input[type=text] {
	background:transparent url(http://html-generator.weebly.com/files/theme/input-text-8.png) repeat-x; 
	border:1px solid #999; 
	outline:0; 
	height:25px; 
	width:50px;
}
input[type=submit] {
	border-top: 1px solid #a3bccc;
	background: #7f8487;
	padding: 6px 12px;
	border-radius: 5px;
	color: #ffffff;
	font-family:tahoma;
	font-size:13px;
	text-decoration: none;
	border:none;
}
div {
	background:#dadadb;
	padding:15px;
	color:#000;
}
</style>
<body>

<!-- Create the form -->
<form method="post">
Enter the coefficients: 
<h3>ax<sup>2</sup> + bx + c = 0</h3>
	<input type="text" name="a2" value="<?php if(isset($_POST['post2'])) { echo $_POST['a2']; } else { ?>0<?php } ?>" /><em>x</em><sup>2</sup> +
	<input type="text" name="b2" value="<?php if(isset($_POST['post2'])) { echo $_POST['b2']; } else { ?>0<?php } ?>" /><em>x</em> +
	<input type="text" name="c2" value="<?php if(isset($_POST['post2'])) { echo $_POST['c2']; } else { ?>0<?php } ?>" /> = 0
	<input type="hidden" name="post2" />
	<input type="submit" value="Calculate" />
</form>

<!-- Make it work -->
<?php
if(isset($_POST['post2']))
{
	//form is posted
	$a = $_POST['a2'];
	$b = $_POST['b2'];
	$c = $_POST['c2'];
	if(($a=="0") or ($a==''))
	{
		//User is trying to solve a linear equation
		echo '<div class="error">Error:<br/>The value of <em>a</em> cannot be 0.</div>';
	}
	elseif((is_int($a)) or (is_int($b)) or (is_int($c)))
	{
		//User is trolling the system by entering non-numeric values
		echo '<div class="error">Error:<br/>Please enter numeric values.</div>';
	}
	else
	{
		//calculate using the formula for solving quadratic equations
		$x1 = -$b+sqrt($b*$b-$a*$c*4)/$a*2;
		$x2 = -$b-sqrt($b*$b-$a*$c*4)/$a*2;
		?>
		<!-- Show the answers -->
		<div>The answers:<br/>x = <?php echo $x1; ?> or x = <?php echo $x2; ?></div>
		<?php
	}
}
?>
</body>
</html>
