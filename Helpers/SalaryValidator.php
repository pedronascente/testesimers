<?php

class SalaryValidator
{
    private float $minSalary;
    private float $maxSalary;

    public function __construct(float $minSalary = 0.01, float $maxSalary = 1000000.00)
    {
        $this->minSalary = $minSalary;
        $this->maxSalary = $maxSalary;
    }

    /**
     * Valida o valor do salário.
     *
     * @param mixed $salary
     * @return bool
     * @throws InvalidArgumentException
     */
    public function validate($salary): bool
    {
        if (!is_numeric($salary)) {
            throw new InvalidArgumentException("O salário deve ser um número.");
        }

        $salary = floatval($salary);

        if ($salary < $this->minSalary) {
            throw new InvalidArgumentException("O salário não pode ser zero ou negativo.");
        }

        if ($salary > $this->maxSalary) {
            throw new InvalidArgumentException("O salário não pode ser superior a R$ 1.000.000,00.");
        }

        return true;
    }
}