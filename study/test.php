<?php
function increment(&$var)
{
	$var++;
}
$num = 2;
increment($num);
echo $num;