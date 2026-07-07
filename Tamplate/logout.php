<?php
session_start();

// Hapus session saja
session_unset();
session_destroy();

// Kembali ke landing page
header("Location: landing-page.html");
exit();
?>