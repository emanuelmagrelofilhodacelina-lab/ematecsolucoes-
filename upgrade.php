<?php
/*
***********************************************************************************
DaDaBIK (DaDaBIK is a DataBase Interfaces Kreator) https://dadabik.com/
Copyright (C) 2001-2025 Eugenio Tacchini

This program is distributed "as is" and WITHOUT ANY WARRANTY, either expressed or implied, without even the implied warranties of merchantability or fitness for a particular purpose.

This program is distributed under the terms of the DaDaBIK license, which is included in this package (see dadabik_license.txt). For all the details see dadabik_license.txt.

If you are unsure about what you are allowed to do with this license, feel free to contact info@dadabik.com
***********************************************************************************
*/
?>
<?php
require './include/config.php'; 
require './include/db_functions_pdo.php'; 

//require './include/header_install.php';

$function = 'upgrade';
$check = 1;
$title = 'Requirements check';
$content = '';

//echo '<div class="container_install_text">';
//echo '<h2>Requirements check</h2>';

ob_start();
require './include/requirements_check.php';
$content .= ob_get_contents();
ob_end_clean();

if ($check === 0){
    $content .=  '<p style="color:#aa0000">Please fix the requirement issues before continuing.<br>If, for some reason, you want to force the upgrade (it is not recommended), run upgrade2.php.</p>';
}
else{
    $content .=  '<p><form action="upgrade2.php" method="POST"><input type="submit" value="NEXT" class="btn btn-primary"></form>';
}
//echo '</div>';

require './include/header_install.php';

require './include/footer_install.php';
