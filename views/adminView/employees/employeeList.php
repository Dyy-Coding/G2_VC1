<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Database Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* CSS Styles */
        :root {
            --primary-color: #1a73e8; /* Google blue */
            --secondary-color: #0d47a1; /* Darker blue */
            --dark-color: #202124; /* Almost black */
            --light-color: #ffffff; /* White */
            --text-color: #000000; /* Black text */
            --card-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            margin-top: -36px;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            margin-left: 35px;
            width: 94%;
            border-radius: 8px;
            background: var(--light-color);
            color: var(--text-color);
            padding: 25px 0;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            border: 1px solid lightgray;
        }
        
        header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
        }
        
        h1 {
            color: var(--text-color);
            margin-bottom: 10px;
            font-weight: 560;
            font-size: 2.5rem;
        }
        
        .auth-section {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .auth-form {
            background: var(--light-color);
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            width: 100%;
            max-width: 400px;
            transform: translateY(0);
            transition: var(--transition);
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .auth-form:hover {
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            transform: translateY(-3px);
        }
        
        .auth-form h2 {
            color: var(--text-color);
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: var(--transition);
            background-color: var(--light-color);
            color: var(--text-color);
        }
        
        .form-group input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
            outline: none;
        }
        
        button {
            background-color: var(--primary-color);
            color: var(--light-color);
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: var(--transition);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        button:hover {
            background-color: var(--secondary-color);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        button:active {
            transform: scale(0.98);
        }
        
        button i {
            margin-right: 8px;
        }
        
        .dashboard {
            display: none;
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out forwards;
            animation-delay: 0.2s;
        }

        #logoutBtn {
            background-color: red;
        }
        
        nav {
            padding: 15px;
            margin-bottom: 25px;
            position: sticky;
            top: 20px;
            z-index: 100;
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
        }
        nav ul {
            display: flex;
            list-style: none;
            justify-content: space-around;
        }
        
        nav ul li a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 8px;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }
        
        nav ul li a i {
            margin-right: 8px;
        }
        
        nav ul li a:hover, nav ul li a.active {
            background-color: var(--primary-color);
            color: var(--light-color);
            box-shadow: 0 4px 8px rgba(26, 115, 232, 0.2);
        }
        
        .content-section {
            display: none;
            background-color: var(--light-color);
            padding: 25px;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
            animation: fadeInUp 0.5s ease-out;
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .content-section.active {
            display: block;
        }
        
        .content-section h2 {
            color: var(--text-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }
        
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .card {
            background-color: var(--light-color);
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            border-left: 4px solid var(--primary-color);
            transition: var(--transition);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 115, 232, 0.1), rgba(26, 115, 232, 0.05));
            opacity: 0;
            transition: var(--transition);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        
        .card:hover::before {
            opacity: 1;
        }
        
        .card h3 {
            font-size: 20px;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .card p {
            font-size: 12px;
            margin-bottom: 15px;
            color: var(--text-color);
            line-height: 1.5;
            opacity: 0.8;
        }
        
        .action-btn {
            background-color: var(--primary-color);
            color: var(--light-color);
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
        }
        
        .action-btn i {
            margin-right: 6px;
        }
        
        .action-btn:hover {
            background-color: var(--secondary-color);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .detail-view {
            display: none;
            background-color: var(--light-color);
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-top: 20px;
            animation: fadeInUp 0.4s ease-out;
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .detail-view h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }
        
        .detail-content {
            margin-bottom: 30px;
        }
        
        .detail-content p {
            margin-bottom: 20px;
            color: var(--text-color);
            line-height: 1.6;
            opacity: 0.9;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: var(--transition);
            background-color: var(--light-color);
            color: var(--text-color);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
            outline: none;
        }
        
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        
        .save-btn {
            background-color: var(--primary-color);
        }
        
        .save-btn:hover {
            background-color: var(--secondary-color);
        }
        
        .cancel-btn {
            background-color: #f1f3f4;
            color: var(--text-color);
        }
        
        .cancel-btn:hover {
            background-color: #e0e0e0;
        }
        
        .logout-btn {
            background-color: var(--primary-color);
            max-width: 150px;
            margin-left: auto;
            display: block;
            margin-bottom: 20px;
        }
        
        .logout-btn:hover {
            background-color: var(--secondary-color);
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        /* Toast notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: var(--light-color);
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            z-index: 1000;
            transform: translateX(150%);
            transition: transform 0.3s ease-out;
        }
        
        .toast.show {
            transform: translateX(0);
        }
        
        .toast i {
            margin-right: 10px;
            font-size: 20px;
        }
        
        /* Loading spinner */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-right: 8px;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 10px;
            }
            
            .card-container {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .action-buttons button {
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="animate__animated animate__fadeInDown">
        <div class="container">
            <h1><i class="fas fa-users-cog"></i> Employee Management</h1>
        </div>
    </header>
    
    <div class="container">
        <!-- Login Section -->
        <div class="auth-section" id="authSection">
            <form class="auth-form" id="loginForm">
                <h2><i class="fas fa-sign-in-alt"></i> Login</h2>
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" id="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" id="password" placeholder="Enter your password" required>
                </div>
                <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
            </form>
        </div>
        
        <!-- Dashboard Section -->
        <div class="dashboard" id="dashboard">
            <button class="logout-btn" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            
            <nav>
                <ul>
                    <li><a href="#" class="active" data-section="employee-management"><i class="fas fa-users"></i> Employee Management</a></li>
                    <li><a href="#" data-section="payroll"><i class="fas fa-money-bill-wave"></i> Payroll</a></li>
                    <li><a href="#" data-section="performance"><i class="fas fa-chart-line"></i> Performance</a></li>
                </ul>
            </nav>
            
            <!-- Employee Management Section -->
            <section id="employee-management" class="content-section active">
                <h2><i class="fas fa-users"></i> Employee Management</h2>
                <div class="card-container">
                    <div class="card animate__animated animate__fadeIn" data-id="CV1-256">
                        <h3>Employees Role and Job</h3>
                        <p>Employee Role and Job Assignment</p>
                        <button class="action-btn"><i class="fas fa-cog"></i> Manage</button>
                    </div>
                    <div class="card animate__animated animate__fadeIn" data-id="CV1-259" style="animation-delay: 0.1s;">
                        <h3>Employee Attendance</h3>
                        <p>Employee Attendance and Time Tracking</p>
                        <button class="action-btn"><i class="fas fa-clock"></i> Manage</button>
                    </div>
                    <div class="card animate__animated animate__fadeIn" data-id="CV1-276" style="animation-delay: 0.3s;">
                        <h3>Employee Records</h3>
                        <p>Admin Access to Employee Records</p>
                        <button class="action-btn"><i class="fas fa-user-shield"></i> Manage</button>
                    </div>
                    <div class="card animate__animated animate__fadeIn" data-id="CV1-271" style="animation-delay: 0.2s;">
                        <h3>Employee Benefits</h3>
                        <p>Employee Benefits and Leave Management</p>
                        <button class="action-btn"><i class="fas fa-umbrella-beach"></i> Manage</button>
                    </div>
                </div>
            </section>
            
            <!-- Payroll Section -->
            <section id="payroll" class="content-section">
                <h2><i class="fas fa-money-bill-wave"></i> Payroll Management</h2>
                <div class="card-container">
                    <div class="card animate__animated animate__fadeIn" data-id="CV1-264">
                        <h3>Set up salary</h3>
                        <p>Set up salary structures based on employee roles</p>
                        <button class="action-btn"><i class="fas fa-sliders-h"></i> Configure</button>
                    </div>
                    <div class="card animate__animated animate__fadeIn" data-id="CV1-266" style="animation-delay: 0.1s;">
                        <h3>Salary slips</h3>
                        <p>Generate and send salary slips to employees</p>
                        <button class="action-btn"><i class="fas fa-file-invoice-dollar"></i> Generate</button>
                    </div>
                </div>
            </section>
            
            <!-- Performance Section -->
            <section id="performance" class="content-section">
                <h2><i class="fas fa-chart-line"></i> Performance Management</h2>
                <div class="card-container">
                    <div class="card animate__animated animate__fadeIn" data-id="CV1-267">
                        <h3>Employee Performance</h3>
                        <p>Employee Performance and Feedback</p>
                        <button class="action-btn"><i class="fas fa-star"></i> Evaluate</button>
                    </div>
                    <div class="card animate__animated animate__fadeIn" data-id="CV1-278" style="animation-delay: 0.1s;">
                        <h3>Admin Performance</h3>
                        <p>Admin Employee Performance Tracking</p>
                        <button class="action-btn"><i class="fas fa-chart-bar"></i> Track</button>
                    </div>
                    <div class="card animate__animated animate__fadeIn" data-id="CV1-287" style="animation-delay: 0.2s;">
                        <h3>Employee Reports</h3>
                        <p>Employee Performance Reports</p>
                        <button class="action-btn"><i class="fas fa-file-alt"></i> Generate Reports</button>
                    </div>
                </div>
            </section>
            
            <!-- Detail View Section -->
            <div class="detail-view" id="detailView">
                <h2 id="detailTitle"><i class="fas fa-info-circle"></i> CV1-256: Employee Role and Job Assignment</h2>
                <div class="detail-content" id="detailContent">
                    <!-- Content will be loaded dynamically -->
                </div>
                <div class="action-buttons">
                    <button class="save-btn" id="saveBtn"><i class="fas fa-save"></i> Save Changes</button>
                    <button class="cancel-btn" id="cancelBtn"><i class="fas fa-times"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <i class="fas fa-check-circle"></i>
        <span id="toastMessage">Changes saved successfully!</span>
    </div>
    
    <script>
        // JavaScript with enhanced animations
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const authSection = document.getElementById('authSection');
            const dashboard = document.getElementById('dashboard');
            const loginForm = document.getElementById('loginForm');
            const logoutBtn = document.getElementById('logoutBtn');
            const navLinks = document.querySelectorAll('nav ul li a');
            const contentSections = document.querySelectorAll('.content-section');
            const cards = document.querySelectorAll('.card');
            const actionBtns = document.querySelectorAll('.action-btn');
            const detailView = document.getElementById('detailView');
            const detailTitle = document.getElementById('detailTitle');
            const detailContent = document.getElementById('detailContent');
            const saveBtn = document.getElementById('saveBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            
            // Sample data for each module
            const moduleData = {
                'CV1-256': {
                    title: 'Employee Role and Job Assignment',
                    description: 'Manage employee roles, departments, and job assignments. This module allows HR administrators to assign and modify employee roles, departments, and specific job responsibilities.',
                    fields: [
                        { label: 'Employee ID', type: 'text', value: 'EMP-1001' },
                        { label: 'Current Role', type: 'text', value: 'Software Developer' },
                        { label: 'Department', type: 'select', options: ['IT', 'HR', 'Finance', 'Operations'], value: 'IT' },
                        { label: 'Assigned Projects', type: 'textarea', value: 'ERP System Upgrade, Customer Portal' }
                    ]
                },
                'CV1-259': {
                    title: 'Employee Attendance and Time Tracking',
                    description: 'Track employee attendance, working hours, and time-off requests. This comprehensive module provides real-time insights into employee attendance patterns and time management.',
                    fields: [
                        { label: 'Employee ID', type: 'text', value: 'EMP-1001' },
                        { label: 'Current Month Attendance', type: 'text', value: '22/24 days' },
                        { label: 'Total Working Hours', type: 'text', value: '176 hours' },
                        { label: 'Pending Time-off Requests', type: 'number', value: '2' }
                    ]
                },
                'CV1-264': {
                    title: 'Salary Structure Setup',
                    description: 'Configure salary structures based on roles and experience levels. Create customized compensation packages that align with your organization\'s pay structure and policies.',
                    fields: [
                        { label: 'Role', type: 'text', value: 'Software Developer' },
                        { label: 'Base Salary', type: 'number', value: '75000' },
                        { label: 'Bonus Structure', type: 'select', options: ['Performance-based', 'Fixed', 'Profit-sharing'], value: 'Performance-based' },
                        { label: 'Benefits Package', type: 'textarea', value: 'Health insurance, 401k matching, Stock options' }
                    ]
                },
                'CV1-266': {
                    title: 'Salary Slip Generation',
                    description: 'Generate and distribute salary slips to employees. Automate the payroll process with customizable templates and secure delivery options.',
                    fields: [
                        { label: 'Pay Period', type: 'month', value: '2023-11' },
                        { label: 'Total Employees', type: 'number', value: '143' },
                        { label: 'Processed Slips', type: 'number', value: '143' },
                        { label: 'Delivery Method', type: 'select', options: ['Email', 'Portal', 'Printed'], value: 'Email' }
                    ]
                },
                'CV1-267': {
                    title: 'Employee Performance and Feedback',
                    description: 'Conduct performance reviews and collect feedback. Streamline your performance management process with customizable review templates and 360-degree feedback options.',
                    fields: [
                        { label: 'Employee ID', type: 'text', value: 'EMP-1001' },
                        { label: 'Last Review Date', type: 'date', value: '2023-06-15' },
                        { label: 'Overall Rating', type: 'select', options: ['Excellent', 'Good', 'Average', 'Needs Improvement'], value: 'Good' },
                        { label: 'Feedback Notes', type: 'textarea', value: 'Strong technical skills. Could improve communication with non-technical teams.' }
                    ]
                },
                'CV1-271': {
                    title: 'Employee Benefits and Leave Management',
                    description: 'Manage employee benefits and leave requests. Centralize all employee benefits and leave management in one easy-to-use platform with automated approval workflows.',
                    fields: [
                        { label: 'Employee ID', type: 'text', value: 'EMP-1001' },
                        { label: 'Available Vacation Days', type: 'number', value: '12' },
                        { label: 'Sick Days Used', type: 'number', value: '3' },
                        { label: 'Current Benefits', type: 'textarea', value: 'Health, Dental, Vision, 401k matching' }
                    ]
                },
                'CV1-276': {
                    title: 'Admin Access to Employee Records',
                    description: 'Control administrative access to sensitive employee records. Implement granular access controls to ensure data security and privacy compliance.',
                    fields: [
                        { label: 'Admin Level', type: 'select', options: ['HR Manager', 'Department Head', 'Executive'], value: 'HR Manager' },
                        { label: 'Access Permissions', type: 'checkbox-group', options: ['Personal Data', 'Salary Info', 'Performance Reviews', 'Disciplinary Records'], values: [true, true, true, false] },
                        { label: 'Last Access Log', type: 'text', value: '2023-11-15 14:30:22' }
                    ]
                },
                'CV1-278': {
                    title: 'Admin Employee Performance Tracking',
                    description: 'Track and analyze employee performance metrics. Gain valuable insights with comprehensive dashboards and analytics tools for workforce performance.',
                    fields: [
                        { label: 'Department', type: 'select', options: ['IT', 'HR', 'Finance', 'Operations'], value: 'IT' },
                        { label: 'Average Performance Rating', type: 'text', value: '4.2/5' },
                        { label: 'Top Performers', type: 'text', value: 'EMP-1001, EMP-1024, EMP-1045' },
                        { label: 'Training Needs', type: 'textarea', value: 'Team communication, Advanced technical training' }
                    ]
                },
                'CV1-287': {
                    title: 'Employee Performance Reports',
                    description: 'Generate comprehensive performance reports. Create customized reports with visual analytics to support data-driven decision making.',
                    fields: [
                        { label: 'Report Type', type: 'select', options: ['Individual', 'Team', 'Department', 'Company-wide'], value: 'Department' },
                        { label: 'Time Period', type: 'select', options: ['Monthly', 'Quarterly', 'Annual'], value: 'Quarterly' },
                        { label: 'Include Metrics', type: 'checkbox-group', options: ['Productivity', 'Quality', 'Attendance', 'Peer Reviews'], values: [true, true, false, true] }
                    ]
                }
            };
            
            // Show toast notification
            function showToast(message, type = 'success') {
                toastMessage.textContent = message;
                toast.className = 'toast';
                
                // Set color based on type
                if (type === 'success') {
                    toast.style.backgroundColor = 'var(--primary-color)';
                } else if (type === 'error') {
                    toast.style.backgroundColor = '#d32f2f';
                } else if (type === 'warning') {
                    toast.style.backgroundColor = '#ffa000';
                } else {
                    toast.style.backgroundColor = 'var(--primary-color)';
                }
                
                // Show icon based on type
                const icon = toast.querySelector('i');
                if (type === 'success') {
                    icon.className = 'fas fa-check-circle';
                } else if (type === 'error') {
                    icon.className = 'fas fa-exclamation-circle';
                } else if (type === 'warning') {
                    icon.className = 'fas fa-exclamation-triangle';
                } else {
                    icon.className = 'fas fa-info-circle';
                }
                
                toast.classList.add('show');
                
                // Hide after 3 seconds
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }
            
            // Login functionality with animation
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;
                
                // Add loading state to button
                const submitBtn = loginForm.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner"></span> Authenticating...';
                submitBtn.disabled = true;
                
                // Simulate API call with timeout
                setTimeout(() => {
                    // Simple validation (in a real app, this would be a server-side check)
                    if (username && password) {
                        // Animate login form out
                        loginForm.classList.add('animate__animated', 'animate__fadeOut');
                        
                        setTimeout(() => {
                            authSection.style.display = 'none';
                            dashboard.style.display = 'block';
                            
                            // Animate dashboard in
                            dashboard.classList.add('animate__animated', 'animate__fadeIn');
                            
                            // Reset login form
                            loginForm.classList.remove('animate__fadeOut');
                            submitBtn.innerHTML = originalBtnText;
                            submitBtn.disabled = false;
                            
                            showToast('Login successful! Welcome back.');
                        }, 500);
                    } else {
                        showToast('Invalid credentials. Please try again.', 'error');
                        submitBtn.innerHTML = originalBtnText;
                        submitBtn.disabled = false;
                    }
                }, 1500);
            });
            
            // Logout functionality with animation
            logoutBtn.addEventListener('click', function() {
                // Animate dashboard out
                dashboard.classList.add('animate__animated', 'animate__fadeOut');
                
                setTimeout(() => {
                    dashboard.style.display = 'none';
                    authSection.style.display = 'flex';
                    detailView.style.display = 'none';
                    document.getElementById('username').value = '';
                    document.getElementById('password').value = '';
                    
                    // Reset active section
                    const activeNavLink = document.querySelector('nav ul li a.active');
                    if (activeNavLink) {
                        const sectionId = activeNavLink.getAttribute('data-section');
                        document.getElementById(sectionId).classList.add('active');
                    }
                    
                    // Animate login form in
                    authSection.classList.add('animate__animated', 'animate__fadeIn');
                    dashboard.classList.remove('animate__fadeOut');
                    
                    showToast('You have been logged out successfully.');
                }, 500);
            });
            
            // Navigation between sections with animation
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Don't do anything if already active
                    if (this.classList.contains('active')) return;
                    
                    // Update active nav link with animation
                    navLinks.forEach(l => {
                        if (l.classList.contains('active')) {
                            l.classList.remove('active');
                            l.classList.add('animate__animated', 'animate__fadeOut');
                            setTimeout(() => {
                                l.classList.remove('animate__fadeOut');
                            }, 300);
                        }
                    });
                    
                    this.classList.add('active', 'animate__animated', 'animate__pulse');
                    setTimeout(() => {
                        this.classList.remove('animate__pulse');
                    }, 500);
                    
                    // Show the corresponding section with animation
                    const sectionId = this.getAttribute('data-section');
                    contentSections.forEach(section => {
                        if (section.classList.contains('active')) {
                            section.classList.remove('active');
                            section.classList.add('animate__animated', 'animate__fadeOut');
                            setTimeout(() => {
                                section.classList.remove('animate__fadeOut');
                            }, 300);
                        }
                        
                        if (section.id === sectionId) {
                            setTimeout(() => {
                                section.classList.add('active', 'animate__animated', 'animate__fadeIn');
                            }, 50);
                        }
                    });
                    
                    // Hide detail view when switching sections
                    detailView.style.display = 'none';
                });
            });
            
            // Card click handlers with animation
            cards.forEach(card => {
                const actionBtn = card.querySelector('.action-btn');
                actionBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    
                    // Add pulse animation to clicked card
                    card.classList.add('animate__animated', 'animate__pulse');
                    setTimeout(() => {
                        card.classList.remove('animate__pulse');
                    }, 500);
                    
                    const moduleId = card.getAttribute('data-id');
                    showDetailView(moduleId);
                });
                
                // Also make entire card clickable
                card.addEventListener('click', function() {
                    const moduleId = card.getAttribute('data-id');
                    showDetailView(moduleId);
                });
            });
            
            // Show detail view for a module with animation
            function showDetailView(moduleId) {
                const module = moduleData[moduleId];
                
                // Update detail view title
                detailTitle.innerHTML = `<i class="fas fa-info-circle"></i> ${moduleId}: ${module.title}`;
                
                // Build the form fields
                let formHTML = `<p>${module.description}</p>`;
                
                module.fields.forEach(field => {
                    if (field.type === 'select') {
                        formHTML += `
                            <div class="form-group">
                                <label><i class="fas fa-caret-down"></i> ${field.label}</label>
                                <select class="form-control">
                                    ${field.options.map(opt => 
                                        `<option value="${opt}" ${opt === field.value ? 'selected' : ''}>${opt}</option>`
                                    ).join('')}
                                </select>
                            </div>
                        `;
                    } else if (field.type === 'checkbox-group') {
                        formHTML += `
                            <div class="form-group">
                                <label><i class="fas fa-check-square"></i> ${field.label}</label>
                                <div class="checkbox-container" style="display: flex; flex-direction: column; gap: 8px; margin-top: 8px;">
                                    ${field.options.map((opt, index) => `
                                        <div style="display: flex; align-items: center;">
                                            <input type="checkbox" id="${moduleId}-${opt.replace(/\s+/g, '-').toLowerCase()}" 
                                                   ${field.values[index] ? 'checked' : ''}
                                                   style="margin-right: 8px;">
                                            <label for="${moduleId}-${opt.replace(/\s+/g, '-').toLowerCase()}">${opt}</label>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                        `;
                    } else if (field.type === 'textarea') {
                        formHTML += `
                            <div class="form-group">
                                <label><i class="fas fa-align-left"></i> ${field.label}</label>
                                <textarea class="form-control" rows="3">${field.value}</textarea>
                            </div>
                        `;
                    } else {
                        formHTML += `
                            <div class="form-group">
                                <label><i class="fas fa-pen"></i> ${field.label}</label>
                                <input type="${field.type}" class="form-control" value="${field.value}">
                            </div>
                        `;
                    }
                });
                
                detailContent.innerHTML = formHTML;
                
                // Hide all content sections and show detail view with animation
                contentSections.forEach(section => {
                    if (section.classList.contains('active')) {
                        section.classList.remove('active');
                        section.classList.add('animate__animated', 'animate__fadeOut');
                        setTimeout(() => {
                            section.classList.remove('animate__fadeOut');
                        }, 300);
                    }
                });
                
                detailView.style.display = 'block';
                detailView.classList.add('animate__animated', 'animate__fadeInUp');
            }
            
            // Cancel button in detail view with animation
            cancelBtn.addEventListener('click', function() {
                detailView.classList.add('animate__animated', 'animate__fadeOut');
                
                setTimeout(() => {
                    detailView.style.display = 'none';
                    detailView.classList.remove('animate__fadeOut');
                    
                    // Show the active section again with animation
                    const activeNavLink = document.querySelector('nav ul li a.active');
                    if (activeNavLink) {
                        const sectionId = activeNavLink.getAttribute('data-section');
                        document.getElementById(sectionId).classList.add('active', 'animate__animated', 'animate__fadeIn');
                    }
                }, 300);
            });
            
            // Save button in detail view with animation
            saveBtn.addEventListener('click', function() {
                // Add loading state
                const originalBtnText = saveBtn.innerHTML;
                saveBtn.innerHTML = '<span class="spinner"></span> Saving...';
                saveBtn.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    showToast('Changes saved successfully!');
                    saveBtn.innerHTML = originalBtnText;
                    saveBtn.disabled = false;
                    
                    // Close detail view after save
                    cancelBtn.click();
                }, 1000);
            });
            
            // Add hover animations to cards
            cards.forEach((card, index) => {
                card.addEventListener('mouseenter', () => {
                    card.classList.add('animate__animated', 'animate__pulse');
                });
                
                card.addEventListener('mouseleave', () => {
                    card.classList.remove('animate__animated', 'animate__pulse');
                });
            });
        });
    </script>
</body>
</html>