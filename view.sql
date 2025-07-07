CREATE OR REPLACE VIEW v_employees_departements AS
SELECT 
    e.emp_no,
    e.first_name,
    e.last_name,
    de.dept_no,         
    d.dept_name,
    e.birth_date,
    e.gender,
    s.salary
FROM 
    employees e 
    JOIN dept_emp de ON e.emp_no = de.emp_no
    JOIN departments d ON de.dept_no = d.dept_no
    JOIN (
        SELECT emp_no, salary
        FROM salaries s1
        WHERE to_date = (
            SELECT MAX(to_date)
            FROM salaries s2
            WHERE s1.emp_no = s2.emp_no
        )
    ) s ON s.emp_no = e.emp_no;
