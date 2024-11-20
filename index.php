<?php
require "./models/database.php";
require "./models/CandidateRepository.php";
require "./models/DepartRepository.php";
$candidats = new CandidateRepository();
var_dump($candidats->searchAll());
$departements = new DepartRepository();