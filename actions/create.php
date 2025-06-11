<?php
include '../Models/Employee.php';
include './validateForm.php';

try {

    $employeeModel = new Employee($pdo);
    $employeeModel->create([
       'first_name' => $first_name,
       'last_name' => $last_name,
       'email' => $email,
       'salary' =>$salary,
       'department' => $department,
       'hire_date' => $hire_date
     ]);

    header("Location: ../public/list_employees.php");
    exit();
} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        die("Email já cadastrado.");
    } else {
        die("Erro ao inserir empregado: " . $e->getMessage());
    }
}
?>
