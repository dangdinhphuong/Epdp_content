<?php
$text = "mÃ¡Â»â¢t cÃÂ¡ch an toÃÂ n. ÃÂÃ¡Â»âng thÃ¡Â»Âi, cho ngÃÂ°Ã¡Â»Âi ÃâiÃ¡Â»Âu khiÃ¡Â»Æn cÃ¡ÂºÂ£m giÃÂ¡c thoÃ¡ÂºÂ£i mÃÂ¡i nhÃ¡Â»Â hÃ¡Â»â¡";

while (mb_detect_encoding($text, 'UTF-8', true) === false) {
    $text = utf8_decode($text);
}

echo $text;

