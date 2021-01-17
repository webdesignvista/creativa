<?php


$errors = [];

if ( ! isset( $_POST['fromName'] ) or '' == $_POST['fromName'] ) {
    $errors[] = 'fromName';
}

if ( ! isset( $_POST['fromEmail'] ) or '' == $_POST['fromEmail'] ) {
    $errors[] = 'fromEmail';
}

if ( ! isset( $_POST['message'] ) or '' == $_POST['message'] ) {
    $errors[] = 'message';
}

if ( ! empty( $errors ) ) {
    echo json_encode( ['status' => 'validation_error', 'errors' => $errors] ); exit;
}

