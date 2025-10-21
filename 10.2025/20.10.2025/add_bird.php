<?php
include_once ('BreedingPlace.php');
include_once ('Bird.php');
session_start();

$_SESSION['breeding_place']->new_bird($_SESSION['bird']);
unset($_SESSION['bird']);
header('location:./index.php');