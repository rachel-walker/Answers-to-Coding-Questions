<?php
	
	if(isset($_POST['submit']))
	{
		if (isset($_FILES['image']))
		{
			$tempName = $_FILES['image']['tmp_name'];
			$fileType = $_FILES['image']['type'];
			
			if ($_FILES['image']['size'] > 2097152)
			{
				echo "File must be 2 MB or less";
			}
			elseif (! ( $fileType == "image/png" || $fileType == "image/jpeg"))
			{
				echo "File must be a png or a jpg.";
			}
			else
			{
				if($fileType == "image/jpeg")
				{
					$image = imagecreatefromjpeg($tempName);
				}
				else
				{
					$image = imagecreatefrompng($tempName);
				}
				
				list($width, $height) = getimagesize($tempName);
				
				$adjustmentPercentage = 400 / $width;
				$newWidth = 400;
				$newHeight = floor($height * $adjustmentPercentage);
				
				if ($newHeight > 300)
				{
					$adjustmentPercentage = 300 / $height;
					$newHeight = 300;
					$newWidth = floor($width * $adjustmentPercentage);
				}
				
				$tmp = imagecreatetruecolor($newWidth, $newHeight);
				imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
				
				header('Content-Type: image/jpeg');
				imagejpeg($tmp);
				imagedestroy($image);
				imagedestroy($tmp);
			}
		}
		
	}
	else
	{
		echo
		'<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			</head>
			<body>
				<form id="frmFoo" name="imageUpload" method="POST" enctype="multipart/form-data" action="answer3.php">
					<input id="theFile" type="file" name="image" />
					<input type="submit" name="submit" value="Upload image" />
				</form>
			</body>
		</html>';
	}
?>
