         
<!-- header for starting the session -->



<?php
session_start();
session_unset();
session_destroy();

?>
<script>
window.location.href='login.php';      //  redirect is not happening by php thus we used javascript
</script>
<?php
exit;


?>