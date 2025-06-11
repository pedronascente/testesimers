<?php
require_once '../Models/Employee.php';
require_once "../Helpers/DateFormatter.php";

$employeeModel = new Employee($pdo);
$employees = $employeeModel->all();

$dateFormatter = new DateFormatter ();
require_once 'layout/header.php';
 ?>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">

        <h2 class="mb-3 mb-md-0">Lista de Empregados</h2>
        <a href="add_employee.php" class="btn btn-primary">Adicionar Empregado</a> 
<br>
<a href="add_increase_salary_employee.php" class="btn btn-success">Aumentar Salário por Departamento </a> 


    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Salário</th>
                <th>Departamento</th>
                <th>Data de Contratação</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $emp): ?>
                <tr>
                    <td><?= htmlspecialchars($emp['first_name'] . ' ' . $emp['last_name']) ?></td>
                    <td><?= htmlspecialchars($emp['email']) ?></td>
                    <td>R$ <?= number_format($emp['salary'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($emp['department']) ?></td>
                    <td><?= $dateFormatter->toBrazilianFormat($emp['hire_date']) ?></td>
                    <td>
                        <div class="d-grid gap-1 d-md-flex justify-content-center">
                            <a href="edit_employee.php?id=<?= $emp['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="../actions/delete.php?id=<?= $emp['id'] ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Confirmar exclusão?')">Excluir</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php 
require_once 'layout/footer.php';
 ?>
