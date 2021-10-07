<?php
$appointment = new appointment();


if (!empty($_POST['id'])) {
    $appointment->id = $_POST['id'];
    $appointmentDelete = $appointment->deleteAppointment();
} 
$appointmentList = $appointment->getListAppointments();