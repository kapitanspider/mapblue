<?php
function validateInput($str) {
	$words=["delete","select","revoke","grand","drop","insert","alter"];
	foreach($words as &$word)
	{
		if(strpos(strtolower($str), $word) !== false)
		{
			return 1;
		}
	}
	return 0;
  }

function mainInputCheck()
{
foreach($_POST as &$elem)
{
    if(validateInput($elem))
    {
        return false;
    }
}
foreach($_GET as &$elem)
{
    if(validateInput($elem))
    {
        return false;
    }
}
return true;
}

?>