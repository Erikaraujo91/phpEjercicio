<?php

function md5Salt($cadena){
   $salt =  "poasd·!·asADA";
   return md5($salt.$cadena);
}

?>