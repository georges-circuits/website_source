<?php
    if (!isset($_COOKIE["theme_cookie"])) {
        setcookie ("theme_cookie", "dark", time() + (86400 * 365), "/");
    }
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            include "site.php";
        ?>
    </body>
</html>