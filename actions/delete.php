<?php
include '../Models/Employee.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400); // Bad Request
    echo "Erro: ID inválido ou não fornecido.";
    exit;
}

$employee = new Employee ($pdo);
$employee->delete($id);
header("Location: ../public/list_employees.php");
exit();
?>
