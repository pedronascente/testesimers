<?php 
require_once '../Models/Employee.php';
require_once '../Helpers/Departament.php';
$departamentos = listaDepartamentos();

require_once 'layout/header.php';

?>
    <h2 class="mb-4">Adicionar Aumento Salarial de 5%</h2>

    <form method="post" action="../actions/increase_salary.php" class="row g-3">
        
        <div class="col-md-6">
            <label for="department" class="form-label">Departamento</label>
            <select class="form-select" id="department" name="department" required>
                <option value="" disabled selected>Selecione um departamento</option>
                <?php foreach ($departamentos as $sigla => $nome): ?>
                    <option value="<?= htmlspecialchars($sigla) ?>"><?= htmlspecialchars($nome) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12 d-flex justify-content-between mt-4">
            <a href="list_employees.php" class="btn btn-secondary">Voltar à Lista</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>

<?php require_once 'layout/footer.php'; ?>

