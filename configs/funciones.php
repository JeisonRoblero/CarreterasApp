<?php
include "config.php";

function conectar() {

    global $user, $pass, $host, $sidName;
  
    $conn = oci_connect($user, $pass, $host."/".$sidName);
  
    if (!$conn) {
      $e = oci_error();
      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
      exit();
    }
  
    return $conn;
}

function redir($var){
	?>
	<script>
		window.location="<?=$var?>";
	</script>

	<?php
	die();
}

function alert($var,$type,$url){
    //error, success, info
    if ($type==0) {
        $t = "error";
        $titu = 'Error :(';
    }elseif ($type==1) {
        $t = "success";
        $titu = 'Éxito! ;)';
    }elseif ($type==2) {
        $t = "info";
        $titu = 'Hey :O';
    }
    

    echo '<script>swal({ title: "'.$titu.'", text: "'.$var.'", icon: "'.$t.'"});';
    echo '$(".swal-button").click(function(){ window.location="?p='.$url.'"; });';
    echo '</script>';

}


?>