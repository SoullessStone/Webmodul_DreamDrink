 <?php
        unset($_SESSION);
        $_SESSION = array(); 
        session_destroy();
        header( "Location: index.php?site=about&lang=de" );
 ?>