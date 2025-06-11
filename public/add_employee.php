<?php 

require_once '../Helpers/Departament.php';
$departamentos = listaDepartamentos();

require_once 'layout/header.php';
 ?>
    <h2 class="mb-4">Adicionar Novo Empregado</h2>

    <form method="post" action="../actions/create.php" class="row g-3">
        <div class="col-md-6">
            <label for="first_name" class="form-label">Primeiro Nome</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="col-md-6">
            <label for="last_name" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-6">
            <label for="salary" class="form-label">Salário</label>

<input
    class="form-control"
    type="number" 
    id="salary" 
    name="salary" 
    step="0.01" 
    min="0.01" 
    max="1000000" 
    maxlength="12" 
    placeholder="Ex: 3500.75" 
    required
>
        </div>
        
<div class="col-md-6">
            <label for="department" class="form-label">Departamento</label>
            <select class="form-select" id="department" name="department" required>
                <option value="" disabled selected>Selecione um departamento</option>
                <?php foreach ($departamentos as $sigla => $nome): ?>
                    <option value="<?= htmlspecialchars($sigla) ?>"><?= htmlspecialchars($nome) ?></option>
                <?php endforeach; ?>
            </select>
        </div>



        <div class="col-md-6">
            <label for="hire_date" class="form-label">Data de Contratação</label>
            <input type="date" class="form-control" id="hire_date" name="hire_date">
        </div>
        <div class="col-12 d-flex justify-content-between mt-4">
            <a href="list_employees.php" class="btn btn-secondary">Voltar à Lista</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
<?php 
require_once 'layout/footer.php';
 ?>



















