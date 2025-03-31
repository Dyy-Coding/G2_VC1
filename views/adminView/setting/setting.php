<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings | Your Application</title>
    <style>
        :root {
            --primary-color: #4a6bff;
            --primary-light: rgba(74, 107, 255, 0.1);
            --secondary-color: #6c757d;
            --danger-color: #dc3545;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --gray-color: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 8px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
            --sidebar-width: 280px;
            --header-height: 80px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            background-color: #f5f7fb;
            color: var(--dark-color);
            line-height: 1.6;
            padding: 0;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        header {
            text-align: center;
            margin-bottom: 50px;
        }

        h1 {
            color: var(--dark-color);
            margin-bottom: 15px;
            font-size: 2.5rem;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        h1:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .header-description {
            color: var(--gray-color);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 20px auto 0;
        }

        .settings-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            border: 1px solid var(--light-gray);
        }

        .settings-nav {
            flex: 1;
            min-width: var(--sidebar-width);
            background: white;
            padding: 35px 25px;
            border-right: 1px solid var(--light-gray);
        }

        .settings-nav h2 {
            margin-bottom: 30px;
            color: var(--dark-color);
            font-size: 1.3rem;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            align-items: center;
        }

        .settings-nav h2 i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 14px 18px;
            margin-bottom: 8px;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            color: var(--dark-color);
            font-weight: 500;
            background-color: transparent;
            position: relative;
        }

        .nav-item:hover {
            background-color: var(--light-color);
            color: var(--primary-color);
        }

        .nav-item.active {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        .nav-item.active:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-color);
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
        }

        .nav-item i {
            margin-right: 12px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
            color: inherit;
        }

        .nav-item .badge {
            margin-left: auto;
            background: var(--primary-color);
            color: white;
            font-size: 0.7rem;
            padding: 3px 6px;
            border-radius: 10px;
        }

        .settings-content {
            flex: 3;
            min-width: 300px;
            padding: 40px 35px;
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .tab-content.active {
            display: block;
        }

        .tab-header {
            margin-bottom: 35px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--light-gray);
        }

        .tab-header h2 {
            color: var(--dark-color);
            font-size: 1.8rem;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .tab-header p {
            color: var(--gray-color);
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 28px;
        }

        label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: var(--dark-color);
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 15px 18px;
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            background-color: white;
            color: var(--dark-color);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 107, 255, 0.2);
        }

        .input-icon {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-color);
            cursor: pointer;
            transition: var(--transition);
        }

        .input-icon:hover {
            color: var(--primary-color);
        }

        .password-strength {
            margin-top: 12px;
            height: 6px;
            background-color: var(--light-gray);
            border-radius: 3px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: var(--transition);
        }

        .strength-weak {
            background-color: var(--danger-color);
        }

        .strength-medium {
            background-color: var(--warning-color);
        }

        .strength-strong {
            background-color: var(--success-color);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 15px 30px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn:hover {
            background-color: #3a5bef;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(74, 107, 255, 0.2);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn i {
            margin-right: 10px;
            color: white;
        }

        .btn-danger {
            background-color: var(--danger-color);
        }

        .btn-danger:hover {
            background-color: #c82333;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
        }

        .btn-success {
            background-color: var(--success-color);
        }

        .btn-success:hover {
            background-color: #218838;
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: var(--primary-light);
            box-shadow: none;
            transform: none;
        }

        .btn-outline i {
            color: var(--primary-color);
        }

        .btn-sm {
            padding: 10px 20px;
            font-size: 0.9rem;
        }

        .profile-picture {
            display: flex;
            align-items: center;
            margin-bottom: 35px;
            flex-wrap: wrap;
            gap: 25px;
        }

        .profile-picture img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .profile-picture img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .file-input {
            display: none;
        }

        .file-label {
            display: inline-flex;
            align-items: center;
            padding: 14px 22px;
            background-color: var(--light-color);
            color: var(--dark-color);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .file-label:hover {
            background-color: var(--light-gray);
        }

        .verification-message {
            margin-top: 18px;
            padding: 16px;
            border-radius: var(--border-radius);
            font-size: 0.95rem;
            color: white;
            display: flex;
            align-items: center;
        }

        .verification-message i {
            margin-right: 10px;
        }

        .success {
            background-color: var(--success-color);
            border-left: 4px solid #1e7e34;
        }

        .error {
            background-color: var(--danger-color);
            border-left: 4px solid #bd2130;
        }

        .warning {
            background-color: var(--warning-color);
            border-left: 4px solid #d39e00;
            color: var(--dark-color);
        }

        .info {
            background-color: var(--info-color);
            border-left: 4px solid #117a8b;
        }

        .password-requirements {
            margin: 25px 0;
            padding: 20px;
            background-color: var(--light-color);
            border-radius: var(--border-radius);
            border-left: 4px solid var(--primary-color);
        }

        .password-requirements h4 {
            margin-bottom: 12px;
            color: var(--dark-color);
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }

        .password-requirements h4 i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        .requirement {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            color: var(--dark-color);
        }

        .requirement i {
            margin-right: 10px;
            font-size: 0.9rem;
            width: 18px;
            text-align: center;
        }

        .requirement.valid i {
            color: var(--success-color);
        }

        .requirement.invalid i {
            color: var(--danger-color);
        }

        .security-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 22px;
            background-color: white;
            border-radius: var(--border-radius);
            margin-bottom: 18px;
            transition: var(--transition);
            border: 1px solid var(--light-gray);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .security-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-color: var(--primary-light);
        }

        .security-info h4 {
            margin-bottom: 6px;
            color: var(--dark-color);
            font-size: 1.1rem;
        }

        .security-info p {
            color: var(--gray-color);
            font-size: 0.95rem;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 26px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--light-gray);
            transition: var(--transition);
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: var(--transition);
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--primary-color);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 18px;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid var(--light-gray);
        }

        .account-delete {
            margin-top: 50px;
            padding: 25px;
            background-color: white;
            border-radius: var(--border-radius);
            border-left: 4px solid var(--danger-color);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .account-delete h3 {
            color: var(--danger-color);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
        }

        .account-delete h3 i {
            margin-right: 10px;
        }

        .account-delete p {
            color: var(--gray-color);
            margin-bottom: 18px;
        }

        .help-text {
            font-size: 0.85rem;
            color: var(--gray-color);
            margin-top: 8px;
            font-style: italic;
        }

        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 0.75rem;
            font-weight: 600;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 10px;
        }

        .badge-primary {
            color: white;
            background-color: var(--primary-color);
        }

        .badge-success {
            color: white;
            background-color: var(--success-color);
        }

        .badge-warning {
            color: var(--dark-color);
            background-color: var(--warning-color);
        }

        .badge-danger {
            color: white;
            background-color: var(--danger-color);
        }

        .badge-info {
            color: white;
            background-color: var(--info-color);
        }

        .session-item {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: white;
            border-radius: var(--border-radius);
            margin-bottom: 15px;
            border: 1px solid var(--light-gray);
            transition: var(--transition);
        }

        .session-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .session-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary-light);
            color: var(--primary-color);
            border-radius: 50%;
            margin-right: 20px;
            font-size: 1.5rem;
        }

        .session-info {
            flex: 1;
        }

        .session-info h4 {
            margin-bottom: 5px;
            color: var(--dark-color);
        }

        .session-info p {
            color: var(--gray-color);
            font-size: 0.9rem;
        }

        .session-meta {
            display: flex;
            margin-top: 8px;
            font-size: 0.85rem;
        }

        .session-meta span {
            margin-right: 15px;
            display: flex;
            align-items: center;
        }

        .session-meta i {
            margin-right: 5px;
            color: var(--gray-color);
        }

        .session-actions {
            margin-left: 20px;
        }

        .current-session {
            border-left: 4px solid var(--success-color);
        }

        .suspicious-session {
            border-left: 4px solid var(--danger-color);
        }

        .two-factor-setup {
            margin-top: 30px;
            padding: 25px;
            background-color: white;
            border-radius: var(--border-radius);
            border: 1px solid var(--light-gray);
        }

        .two-factor-setup h3 {
            margin-bottom: 20px;
            color: var(--dark-color);
        }

        .two-factor-methods {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .two-factor-method {
            flex: 1;
            padding: 20px;
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .two-factor-method:hover {
            border-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .two-factor-method.active {
            border-color: var(--primary-color);
            background-color: var(--primary-light);
        }

        .two-factor-method h4 {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .two-factor-method h4 i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        .two-factor-method p {
            color: var(--gray-color);
            font-size: 0.9rem;
        }

        .qr-code {
            text-align: center;
            margin: 20px 0;
            padding: 20px;
            background-color: white;
            border-radius: var(--border-radius);
        }

        .qr-code img {
            max-width: 200px;
            margin-bottom: 15px;
        }

        .backup-codes {
            margin-top: 30px;
            padding: 20px;
            background-color: var(--light-color);
            border-radius: var(--border-radius);
        }

        .backup-codes h4 {
            margin-bottom: 15px;
        }

        .code-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .code-item {
            padding: 10px;
            background-color: white;
            border-radius: var(--border-radius);
            font-family: monospace;
            text-align: center;
            border: 1px dashed var(--light-gray);
        }

        .preferences-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .preference-item {
            padding: 20px;
            background-color: white;
            border-radius: var(--border-radius);
            border: 1px solid var(--light-gray);
        }

        .preference-item h4 {
            margin-bottom: 15px;
            color: var(--dark-color);
        }

        .preference-item p {
            color: var(--gray-color);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .notification-settings {
            margin-top: 30px;
        }

        .notification-category {
            margin-bottom: 30px;
        }

        .notification-category h3 {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--light-gray);
        }

        .notification-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: white;
            border-radius: var(--border-radius);
            margin-bottom: 10px;
            border: 1px solid var(--light-gray);
        }

        .notification-item:hover {
            background-color: var(--light-color);
        }

        .notification-info h4 {
            margin-bottom: 5px;
            color: var(--dark-color);
        }

        .notification-info p {
            color: var(--gray-color);
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .settings-container {
                flex-direction: column;
            }

            .settings-nav {
                padding: 25px;
                border-right: none;
                border-bottom: 1px solid var(--light-gray);
            }

            .settings-content {
                padding: 30px 25px;
            }

            .profile-picture {
                flex-direction: column;
                text-align: center;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }

            .two-factor-methods {
                flex-direction: column;
            }
        }

        /* Dark mode styles */
        body.dark-mode {
            background-color: #1a1a2e;
            color: #f8f9fa;
        }

        body.dark-mode .settings-container,
        body.dark-mode .settings-nav,
        body.dark-mode .security-item,
        body.dark-mode .session-item,
        body.dark-mode .two-factor-setup,
        body.dark-mode .two-factor-method,
        body.dark-mode .qr-code,
        body.dark-mode .preference-item,
        body.dark-mode .notification-item,
        body.dark-mode .code-item,
        body.dark-mode input[type="text"],
        body.dark-mode input[type="email"],
        body.dark-mode input[type="password"],
        body.dark-mode input[type="tel"],
        body.dark-mode input[type="date"],
        body.dark-mode select,
        body.dark-mode textarea {
            background-color: #16213e;
            color: #f8f9fa;
            border-color: #2a2a4a;
        }

        body.dark-mode .settings-nav h2,
        body.dark-mode .tab-header h2,
        body.dark-mode label,
        body.dark-mode .security-info h4,
        body.dark-mode .session-info h4,
        body.dark-mode .two-factor-setup h3,
        body.dark-mode .two-factor-method h4,
        body.dark-mode .preference-item h4,
        body.dark-mode .notification-info h4,
        body.dark-mode h1,
        body.dark-mode .account-delete h3 {
            color: #f8f9fa;
        }

        body.dark-mode .header-description,
        body.dark-mode .tab-header p,
        body.dark-mode .security-info p,
        body.dark-mode .session-info p,
        body.dark-mode .two-factor-method p,
        body.dark-mode .preference-item p,
        body.dark-mode .notification-info p,
        body.dark-mode .account-delete p,
        body.dark-mode .help-text,
        body.dark-mode .session-meta,
        body.dark-mode .session-meta i {
            color: #adb5bd;
        }

        body.dark-mode .password-requirements,
        body.dark-mode .backup-codes {
            background-color: #1e2a4a;
            border-color: #2a2a4a;
        }

        body.dark-mode .nav-item:hover {
            background-color: #1e2a4a;
        }

        body.dark-mode .nav-item.active {
            background-color: #1e2a4a;
        }

        body.dark-mode .file-label {
            background-color: #1e2a4a;
            color: #f8f9fa;
        }

        body.dark-mode .file-label:hover {
            background-color: #2a3a5a;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Account Settings</h1>
            <p class="header-description">Manage your personal information, security settings, and account preferences</p>
        </header>

        <div class="settings-container">
            <div class="settings-nav">
                <h2><i class="fas fa-cog"></i> Settings Menu</h2>
                <div class="nav-item active" data-tab="profile">
                    <i class="fas fa-user"></i>
                    Profile Information
                </div>
                <div class="nav-item" data-tab="email">
                    <i class="fas fa-envelope"></i>
                    Email Address
                    <span class="badge badge-warning">Unverified</span>
                </div>
                <div class="nav-item" data-tab="password">
                    <i class="fas fa-lock"></i>
                    Password
                </div>
                <div class="nav-item" data-tab="security">
                    <i class="fas fa-shield-alt"></i>
                    Security
                    <span class="badge badge-primary">New</span>
                </div>
                <div class="nav-item" data-tab="preferences">
                    <i class="fas fa-sliders-h"></i>
                    Preferences
                </div>
                <div class="nav-item" data-tab="sessions">
                    <i class="fas fa-desktop"></i>
                    Active Sessions
                </div>
                <div class="nav-item" data-tab="billing">
                    <i class="fas fa-credit-card"></i>
                    Billing & Subscriptions
                </div>
                <div class="nav-item" data-tab="privacy">
                    <i class="fas fa-user-secret"></i>
                    Privacy Settings
                </div>
            </div>

            <div class="settings-content">
                <!-- Profile Information Tab -->
                <div class="tab-content active" id="profile">
                    <div class="tab-header">
                        <h2>Profile Information</h2>
                        <p>Update your basic profile information and avatar</p>
                    </div>
                    
                    <div class="profile-picture">
                        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1180&q=80" alt="Profile Picture" id="profile-img">
                        <div class="profile-picture-actions">
                            <input type="file" id="profile-picture" class="file-input" accept="image/*">
                            <label for="profile-picture" class="file-label">
                                <i class="fas fa-camera"></i> Upload New Photo
                            </label>
                            <button class="btn btn-outline" id="remove-picture">
                                <i class="fas fa-trash-alt"></i> Remove Photo
                            </button>
                            <p class="help-text">Recommended size: 500x500px, JPG or PNG format, max 2MB</p>
                        </div>
                    </div>

                    <form id="profile-form">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" value="Alex" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" value="Johnson" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" value="alexjohnson" required>
                            <p class="help-text">This will be used in your profile URL (example.com/@alexjohnson)</p>
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea id="bio">Senior Product Designer with 8+ years of experience. Passionate about creating intuitive user experiences.</textarea>
                            <p class="help-text">Tell people a little about yourself (max 200 characters)</p>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" id="location" value="San Francisco, CA">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" placeholder="+1 (555) 123-4567">
                            <p class="help-text">Used for account recovery and security notifications</p>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birth Date</label>
                            <input type="date" id="birthdate">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" id="website" value="https://alexjohnson.design">
                            <p class="help-text">Include your personal website or portfolio</p>
                        </div>
                        <div class="form-group">
                            <label for="social-links">Social Links</label>
                            <div class="input-wrapper">
                                <input type="text" id="twitter" placeholder="Twitter username" value="@alexjohnson">
                                <i class="fab fa-twitter input-icon" style="right: auto; left: 18px;"></i>
                            </div>
                            <div class="input-wrapper" style="margin-top: 10px;">
                                <input type="text" id="linkedin" placeholder="LinkedIn profile URL">
                                <i class="fab fa-linkedin input-icon" style="right: auto; left: 18px;"></i>
                            </div>
                            <div class="input-wrapper" style="margin-top: 10px;">
                                <input type="text" id="github" placeholder="GitHub username">
                                <i class="fab fa-github input-icon" style="right: auto; left: 18px;"></i>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn btn-outline">Cancel</button>
                            <button type="submit" class="btn" id="profile-save-btn">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Email Address Tab -->
                <div class="tab-content" id="email">
                    <div class="tab-header">
                        <h2>Email Address</h2>
                        <p>Update your email address. You will need to verify the new email.</p>
                    </div>
                    
                    <div class="verification-message warning">
                        <i class="fas fa-exclamation-circle"></i>
                        Your email address is not verified. Please check your inbox for the verification email.
                        <a href="#" style="color: white; text-decoration: underline; margin-left: 10px;">Resend verification</a>
                    </div>
                    
                    <form id="email-form">
                        <div class="form-group">
                            <label for="current-email">Current Email</label>
                            <input type="email" id="current-email" value="alex.johnson@example.com" readonly>
                        </div>
                        <div class="form-group">
                            <label for="new-email">New Email</label>
                            <input type="email" id="new-email" placeholder="Enter your new email address" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-email">Confirm New Email</label>
                            <input type="email" id="confirm-email" placeholder="Re-enter your new email address" required>
                        </div>
                        <div class="form-group">
                            <label for="current-password-email">Current Password</label>
                            <div class="input-wrapper">
                                <input type="password" id="current-password-email" placeholder="Enter your current password" required>
                                <i class="fas fa-eye input-icon" id="toggle-email-password"></i>
                            </div>
                        </div>
                        <div id="email-verification-message" class="verification-message"></div>
                        <div class="form-actions">
                            <button type="button" class="btn btn-outline">Cancel</button>
                            <button type="submit" class="btn" id="email-save-btn">
                                <i class="fas fa-envelope"></i> Update Email
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Password Tab -->
                <div class="tab-content" id="password">
                    <div class="tab-header">
                        <h2>Change Password</h2>
                        <p>For security, your new password must meet the following requirements.</p>
                    </div>
                    
                    <div class="password-requirements">
                        <h4><i class="fas fa-shield-alt"></i> Password Requirements</h4>
                        <div class="requirement valid"><i class="fas fa-check"></i> Minimum 8 characters</div>
                        <div class="requirement invalid"><i class="fas fa-times"></i> At least one uppercase letter</div>
                        <div class="requirement valid"><i class="fas fa-check"></i> At least one lowercase letter</div>
                        <div class="requirement invalid"><i class="fas fa-times"></i> At least one number</div>
                        <div class="requirement invalid"><i class="fas fa-times"></i> At least one special character</div>
                    </div>
                    
                    <form id="password-form">
                        <div class="form-group">
                            <label for="current-password">Current Password</label>
                            <div class="input-wrapper">
                                <input type="password" id="current-password" placeholder="Enter your current password" required>
                                <i class="fas fa-eye input-icon" id="toggle-current-password"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <div class="input-wrapper">
                                <input type="password" id="new-password" placeholder="Enter your new password" required>
                                <i class="fas fa-eye input-icon" id="toggle-new-password"></i>
                            </div>
                            <div class="password-strength">
                                <div class="password-strength-bar" id="password-strength-bar"></div>
                            </div>
                            <p class="help-text">Password strength: <span id="password-strength-text">Weak</span></p>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm New Password</label>
                            <div class="input-wrapper">
                                <input type="password" id="confirm-password" placeholder="Re-enter your new password" required>
                                <i class="fas fa-eye input-icon" id="toggle-confirm-password"></i>
                            </div>
                        </div>
                        <div id="password-verification-message" class="verification-message"></div>
                        <div class="form-actions">
                            <button type="button" class="btn btn-outline">Cancel</button>
                            <button type="submit" class="btn" id="password-save-btn">
                                <i class="fas fa-key"></i> Change Password
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Security Tab -->
                <div class="tab-content" id="security">
                    <div class="tab-header">
                        <h2>Security Settings</h2>
                        <p>Manage your account security preferences and authentication methods</p>
                    </div>
                    
                    <div class="security-item">
                        <div class="security-info">
                            <h4>Two-Factor Authentication (2FA)</h4>
                            <p>Add an extra layer of security to your account</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="two-factor-setup">
                        <h3>Two-Factor Authentication Methods</h3>
                        <div class="two-factor-methods">
                            <div class="two-factor-method active">
                                <h4><i class="fas fa-mobile-alt"></i> Authenticator App</h4>
                                <p>Use an app like Google Authenticator or Authy to generate verification codes</p>
                            </div>
                            <div class="two-factor-method">
                                <h4><i class="fas fa-sms"></i> SMS Verification</h4>
                                <p>Receive verification codes via text message</p>
                            </div>
                            <div class="two-factor-method">
                                <h4><i class="fas fa-envelope"></i> Email Verification</h4>
                                <p>Receive verification codes via email</p>
                            </div>
                        </div>

                        <div class="qr-code">
                            <h4>Set Up Authenticator App</h4>
                            <p>Scan this QR code with your authenticator app</p>
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=otpauth://totp/Example:alex.johnson@example.com?secret=JBSWY3DPEHPK3PXP&issuer=Example" alt="QR Code">
                            <p>Or enter this code manually: <strong>JBSWY3DPEHPK3PXP</strong></p>
                        </div>

                        <div class="form-group">
                            <label for="verification-code">Verification Code</label>
                            <input type="text" id="verification-code" placeholder="Enter 6-digit code from your app">
                        </div>
                        <button class="btn btn-success">
                            <i class="fas fa-check"></i> Verify and Enable
                        </button>

                        <div class="backup-codes">
                            <h4><i class="fas fa-key"></i> Backup Codes</h4>
                            <p>Save these codes in a secure place. Each code can be used only once.</p>
                            <div class="code-list">
                                <div class="code-item">3F5G 7H9J</div>
                                <div class="code-item">K2L4 M6N8</div>
                                <div class="code-item">P1Q3 R5T7</div>
                                <div class="code-item">V9W2 X4Y6</div>
                                <div class="code-item">Z8A1 B3C5</div>
                                <div class="code-item">D7E9 F2G4</div>
                            </div>
                            <button class="btn btn-outline">
                                <i class="fas fa-redo"></i> Generate New Codes
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-download"></i> Download Codes
                            </button>
                        </div>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h4>Login Alerts</h4>
                            <p>Receive notifications for new logins</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h4>Session Timeout</h4>
                            <p>Automatically log out after inactivity</p>
                        </div>
                        <select id="session-timeout">
                            <option value="15">15 minutes</option>
                            <option value="30">30 minutes</option>
                            <option value="60" selected>1 hour</option>
                            <option value="120">2 hours</option>
                            <option value="0">Never (not recommended)</option>
                        </select>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h4>Recent Activity</h4>
                            <p>View your recent account activity</p>
                        </div>
                        <button class="btn btn-outline">View Activity</button>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-outline">Cancel</button>
                        <button type="button" class="btn" id="security-save-btn">
                            <i class="fas fa-shield-alt"></i> Save Settings
                        </button>
                    </div>

                    <div class="account-delete">
                        <h3><i class="fas fa-exclamation-triangle"></i> Delete Account</h3>
                        <p>Permanently delete your account and all associated data. This action cannot be undone.</p>
                        <button class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Delete Account
                        </button>
                    </div>
                </div>

                <!-- Preferences Tab -->
                <div class="tab-content" id="preferences">
                    <div class="tab-header">
                        <h2>Account Preferences</h2>
                        <p>Customize your experience and notification settings</p>
                    </div>
                    
                    <div class="preferences-grid">
                        <div class="preference-item">
                            <h4>Theme Preference</h4>
                            <p>Choose between light and dark mode</p>
                            <select id="theme-preference">
                                <option value="light" selected>Light Mode</option>
                                <option value="dark">Dark Mode</option>
                                <option value="system">System Default</option>
                            </select>
                        </div>
                        <div class="preference-item">
                            <h4>Language</h4>
                            <p>Select your preferred language</p>
                            <select id="language-preference">
                                <option value="en" selected>English</option>
                                <option value="es">Español</option>
                                <option value="fr">Français</option>
                                <option value="de">Deutsch</option>
                                <option value="ja">日本語</option>
                            </select>
                        </div>
                        <div class="preference-item">
                            <h4>Time Zone</h4>
                            <p>Set your local time zone</p>
                            <select id="timezone-preference">
                                <option value="auto" selected>Detect Automatically</option>
                                <option value="pst">Pacific Time (PT)</option>
                                <option value="mst">Mountain Time (MT)</option>
                                <option value="cst">Central Time (CT)</option>
                                <option value="est">Eastern Time (ET)</option>
                                <option value="gmt">GMT (London)</option>
                                <option value="cet">CET (Paris)</option>
                                <option value="jst">JST (Tokyo)</option>
                            </select>
                        </div>
                        <div class="preference-item">
                            <h4>Date Format</h4>
                            <p>Choose how dates are displayed</p>
                            <select id="date-format">
                                <option value="mm/dd/yyyy">MM/DD/YYYY (US)</option>
                                <option value="dd/mm/yyyy" selected>DD/MM/YYYY (International)</option>
                                <option value="yyyy-mm-dd">YYYY-MM-DD (ISO)</option>
                            </select>
                        </div>
                    </div>

                    <div class="notification-settings">
                        <h3>Notification Preferences</h3>
                        
                        <div class="notification-category">
                            <h3>Email Notifications</h3>
                            <div class="notification-item">
                                <div class="notification-info">
                                    <h4>Account Activity</h4>
                                    <p>Receive emails about important account changes</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="notification-item">
                                <div class="notification-info">
                                    <h4>Product Updates</h4>
                                    <p>Get news about new features and improvements</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="notification-item">
                                <div class="notification-info">
                                    <h4>Promotional Offers</h4>
                                    <p>Receive special offers and discounts</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="notification-category">
                            <h3>Push Notifications</h3>
                            <div class="notification-item">
                                <div class="notification-info">
                                    <h4>New Messages</h4>
                                    <p>Get alerts when you receive new messages</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="notification-item">
                                <div class="notification-info">
                                    <h4>Reminders</h4>
                                    <p>Receive reminders for important events</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-outline">Reset to Defaults</button>
                        <button type="button" class="btn" id="preferences-save-btn">
                            <i class="fas fa-save"></i> Save Preferences
                        </button>
                    </div>
                </div>

                <!-- Active Sessions Tab -->
                <div class="tab-content" id="sessions">
                    <div class="tab-header">
                        <h2>Active Sessions</h2>
                        <p>Manage devices that are currently logged in to your account</p>
                    </div>
                    
                    <div class="session-item current-session">
                        <div class="session-icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <div class="session-info">
                            <h4>This Device</h4>
                            <p>San Francisco, California, US</p>
                            <div class="session-meta">
                                <span><i class="fas fa-globe"></i> 192.168.1.1</span>
                                <span><i class="fas fa-clock"></i> Active now</span>
                                <span><i class="fas fa-browser"></i> Chrome 114 on Windows 10</span>
                            </div>
                        </div>
                        <div class="session-actions">
                            <button class="btn btn-outline btn-sm" disabled>Current Session</button>
                        </div>
                    </div>

                    <div class="session-item">
                        <div class="session-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="session-info">
                            <h4>iPhone 13 Pro</h4>
                            <p>New York, New York, US</p>
                            <div class="session-meta">
                                <span><i class="fas fa-globe"></i> 172.56.23.198</span>
                                <span><i class="fas fa-clock"></i> 2 hours ago</span>
                                <span><i class="fas fa-browser"></i> Safari on iOS 16.5</span>
                            </div>
                        </div>
                        <div class="session-actions">
                            <button class="btn btn-outline btn-sm">Log Out</button>
                        </div>
                    </div>

                    <div class="session-item suspicious-session">
                        <div class="session-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="session-info">
                            <h4>Unknown Device</h4>
                            <p>Berlin, Germany</p>
                            <div class="session-meta">
                                <span><i class="fas fa-globe"></i> 87.156.42.109</span>
                                <span><i class="fas fa-clock"></i> 3 days ago</span>
                                <span><i class="fas fa-browser"></i> Firefox 112 on Linux</span>
                            </div>
                        </div>
                        <div class="session-actions">
                            <button class="btn btn-outline btn-sm">Log Out</button>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Log Out All Other Devices
                        </button>
                    </div>
                </div>

                <!-- Billing Tab -->
                <div class="tab-content" id="billing">
                    <div class="tab-header">
                        <h2>Billing & Subscriptions</h2>
                        <p>Manage your payment methods and subscription plans</p>
                    </div>
                    
                    <div class="security-item">
                        <div class="security-info">
                            <h4>Current Plan</h4>
                            <p>Pro Plan - $19.99/month</p>
                        </div>
                        <button class="btn btn-outline">Change Plan</button>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h4>Payment Method</h4>
                            <p>Visa ending in 4242 - Expires 05/2025</p>
                        </div>
                        <button class="btn btn-outline">Update Payment</button>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h4>Billing History</h4>
                            <p>View and download your past invoices</p>
                        </div>
                        <button class="btn btn-outline">View History</button>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-outline">Cancel Subscription</button>
                        <button type="button" class="btn">Update Billing</button>
                    </div>
                </div>

                <!-- Privacy Tab -->
                <div class="tab-content" id="privacy">
                    <div class="tab-header">
                        <h2>Privacy Settings</h2>
                        <p>Control how your information is shared and displayed</p>
                    </div>
                    
                    <div class="security-item">
                        <div class="security-info">
                            <h4>Profile Visibility</h4>
                            <p>Who can see your profile information</p>
                        </div>
                        <select id="profile-visibility">
                            <option value="public">Public</option>
                            <option value="friends" selected>Friends Only</option>
                            <option value="private">Private</option>
                        </select>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h4>Activity Sharing</h4>
                            <p>Share your activity with other users</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h4>Data Collection</h4>
                            <p>Allow us to collect usage data to improve our services</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h4>Personalized Ads</h4>
                            <p>Show ads based on your interests and activity</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="account-delete">
                        <h3><i class="fas fa-download"></i> Data Export</h3>
                        <p>Download a copy of all your personal data stored in our systems.</p>
                        <button class="btn btn-outline">
                            <i class="fas fa-download"></i> Request Data Export
                        </button>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-outline">Reset Privacy Settings</button>
                        <button type="button" class="btn">Save Privacy Settings</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching
            const navItems = document.querySelectorAll('.nav-item');
            const tabContents = document.querySelectorAll('.tab-content');

            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    navItems.forEach(navItem => navItem.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    this.classList.add('active');
                    document.getElementById(this.getAttribute('data-tab')).classList.add('active');
                });
            });

            // Profile picture upload
            const profilePictureInput = document.getElementById('profile-picture');
            const profileImg = document.getElementById('profile-img');
            const removePictureBtn = document.getElementById('remove-picture');

            profilePictureInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const file = e.target.files[0];
                    if (file.size > 2 * 1024 * 1024) {
                        alert('File size exceeds 2MB limit. Please choose a smaller file.');
                        return;
                    }
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        profileImg.src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

            removePictureBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to remove your profile picture?')) {
                    profileImg.src = 'https://www.gravatar.com/avatar/default?s=200&d=mp';
                    profilePictureInput.value = '';
                }
            });

            // Password visibility toggle
            function setupPasswordToggle(eyeIconId, passwordFieldId) {
                const eyeIcon = document.getElementById(eyeIconId);
                const passwordField = document.getElementById(passwordFieldId);
                
                eyeIcon.addEventListener('click', function() {
                    if (passwordField.type === 'password') {
                        passwordField.type = 'text';
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    } else {
                        passwordField.type = 'password';
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    }
                });
            }

            setupPasswordToggle('toggle-email-password', 'current-password-email');
            setupPasswordToggle('toggle-current-password', 'current-password');
            setupPasswordToggle('toggle-new-password', 'new-password');
            setupPasswordToggle('toggle-confirm-password', 'confirm-password');

            // Password strength checker
            const newPasswordField = document.getElementById('new-password');
            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');

            newPasswordField.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                // Check length
                if (password.length >= 8) strength++;
                if (password.length >= 12) strength++;
                
                // Check for uppercase letters
                if (/[A-Z]/.test(password)) strength++;
                
                // Check for lowercase letters
                if (/[a-z]/.test(password)) strength++;
                
                // Check for numbers
                if (/[0-9]/.test(password)) strength++;
                
                // Check for special characters
                if (/[^A-Za-z0-9]/.test(password)) strength++;
                
                // Update strength bar and text
                const width = (strength / 6) * 100;
                strengthBar.style.width = width + '%';
                
                if (strength <= 2) {
                    strengthBar.className = 'password-strength-bar strength-weak';
                    strengthText.textContent = 'Weak';
                    strengthText.style.color = 'var(--danger-color)';
                } else if (strength <= 4) {
                    strengthBar.className = 'password-strength-bar strength-medium';
                    strengthText.textContent = 'Medium';
                    strengthText.style.color = 'var(--warning-color)';
                } else {
                    strengthBar.className = 'password-strength-bar strength-strong';
                    strengthText.textContent = 'Strong';
                    strengthText.style.color = 'var(--success-color)';
                }
                
                // Update requirement indicators
                document.querySelectorAll('.requirement').forEach(req => {
                    const text = req.textContent.trim();
                    if (text.includes('8 characters')) {
                        req.className = password.length >= 8 ? 'requirement valid' : 'requirement invalid';
                    } else if (text.includes('uppercase')) {
                        req.className = /[A-Z]/.test(password) ? 'requirement valid' : 'requirement invalid';
                    } else if (text.includes('lowercase')) {
                        req.className = /[a-z]/.test(password) ? 'requirement valid' : 'requirement invalid';
                    } else if (text.includes('number')) {
                        req.className = /[0-9]/.test(password) ? 'requirement valid' : 'requirement invalid';
                    } else if (text.includes('special character')) {
                        req.className = /[^A-Za-z0-9]/.test(password) ? 'requirement valid' : 'requirement invalid';
                    }
                });
            });

            // Form submissions
            function setupFormSubmit(formId, btnId, successMessage) {
                const form = document.getElementById(formId);
                const btn = document.getElementById(btnId);
                
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<span class="spinner"></span> Processing...';
                    btn.disabled = true;
                    
                    // Simulate API call
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                        
                        if (formId === 'email-form') {
                            const messageElement = document.getElementById('email-verification-message');
                            messageElement.textContent = successMessage;
                            messageElement.className = 'verification-message success';
                        } else if (formId === 'password-form') {
                            const messageElement = document.getElementById('password-verification-message');
                            messageElement.textContent = successMessage;
                            messageElement.className = 'verification-message success';
                            form.reset();
                        } else {
                            alert(successMessage);
                        }
                    }, 1500);
                });
            }

            setupFormSubmit('profile-form', 'profile-save-btn', 'Profile updated successfully!');
            setupFormSubmit('email-form', 'email-save-btn', 'Verification email sent! Please check your new email address.');
            setupFormSubmit('password-form', 'password-save-btn', 'Password changed successfully!');

            // Other save buttons
            document.getElementById('security-save-btn').addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<span class="spinner"></span> Saving...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                    alert('Security settings saved!');
                }, 1000);
            });

            document.getElementById('preferences-save-btn').addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<span class="spinner"></span> Saving...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                    alert('Preferences saved!');
                }, 1000);
            });

            // Delete account confirmation
            document.querySelector('.account-delete button').addEventListener('click', function() {
                if (confirm('Are you sure you want to delete your account? This action cannot be undone. All your data will be permanently removed.')) {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<span class="spinner"></span> Deleting...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        alert('Account deletion request received. A confirmation email has been sent to your registered email address.');
                        this.innerHTML = originalText;
                        this.disabled = false;
                    }, 1500);
                }
            });

            // Two-factor method selection
            document.querySelectorAll('.two-factor-method').forEach(method => {
                method.addEventListener('click', function() {
                    document.querySelectorAll('.two-factor-method').forEach(m => m.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Theme switcher
            const themeSelect = document.getElementById('theme-preference');
            themeSelect.addEventListener('change', function() {
                if (this.value === 'dark') {
                    document.body.classList.add('dark-mode');
                } else {
                    document.body.classList.remove('dark-mode');
                }
            });

            // Initialize password strength
            newPasswordField.dispatchEvent(new Event('input'));
        });
    </script>
</body>
</html>