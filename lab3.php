<?php

$path = (string)$_POST['path'];

function PrintDirectoryTree($dir,$size, $parent = 0)
{
if ($parent == 0)
echo "<ul>\r\n";
echo "<li type='circle'>$dir</li>\r\n";
echo "<ul type='disc'>\r\n";
$files = scandir($dir);
foreach ($files as $v)
{
if ($v == "." || $v == "..")
continue;
$s = $dir."/".$v;
if (is_dir($s))
{
$tempsize = 0;
$size += PrintDirectoryTree($s,$tempsize, 1);
}
else
{
echo "<li>$v ".filesize($s)."</li>\r\n";
$size += filesize($s);
}
}
echo "</ul>\r\n";
if ($parent == 0)
echo "</ul>\r\n";
return $size;
}
$sizes = 0;
echo "File sizes: ".PrintDirectoryTree($path,$sizes);
?>

<form action=' ' method='post'>
		<p>Insert path </p>
	<input type='text' name='path'>
</form>
