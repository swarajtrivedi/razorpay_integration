<?php
require_once("razor_pay_config.php");


//server details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "razor_pay";
//connecting
$conn = new mysqli($servername, $username, $password, $dbname);
//performing check
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, email , amount , contacts  FROM details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$name = $row["name"];
		$email = $row["email"];
		$amount = $row["amount"];
		$contact = $row["contacts"];
    }
} else {
    echo "0 results";
}

?>
<html>
	

	<head>
		<title> Razorpay Integration in Php </title>
		<meta name="viewport" content="width-device-width">
	</head>
	<style>
			.razorpay-payment-button{
			background-color:#ff0066;
			color:white;
			border-radius: 8px;
			padding:15px;
			display:inline-block;
			margin: 4px 2px;
			border : none;

		}
		
		</style>

	<body >

		
		<form action="success.html" method="POST">
			
			<script
				src="https://checkout.razorpay.com/v1/checkout.js"
				data-key="<?php echo $razor_api_key; ?>" 	
				data-amount="<?php echo $amount; ?>" 
				data-currency="INR"
				data-buttontext="Pay with Razorpay"
				data-name="Acme Corp"
				data-description="Test transaction"
				data-image="https://example.com/your_logo.jpg"
				data-prefill.name="<?php echo $name; ?>" 
				data-prefill.email="<?php echo $email; ?>" 
				data-prefill.contact="<?php echo "+91".$contact; ?>" 
				data-theme.color="#ff0066"
			>
			</script>
			<input type="hidden" custom="Hidden Element" name="hidden"  >
		</form>
	</body>

</html>

