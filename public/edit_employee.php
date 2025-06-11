<?php
require_once '../Models/Employee.php';

require_once '../Helpers/Departament.php';
$departamentos = listaDepartamentos();


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400); // Bad Request
    die("Erro: ID inválido ou não fornecido.");
    exit;
}
$employeeModel = new Employee($pdo);
$employee = $employeeModel->find($id);

if (!$employee) { die("Empregado nao encontrado."); }

require_once 'layout/header.php';
?>
    <h2 class="mb-4">Editar Empregado</h2>

    <form method="post" action="../actions/update.php" class="row g-3">
        <input type="hidden" name="id" value="<?= $employee['id'] ?>">

        <div class="col-md-6">
            <label for="first_name" class="form-label">Primeiro Nome</label>
            <input type="text" class="form-control" id="first_name" name="first_name"
                   value="<?= htmlspecialchars($employee['first_name']) ?>" required>
        </div>

        <div class="col-md-6">
            <label for="last_name" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" id="last_name" name="last_name"
                   value="<?= htmlspecialchars($employee['last_name']) ?>" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="<?= htmlspecialchars($employee['email']) ?>" required>
        </div>

        <div class="col-md-6">
            <label for="salary" class="form-label">Salário</label>

            <input 
min="0.01" 
    max="1000000" 
    maxlength="12" 
type="number" step="0.01" 
class="form-control" 
id="salary" 
name="salary"
                   value="<?= htmlspecialchars($employee['salary']) ?>" required>
        </div>


<div class="col-md-6">
            <label for="department" class="form-label">Departamento</label>
            <select class="form-select" id="department" name="department" required>
                <option value="" disabled selected>Selecione um departamento</option>
                <?php foreach ($departamentos as $sigla => $nome): ?>
                    <option
    <?= ($employee['department'] == $sigla) ? 'selected' : '' ?>
    value="<?= htmlspecialchars($sigla) ?>">
    <?= htmlspecialchars($nome) ?>
</option>
                <?php endforeach; ?>
            </select>
        </div>









        <div class="col-md-6">
            <label for="hire_date" class="form-label">Data de Contratação</label>
            <input type="date" class="form-control" id="hire_date" name="hire_date"
                   value="<?= htmlspecialchars($employee['hire_date']) ?>">
        </div>

        <div class="col-12 d-flex justify-content-between mt-4">
            <a href="list_employees.php" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
    </form>
</div>


<?php 
require_once 'layout/footer.php';
?>




