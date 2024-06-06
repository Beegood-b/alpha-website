<?php

if (isset($_POST['btn-send'])) {
    // Sanitize general inputs for scripts and special characters
    function sanitizeInput($data) {
        $data = htmlspecialchars(strip_tags($data));
        return $data;
    }

    $UserName = sanitizeInput($_POST['UName']);
    $Email = sanitizeInput($_POST['Email']);
    $Phone = sanitizeInput($_POST['Phone']);
    $Subject = sanitizeInput($_POST['Subject']);
    $Msg = sanitizeInput($_POST['msg']);

    // If any of the inputs is empty - do not submit the form
    if (empty($UserName) || empty($Email) || empty($Subject) || empty($Msg)) {
        header('location:/?error#consultation');
        exit();
        // If email is not valid - do not submit
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        header('location:/?error=email#consultation');
        exit();
        // If everything is ok, submit the form
    } else {
        $to = "artjoms.bugajenkovs@gmail.com";
        $message = "Vārds: $UserName\n\nNumurs: $Phone\n\nTēmats: $Subject\n\nIzziņa: $Msg";
        if (mail($to, $Subject, $message, "From: $Email")) {
            header('location:/?success#consultation');
            exit();
        } else {
            header('location:/?error#consultation');
            exit();
        }
    }
}
