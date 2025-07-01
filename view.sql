CREATE OR REPLACE VIEW v_employees_departements AS
SELECT 
    e.emp_no,
    e.first_name,
    e.last_name,
    d.dept_name,
    e.birth_date
FROM 
employees e 
    JOIN dept_emp de 
    ON e.emp_no = de.emp_no
    JOIN departments d 
    ON de.dept_no = d.dept_no;