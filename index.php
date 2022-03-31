
<?php

// initialize variables
$pswd = "";
$code = "";
$error = "";
$valid = true;
$color = "#FF0000";

// if form was submit
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// declare encrypt and decrypt funtions
	require_once('vigenere.php');
	
	// set the variables
	$pswd = $_POST['pswd'];
	$code = $_POST['code'];
	
	// check if password is provided
	if (empty($_POST['pswd']))
	{
		$error = "Please enter a password!";
		$valid = false;
	}
	
	// check if text is provided
	else if (empty($_POST['code']))
	{
		$error = "Please enter some text or code to encrypt or decrypt!";
		$valid = false;
	}
	
	// check if password is alphanumeric
	else if (isset($_POST['pswd']))
	{
		if (!ctype_alpha($_POST['pswd']))
		{
			$error = "Password should contain only alphabetical characters!";
			$valid = false;
		}
	}
	
	// inputs valid
	if ($valid)
	{
		// if encrypt button was clicked
		if (isset($_POST['encrypt']))
		{
			$code = encrypt($pswd, $code);
			$error = "Text encrypted successfully!";
			$color = "#526F35";
		}
			
		// if decrypt button was clicked
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($pswd, $code);
			$error = "Code decrypted successfully!";
			$color = "#526F35";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Vigenere Cipher</title>

</head>
<body>
    <div class="container" style="width: 30%;  margin-top: 9%; box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);    padding: 55px;">
     
        <h4 class="text-center">Vigenere Cipher</h4>
        <hr>
        <div class="card-body">
        <form action="" method="POST" >
            <div class="form-group">
                <label for="" style="font-weight:bold">Key</label>
                <input type="text " class="form-control" placeholder="Masukan Kunci" autocomplete="off" name="pswd" id="pass" value="<?php echo htmlspecialchars($pswd); ?>">
            </div>

            <textarea id="box" name="code"><?php echo htmlspecialchars($code); ?></textarea>
            <button type="submit" class="btn btn-primary mt-3" name ="encrypt" onclick="validate(1)"  style="width: 100%;"> ENCODE</button> 
            <button type="submit" class="btn btn-primary mt-3" name ="decrypt" onclick="validate(2)" style="width: 100%;"> DECODE</button> 
            
        
        
        </form>
        </div>  

    
</body>
</html>