<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #4895ef;
            --secondary-color: #3f37c9;
            --accent-color: #f72585;
            --dark-color: #1b263b;
            --light-color: #f8f9fa;
            --white-color: #ffffff;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #ef233c;
            --gray-color: #adb5bd;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {

            margin-top: -24px;
            margin-left: -24px;
            background-color: #f5f7ff;
            color: #2b2d42;
            line-height: 1.6;
            padding: 24px;
        }

        .container {
            max-width: 1400px;
            margin: auto;
        }

        h1, h2, h3 {
            color: var(--dark-color);
            margin-bottom: 16px;
            font-weight: 600;
        }

        h1 {
            font-size: 2rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        h3 {
            font-size: 1.2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .header h1 {
            color: white;
            font-family: Arial, sans-serif;
            font-size: 36px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--white-color);
            padding: 8px 16px;
            border-radius: 50px;
            box-shadow: var(--shadow);
        }

        .user-info i {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .dashboard-cards {
            margin-left: 12px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .card {
            background-color: var(--white-color);
            border-radius: var(--border-radius);
            padding: 24px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--primary-color);
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .card h3 {
            color: var(--gray-color);
            font-size: 1rem;
            margin-bottom: 12px;
            font-weight: 500;
        }

        .card p {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark-color);
        }

        .section {
            background-color: var(--white-color);
            border-radius: var(--border-radius);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: var(--shadow);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .btn i {
            font-size: 0.9em;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }

        .btn-outline:hover {
            background-color: rgba(67, 97, 238, 0.1);
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: var(--white-color);
        }

        .btn-danger:hover {
            background-color: #d90429;
            transform: translateY(-2px);
        }

        .btn-small {
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #edf2f4;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: var(--dark-color);
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .status {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status.active {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success-color);
        }

        .status.inactive {
            background-color: rgba(239, 35, 60, 0.1);
            color: var(--danger-color);
        }

        .status.on-leave {
            background-color: rgba(248, 150, 30, 0.1);
            color: var(--warning-color);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background-color: var(--white-color);
            border-radius: var(--border-radius);
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 32px;
            position: relative;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.2);
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close-btn {
            position: absolute;
            top: 24px;
            right: 24px;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray-color);
            transition: var(--transition);
        }

        .close-btn:hover {
            color: var(--dark-color);
            transform: rotate(90deg);
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
        }

        .search-box {
            position: relative;
            width: 300px;
            margin-bottom: 24px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 1px solid #e9ecef;
            border-radius: 50px;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-color);
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: normal;
            cursor: pointer;
            user-select: none;
        }

        .performance-modal-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .rating-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rating-stars {
            color: var(--warning-color);
            font-size: 1.2rem;
        }

        .performance-details {
            background: #f8f9fa;
            padding: 16px;
            border-radius: 8px;
        }

        .performance-details h4 {
            margin-bottom: 8px;
            color: var(--dark-color);
        }

        .performance-details p {
            color: #495057;
            line-height: 1.6;
        }

        .grid-2-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        @media (max-width: 1024px) {
            .grid-2-col {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 16px;
            }
            
            .dashboard-cards {
                grid-template-columns: 1fr 1fr;
            }
            
            .search-box {
                width: 100%;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }
        }

        @media (max-width: 576px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .modal-content {
                padding: 24px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Employee Management System</h1>
        </div>

        <!-- Dashboard Stats -->
        <div class="dashboard-cards">
            <div class="card">
                <h3><i class="fas fa-users" style="margin-right: 8px;"></i>Total Employees</h3>
                <p id="total-employees">0</p>
            </div>
            <div class="card">
                <h3><i class="fas fa-project-diagram" style="margin-right: 8px;"></i>Active Projects</h3>
                <p id="active-projects">0</p>
            </div>
            <div class="card">
                <h3><i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>Pending Leaves</h3>
                <p id="pending-leaves">0</p>
            </div>
            <div class="card">
                <h3><i class="fas fa-money-bill-wave" style="margin-right: 8px;"></i>Upcoming Payroll</h3>
                <p id="upcoming-payroll">0</p>
            </div>
        </div>

        <!-- Employee Database -->
        <div class="section">
            <div class="section-header">
                <h2><i class="fas fa-database" style="color: var(--primary-color); margin-right: 10px;"></i>Employee Database</h2>
                <button id="add-employee-btn" class="btn btn-primary"><i class="fas fa-plus"></i> Add Employee</button>
            </div>
            <div class="search-box">
                <input type="text" id="employee-search" placeholder="Search employees...">
                <i class="fas fa-search"></i>
            </div>
            <table id="employee-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Employee data will be added dynamically -->
                </tbody>
            </table>
        </div>

        <!-- Role Assignments -->
        <div class="section">
            <div class="section-header">
                <h2><i class="fas fa-user-tag" style="color: var(--primary-color); margin-right: 10px;"></i>Role Assignments</h2>
                <button class="btn btn-outline"><i class="fas fa-plus"></i> Assign Role</button>
            </div>
            <table id="assignment-table">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Role</th>
                        <th>Project</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Assignment data will be added dynamically -->
                </tbody>
            </table>
        </div>

        <!-- Attendance -->
        <div class="section">
            <div class="section-header">
                <h2><i class="fas fa-calendar-check" style="color: var(--primary-color); margin-right: 10px;"></i>Attendance Records</h2>
                <button class="btn btn-outline"><i class="fas fa-plus"></i> Add Record</button>
            </div>
            <table id="attendance-table">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Date</th>
                        <th>Clock In</th>
                        <th>Clock Out</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Attendance data will be added dynamically -->
                </tbody>
            </table>
        </div>

        <!-- Payroll -->
        <div class="section">
            <div class="section-header">
                <h2><i class="fas fa-file-invoice-dollar" style="color: var(--primary-color); margin-right: 10px;"></i>Salary Structures</h2>
                <button class="btn btn-outline"><i class="fas fa-plus"></i> Add Structure</button>
            </div>
            <table id="salary-structure-table">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Base Salary</th>
                        <th>Bonus</th>
                        <th>Tax Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Salary structure data will be added dynamically -->
                </tbody>
            </table>
        </div>

        <!-- Performance -->
        <div class="section">
            <div class="section-header">
                <h2><i class="fas fa-chart-line" style="color: var(--primary-color); margin-right: 10px;"></i>Performance Reviews</h2>
                <button class="btn btn-outline"><i class="fas fa-plus"></i> Add Review</button>
            </div>
            <table id="performance-table">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Review Date</th>
                        <th>Avg Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Performance data will be added dynamically -->
                </tbody>
            </table>
        </div>

        <!-- Benefits & Leave -->
        <div class="section">
            <div class="section-header">
                <h2><i class="fas fa-heart" style="color: var(--primary-color); margin-right: 10px;"></i>Benefits & Leave</h2>
            </div>
            <div class="grid-2-col">
                <div>
                    <h3><i class="fas fa-medal" style="color: var(--primary-color); margin-right: 10px;"></i>Employee Benefits</h3>
                    <table id="benefits-table">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Benefits</th>
                                <th>Vacation Days</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Benefits data will be added dynamically -->
                        </tbody>
                    </table>
                </div>
                <div>
                    <h3><i class="fas fa-umbrella-beach" style="color: var(--primary-color); margin-right: 10px;"></i>Leave Requests</h3>
                    <table id="leave-table">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Leave data will be added dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <div id="employee-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2 id="modal-title"><i class="fas fa-user-edit" style="margin-right: 10px;"></i>Add Employee</h2>
                <form id="employee-form">
                    <input type="hidden" id="employee-id">
                    <div class="form-group">
                        <label for="first-name">First Name:</label>
                        <input type="text" id="first-name" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name:</label>
                        <input type="text" id="last-name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="department">Department:</label>
                        <select id="department" required>
                            <option value="">Select Department</option>
                            <option value="Construction">Construction</option>
                            <option value="Management">Management</option>
                            <option value="HR">Human Resources</option>
                            <option value="Finance">Finance</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" id="position" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="On Leave">On Leave</option>
                        </select>
                    </div>
                    <div class="modal-buttons">
                        <button type="button" class="btn btn-danger close-modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Employee</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="performance-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2><i class="fas fa-chart-line" style="margin-right: 10px;"></i>Performance Review</h2>
                <div class="performance-modal-content">
                    <div class="grid-2-col">
                        <div>
                            <h3 id="performance-employee-name">John Doe</h3>
                            <p id="performance-review-date">Review Date: 2023-04-15</p>
                        </div>
                        <div class="rating-container">
                            <span>Overall Rating:</span>
                            <div class="rating-stars" id="performance-rating-stars">
                                <!-- Stars will be added dynamically -->
                            </div>
                            <span id="performance-avg-rating">4.3/5</span>
                        </div>
                    </div>
                    
                    <div class="performance-details">
                        <h4>Punctuality</h4>
                        <div class="rating-stars" id="punctuality-rating">
                            <!-- Stars will be added dynamically -->
                        </div>
                    </div>
                    
                    <div class="performance-details">
                        <h4>Teamwork</h4>
                        <div class="rating-stars" id="teamwork-rating">
                            <!-- Stars will be added dynamically -->
                        </div>
                    </div>
                    
                    <div class="performance-details">
                        <h4>Quality of Work</h4>
                        <div class="rating-stars" id="quality-rating">
                            <!-- Stars will be added dynamically -->
                        </div>
                    </div>
                    
                    <div class="performance-details">
                        <h4>Feedback</h4>
                        <p id="performance-feedback">Good performance overall, but needs improvement in time management.</p>
                    </div>
                    
                    <div class="performance-details">
                        <h4>Goals for Next Period</h4>
                        <p id="performance-goals">Improve punctuality and learn new construction techniques.</p>
                    </div>
                </div>
                <div class="modal-buttons">
                    <button type="button" class="btn btn-primary close-modal">Close</button>
                </div>
            </div>
        </div>

        <div id="confirmation-modal" class="modal">
            <div class="modal-content">
                <h2><i class="fas fa-exclamation-triangle" style="color: var(--warning-color); margin-right: 10px;"></i>Confirm Action</h2>
                <p id="confirmation-message">Are you sure you want to perform this action?</p>
                <div class="modal-buttons">
                    <button id="cancel-btn" class="btn btn-danger">Cancel</button>
                    <button id="confirm-btn" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample data
        let employees = [
            { id: 1, firstName: 'John', lastName: 'Doe', email: 'john.doe@example.com', 
              phone: '123-456-7890', department: 'Construction', position: 'Worker', status: 'Active' },
            { id: 2, firstName: 'Jane', lastName: 'Smith', email: 'jane.smith@example.com', 
              phone: '234-567-8901', department: 'Management', position: 'Manager', status: 'Active' },
            { id: 3, firstName: 'Robert', lastName: 'Johnson', email: 'robert.j@example.com', 
              phone: '345-678-9012', department: 'Finance', position: 'Accountant', status: 'Active' },
            { id: 4, firstName: 'Emily', lastName: 'Williams', email: 'emily.w@example.com', 
              phone: '456-789-0123', department: 'HR', position: 'Recruiter', status: 'On Leave' }
        ];

        let assignments = [
            { id: 1, employeeId: 1, employeeName: 'John Doe', role: 'Construction Worker', project: 'Project A' },
            { id: 2, employeeId: 2, employeeName: 'Jane Smith', role: 'Project Manager', project: 'Project A' },
            { id: 3, employeeId: 3, employeeName: 'Robert Johnson', role: 'Financial Analyst', project: 'Project B' },
            { id: 4, employeeId: 4, employeeName: 'Emily Williams', role: 'HR Specialist', project: 'All Projects' }
        ];

        let attendance = [
            { id: 1, employeeId: 1, employeeName: 'John Doe', date: '2023-05-01', 
              clockIn: '08:00', clockOut: '17:00', status: 'Present' },
            { id: 2, employeeId: 2, employeeName: 'Jane Smith', date: '2023-05-01', 
              clockIn: '09:00', clockOut: '18:00', status: 'Present' },
            { id: 3, employeeId: 3, employeeName: 'Robert Johnson', date: '2023-05-01', 
              clockIn: '08:30', clockOut: '17:30', status: 'Present' },
            { id: 4, employeeId: 4, employeeName: 'Emily Williams', date: '2023-05-01', 
              clockIn: null, clockOut: null, status: 'On Leave' }
        ];

        let salaryStructures = [
            { id: 1, role: 'Construction Worker', baseSalary: 3000, bonus: 5, taxRate: 15 },
            { id: 2, role: 'Project Manager', baseSalary: 6000, bonus: 10, taxRate: 20 },
            { id: 3, role: 'Financial Analyst', baseSalary: 5000, bonus: 8, taxRate: 18 },
            { id: 4, role: 'HR Specialist', baseSalary: 4500, bonus: 7, taxRate: 16 }
        ];

        let performanceRecords = [
            { id: 1, employeeId: 1, employeeName: 'John Doe', reviewDate: '2023-04-15', 
              punctuality: 4, teamwork: 5, quality: 4, feedback: 'Good performance overall, but needs improvement in time management.', 
              goals: 'Improve punctuality and learn new construction techniques.' },
            { id: 2, employeeId: 2, employeeName: 'Jane Smith', reviewDate: '2023-04-10', 
              punctuality: 5, teamwork: 5, quality: 5, feedback: 'Excellent leadership skills and project management.', 
              goals: 'Take on more complex projects and mentor junior managers.' },
            { id: 3, employeeId: 3, employeeName: 'Robert Johnson', reviewDate: '2023-04-05', 
              punctuality: 5, teamwork: 4, quality: 5, feedback: 'Very accurate financial reports and analysis.', 
              goals: 'Improve cross-department collaboration and communication.' }
        ];

        let benefits = [
            { id: 1, employeeId: 1, employeeName: 'John Doe', benefits: ['Healthcare', 'Dental'], vacationDays: 15 },
            { id: 2, employeeId: 2, employeeName: 'Jane Smith', benefits: ['Healthcare', 'Dental', 'Vision', 'Retirement'], vacationDays: 25 },
            { id: 3, employeeId: 3, employeeName: 'Robert Johnson', benefits: ['Healthcare', 'Retirement'], vacationDays: 20 },
            { id: 4, employeeId: 4, employeeName: 'Emily Williams', benefits: ['Healthcare', 'Dental', 'Vision'], vacationDays: 18 }
        ];

        let leaveRequests = [
            { id: 1, employeeId: 1, employeeName: 'John Doe', leaveType: 'Vacation', 
              startDate: '2023-06-01', endDate: '2023-06-07', status: 'Pending' },
            { id: 2, employeeId: 4, employeeName: 'Emily Williams', leaveType: 'Maternity', 
              startDate: '2023-05-01', endDate: '2023-08-01', status: 'Approved' },
            { id: 3, employeeId: 2, employeeName: 'Jane Smith', leaveType: 'Sick', 
              startDate: '2023-05-15', endDate: '2023-05-17', status: 'Approved' }
        ];

        // DOM elements
        const employeeModal = document.getElementById('employee-modal');
        const performanceModal = document.getElementById('performance-modal');
        const confirmationModal = document.getElementById('confirmation-modal');
        const closeButtons = document.querySelectorAll('.close-btn, .close-modal');
        const addEmployeeBtn = document.getElementById('add-employee-btn');
        const employeeForm = document.getElementById('employee-form');
        const employeeTable = document.getElementById('employee-table').querySelector('tbody');
        const assignmentTable = document.getElementById('assignment-table').querySelector('tbody');
        const attendanceTable = document.getElementById('attendance-table').querySelector('tbody');
        const salaryStructureTable = document.getElementById('salary-structure-table').querySelector('tbody');
        const performanceTable = document.getElementById('performance-table').querySelector('tbody');
        const benefitsTable = document.getElementById('benefits-table').querySelector('tbody');
        const leaveTable = document.getElementById('leave-table').querySelector('tbody');
        const employeeSearch = document.getElementById('employee-search');

        // Global variables
        let currentEmployeeId = null;
        let confirmCallback = null;

        // Initialize the application
        function init() {
            // Event listeners
            closeButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    employeeModal.style.display = 'none';
                    performanceModal.style.display = 'none';
                    confirmationModal.style.display = 'none';
                });
            });

            window.addEventListener('click', (e) => {
                if (e.target === employeeModal) employeeModal.style.display = 'none';
                if (e.target === performanceModal) performanceModal.style.display = 'none';
                if (e.target === confirmationModal) confirmationModal.style.display = 'none';
            });

            addEmployeeBtn.addEventListener('click', () => {
                document.getElementById('modal-title').innerHTML = '<i class="fas fa-user-plus" style="margin-right: 10px;"></i>Add Employee';
                document.getElementById('employee-id').value = '';
                employeeForm.reset();
                employeeModal.style.display = 'flex';
            });

            employeeForm.addEventListener('submit', handleEmployeeFormSubmit);

            document.getElementById('confirm-btn').addEventListener('click', () => {
                if (confirmCallback) confirmCallback();
                confirmationModal.style.display = 'none';
            });

            document.getElementById('cancel-btn').addEventListener('click', () => {
                confirmationModal.style.display = 'none';
            });

            employeeSearch.addEventListener('input', filterEmployees);

            // Render initial data
            updateDashboard();
            renderEmployeeTable();
            renderAssignmentTable();
            renderAttendanceTable();
            renderSalaryStructureTable();
            renderPerformanceTable();
            renderBenefitsTable();
            renderLeaveTable();
        }

        // Employee functions
        function handleEmployeeFormSubmit(e) {
            e.preventDefault();
            
            const formData = new FormData(employeeForm);
            const employeeData = Object.fromEntries(formData.entries());
            
            if (employeeData.id) {
                
                // Update existing employee
                const index = employees.findIndex(emp => emp.id === parseInt(employeeData.id));
                if (index !== -1) {
                    employees[index] = {
                        ...employees[index],
                        firstName: employeeData['first-name'],
                        lastName: employeeData['last-name'],
                        email: employeeData.email,
                        phone: employeeData.phone,
                        department: employeeData.department,
                        position: employeeData.position,
                        status: employeeData.status
                    };
                }
            } else {
                alert("Can't save this employee")
                // Add new employee
                const newId = employees.length > 0 ? Math.max(...employees.map(emp => emp.id)) + 1 : 1;
                employees.push({
                    id: newId,
                    firstName: employeeData['first-name'],
                    lastName: employeeData['last-name'],
                    email: employeeData.email,
                    phone: employeeData.phone,
                    department: employeeData.department,
                    position: employeeData.position,
                    status: employeeData.status
                });
            }
            
            renderEmployeeTable();
            updateDashboard();
            employeeModal.style.display = 'none';
        }

        function renderEmployeeTable() {
            employeeTable.innerHTML = '';
            
            employees.forEach(employee => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${employee.id}</td>
                    <td>${employee.firstName} ${employee.lastName}</td>
                    <td>${employee.email}</td>
                    <td>${employee.phone}</td>
                    <td>${employee.department}</td>
                    <td><span class="status ${employee.status.toLowerCase().replace(' ', '-')}">${employee.status}</span></td>
                    <td class="action-buttons">
                        <button class="btn btn-primary btn-small edit-employee" data-id="${employee.id}"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-small delete-employee" data-id="${employee.id}"><i class="fas fa-trash-alt"></i> Delete</button>
                    </td>
                `;
                
                employeeTable.appendChild(row);
            });
            
            // Add event listeners to edit and delete buttons
            document.querySelectorAll('.edit-employee').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(e.target.getAttribute('data-id'));
                    editEmployee(id);
                });
            });
            
            document.querySelectorAll('.delete-employee').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(e.target.getAttribute('data-id'));
                    showConfirmationModal(
                        'Are you sure you want to delete this employee? This action cannot be undone.',
                        () => deleteEmployee(id)
                    );
                });
            });
        }

        function editEmployee(id) {
            const employee = employees.find(emp => emp.id === id);
            if (employee) {
                document.getElementById('modal-title').innerHTML = '<i class="fas fa-user-edit" style="margin-right: 10px;"></i>Edit Employee';
                document.getElementById('employee-id').value = employee.id;
                document.getElementById('first-name').value = employee.firstName;
                document.getElementById('last-name').value = employee.lastName;
                document.getElementById('email').value = employee.email;
                document.getElementById('phone').value = employee.phone;
                document.getElementById('department').value = employee.department;
                document.getElementById('position').value = employee.position;
                document.getElementById('status').value = employee.status;
                
                employeeModal.style.display = 'flex';
            }
        }

        function deleteEmployee(id) {
            employees = employees.filter(emp => emp.id !== id);
            renderEmployeeTable();
            updateDashboard();
        }

        function filterEmployees() {
            const searchTerm = employeeSearch.value.toLowerCase();
            const rows = employeeTable.querySelectorAll('tr');
            
            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const email = row.cells[2].textContent.toLowerCase();
                const department = row.cells[4].textContent.toLowerCase();
                
                if (name.includes(searchTerm) || email.includes(searchTerm) || department.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Assignment functions
        function renderAssignmentTable() {
            assignmentTable.innerHTML = '';
            
            assignments.forEach(assignment => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${assignment.employeeName}</td>
                    <td>${assignment.role}</td>
                    <td>${assignment.project}</td>
                    <td class="action-buttons">
                        <button class="btn btn-primary btn-small edit-assignment" data-id="${assignment.id}"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-small delete-assignment" data-id="${assignment.id}"><i class="fas fa-trash-alt"></i> Delete</button>
                    </td>
                `;
                
                assignmentTable.appendChild(row);
            });
        }

        // Attendance functions
        function renderAttendanceTable() {
            attendanceTable.innerHTML = '';
            
            attendance.forEach(record => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${record.employeeName}</td>
                    <td>${record.date}</td>
                    <td>${record.clockIn || '-'}</td>
                    <td>${record.clockOut || '-'}</td>
                    <td>${record.status}</td>
                `;
                
                attendanceTable.appendChild(row);
            });
        }

        // Salary functions
        function renderSalaryStructureTable() {
            salaryStructureTable.innerHTML = '';
            
            salaryStructures.forEach(structure => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${structure.role}</td>
                    <td>$${structure.baseSalary.toFixed(2)}</td>
                    <td>${structure.bonus}%</td>
                    <td>${structure.taxRate}%</td>
                `;
                
                salaryStructureTable.appendChild(row);
            });
        }

        // Performance functions
        function renderPerformanceTable() {
            performanceTable.innerHTML = '';
            
            performanceRecords.forEach(record => {
                const avgRating = ((record.punctuality + record.teamwork + record.quality) / 3).toFixed(1);
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${record.employeeName}</td>
                    <td>${record.reviewDate}</td>
                    <td>${avgRating}/5</td>
                    <td class="action-buttons">
                        <button class="btn btn-primary btn-small view-performance" data-id="${record.id}"><i class="fas fa-eye"></i> View</button>
                    </td>
                `;
                
                performanceTable.appendChild(row);
            });
            
            // Add event listeners to view buttons
            document.querySelectorAll('.view-performance').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(e.target.getAttribute('data-id'));
                    viewPerformanceReview(id);
                });
            });
        }

        function viewPerformanceReview(id) {
            const record = performanceRecords.find(r => r.id === id);
            if (record) {
                const avgRating = ((record.punctuality + record.teamwork + record.quality) / 3).toFixed(1);
                
                // Set the modal content
                document.getElementById('performance-employee-name').textContent = record.employeeName;
                document.getElementById('performance-review-date').textContent = `Review Date: ${record.reviewDate}`;
                document.getElementById('performance-avg-rating').textContent = `${avgRating}/5`;
                document.getElementById('performance-feedback').textContent = record.feedback;
                document.getElementById('performance-goals').textContent = record.goals;
                
                // Render stars for overall rating
                const overallStars = document.getElementById('performance-rating-stars');
                overallStars.innerHTML = '';
                for (let i = 1; i <= 5; i++) {
                    const star = document.createElement('i');
                    star.className = i <= Math.round(avgRating) ? 'fas fa-star' : 'far fa-star';
                    overallStars.appendChild(star);
                }
                
                // Render stars for individual ratings
                renderRatingStars('punctuality-rating', record.punctuality);
                renderRatingStars('teamwork-rating', record.teamwork);
                renderRatingStars('quality-rating', record.quality);
                
                // Show the modal
                performanceModal.style.display = 'flex';
            }
        }

        function renderRatingStars(elementId, rating) {
            const element = document.getElementById(elementId);
            element.innerHTML = '';
            for (let i = 1; i <= 5; i++) {
                const star = document.createElement('i');
                star.className = i <= rating ? 'fas fa-star' : 'far fa-star';
                element.appendChild(star);
            }
        }

        // Benefits functions
        function renderBenefitsTable() {
            benefitsTable.innerHTML = '';
            
            benefits.forEach(benefit => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${benefit.employeeName}</td>
                    <td>${benefit.benefits.join(', ')}</td>
                    <td>${benefit.vacationDays}</td>
                `;
                
                benefitsTable.appendChild(row);
            });
        }

        // Leave functions
        function renderLeaveTable() {
            leaveTable.innerHTML = '';
            
            leaveRequests.forEach(request => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${request.employeeName}</td>
                    <td>${request.leaveType}</td>
                    <td>${request.status}</td>
                    <td class="action-buttons">
                        <button class="btn btn-primary btn-small view-leave" data-id="${request.id}"><i class="fas fa-eye"></i> View</button>
                        ${request.status === 'Pending' ? 
                          `<button class="btn btn-success btn-small approve-leave" data-id="${request.id}"><i class="fas fa-check"></i> Approve</button>
                           <button class="btn btn-danger btn-small reject-leave" data-id="${request.id}"><i class="fas fa-times"></i> Reject</button>` : 
                          ''}
                    </td>
                `;
                
                leaveTable.appendChild(row);
            });
        }

        // Dashboard functions
        function updateDashboard() {
            document.getElementById('total-employees').textContent = employees.length;
            
            const projects = new Set(assignments.map(a => a.project).filter(p => p !== 'N/A'));
            document.getElementById('active-projects').textContent = projects.size;
            
            const pendingCount = leaveRequests.filter(lr => lr.status === 'Pending').length;
            document.getElementById('pending-leaves').textContent = pendingCount;
            
            document.getElementById('upcoming-payroll').textContent = employees.length;
        }

        // Utility functions
        function showConfirmationModal(message, callback) {
            document.getElementById('confirmation-message').textContent = message;
            confirmCallback = callback;
            confirmationModal.style.display = 'flex';
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>