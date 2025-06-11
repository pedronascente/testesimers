<?php
require_once '../Models/Employee.php';
require_once'../Helpers/InputValidator.php';

$validator = new InputValidator ();

$department = $validator->sanitize($_POST['department'] ?? '');


try {
    
$employeeModel = new Employee($pdo);
$retr= $employeeModel->increaseSalaryByDepartment($department);
//var_dump($retr);

    header('Location: ../public/list_employees.php?success=1');
    exit;

} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem
    die("Erro ao aumentar salários: " . $e->getMessage());
    exit;
}

?>
