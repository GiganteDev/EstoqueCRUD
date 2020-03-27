<?php
session_start(); // Retoma sessão
unset($_SESSION['user']); // Desliga sessão
header('location:/'); // Volta pro index