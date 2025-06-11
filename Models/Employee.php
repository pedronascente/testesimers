<?php
require_once __DIR__ . '/../config/database.php';

class Employee
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($data)
    {
        $sql = "INSERT INTO employees (first_name, last_name, email, salary, department, hire_date)
                VALUES (:first_name, :last_name, :email, :salary, :department, :hire_date)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':email' => $data['email'],
            ':salary' => $data['salary'],
            ':department' => $data['department'],
            ':hire_date' => $data['hire_date'],
        ]);
    }

    public function all()
    {
        $stmt = $this->pdo->query("SELECT * FROM employees ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE employees SET first_name = :first_name, last_name = :last_name, email = :email,
                salary = :salary, department = :department, hire_date = :hire_date WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':email' => $data['email'],
            ':salary' => $data['salary'],
            ':department' => $data['department'],
            ':hire_date' => $data['hire_date'] ?? null,
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM employees WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getSalaryByDepartment()
    {
        $sql = "SELECT department, SUM(salary) as total_salary FROM employees GROUP BY department";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecentHires()
    {
        $sql = "SELECT * FROM employees WHERE hire_date >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function increaseSalaryByDepartment($department)
{
    $sql = "UPDATE employees SET salary = salary * 1.05 WHERE department = :department";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':department' => $department]);
    return $stmt->rowCount(); // retorna o número de funcionários atualizados
}
}
