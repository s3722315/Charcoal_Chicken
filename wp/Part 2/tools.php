<?php
function getFileInfo()
{
  $productInfo = array();
  $file = fopen('product.txt','r');
  if (($headers = fgetcsv($file, 0, "\t")) !== FALSE)
  if ($headers)
  while (($line = fgetcsv($file, 0, "\t")) !== FALSE)
  {
    if ($line)
    {
      if (sizeof($line)==sizeof($headers))
      {
        $productInfo[] = array_combine($headers,$line);
      }
    }
  }
  fclose($file);
  return $productInfo;
}

function checkFile($idCheck, $productInfo)
{
  foreach ($productInfo as $value)
  {
    if ($value['ID'] == $idCheck)
    {
      return true;
    }
  }
  return false;
}

function getItemInfo($idCheck, $productInfo, $Oid)
{
  foreach ($productInfo as $value)
  {
    if ($value['ID'] == $idCheck)
    {
      if ($value['OID'] == $Oid)
      {
        $itemInfo = array();
        $itemInfo = $value;
        return $itemInfo;
        break;
      }
    }
  }
}
?>
