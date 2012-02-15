<?php
	
	function arrayKeyExists(array $keys, array $array)
	{
		if (!array_key_exists($keys[0], $array))
		{
			return false;
		}
		elseif(count($keys) > 1)
		{
			$temp = $array[$keys[0]];
			if (is_array($temp))
			{
				array_shift($keys);
				return arrayKeyExists($keys, $temp);
			}
			else 
			{
				return false;
			}
		}
		
		return true;
	}
?>