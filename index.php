<?php
$dev_mode = true;
$vcon = false;
?>
<!DOCTYPE html>
<script>
    const accessCount = null;
    /** @type {boolean} */
    window.MHTLIM_SITE_ARCHIVED = true;
    window.MHTLIM_ARCHIVE_MESSAGE = '本站已处于归档状态，登录及云存档功能不可用，请访问 https://renya.mhtlim.top/';
</script>

<?php
if ($vcon) {
    echo '<script src="https://unpkg.com/vconsole@latest/dist/vconsole.min.js"></script>
<script>
var vConsole = new window.VConsole();
</script>';
}

include "ui.php";
?>