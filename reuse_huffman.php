<?php
$original1 = "This is the first text we want to compress.";
$original2 = "This is the second text we want to compress.";

$huffman = new huffman();

$huffman = ->buildTree($original1.$original2);

$dictionary = $huffman->getDictionary();
$compressed1 = $huffman->compressData($original1,false);
$compressed2 = $huffman->compressData($original2,false);

$huffman2 = new huffman($dictionary);

echo $huffman->decompressData($compressed1,false)."\n";
echo $huffman->decompressData($compressed2,false);

?>