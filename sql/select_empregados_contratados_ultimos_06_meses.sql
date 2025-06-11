USE company;

SELECT * FROM employees WHERE hire_date >= CURDATE() - INTERVAL 6 MONTH;