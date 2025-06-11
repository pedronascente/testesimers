<?php

require_once'../Helpers/InputValidator.php';
require_once'../Helpers/EmailValidator.php';
require_once'../Helpers/SalaryValidator.php';

$validator = new InputValidator();
$emailValidator = new EmailValidator();
$salaryValidator = new SalaryValidator();

$first_name = $validator->sanitize($_POST['first_name'] ?? '');
$last_name = $validator->sanitize($_POST['last_name'] ?? '');
$email = $validator->sanitize($_POST['email'] ?? '');
$salary = $validator->sanitize($_POST['salary'] ?? '');
$department = $validator->sanitize($_POST['department'] ?? '');


$hire_date =  isset($_POST['hire_date']) && $_POST['hire_date'] !== '' ? $_POST['hire_date'] : null; 


if (!$first_name || !$last_name || !$email || !$salary || !$department) {
    die("Todos os campos obrigatórios devem ser preenchidos.");
}

if (!$emailValidator->isValid($email)) {
    die("Email inválido.");
}


try {
    $salaryValidator->validate($salary);

} catch (InvalidArgumentException $e) {
    die("Erro de validação: " . $e->getMessage());
    exit;
}






