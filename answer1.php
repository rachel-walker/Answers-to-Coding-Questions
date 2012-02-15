<?php
	for($i = 1; $i <= 100; $i++)
	{
		if(($i % 3 == 0) and ($i % 5 == 0))
		{
			print("three-five\r\n");
		}
		elseif($i % 3 == 0)
		{
			print("three\r\n");
		}
		elseif($i % 5 == 0)
		{
			print("five\r\n");
		}
		else
		{
			print($i . "\r\n");
		}
	}
?>