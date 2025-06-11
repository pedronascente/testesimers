<?php
include '../Models/Employee.php';
include './validateForm.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400); // Bad Request
    echo "Erro: ID inválido ou não fornecido.";
    exit;
}

try {
   $employeeModel = new Employee($pdo);

   $employeeModel->update($id,[
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
        die("Erro ao atualizar empregado: " . $e->getMessage());
    }
}
?>
