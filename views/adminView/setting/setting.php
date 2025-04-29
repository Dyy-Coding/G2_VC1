
    <style>
        :root {
            --primary: #4361ee;
            --primary-hover: #3a56d4;
            --primary-light: rgba(67, 97, 238, 0.1);
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --lighter-gray: #f5f7fa;
            --danger: #dc3545;
            --danger-hover: #c82333;
            --danger-light: rgba(220, 53, 69, 0.1);
            --success: #28a745;
            --success-hover: #218838;
            --success-light: rgba(40, 167, 69, 0.1);
            --warning: #ffc107;
            --warning-light: rgba(255, 193, 7, 0.1);
            --border-radius: 8px;
            --border-radius-sm: 4px;
            --transition: all 0.3s ease;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.1);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
            --font-sans: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            --font-mono: 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', monospace;
        }
        body {
            width: 100%;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
        }
        h1, h2, h3, h4 {
            margin-bottom: 0.75rem;
            line-height: 1.2;
        }
        
        p {
            margin-bottom: 1rem;
            color: var(--gray);
        }
        
        .container {
            margin-top: 12px;
            max-width: 96%;
            margin-left: 22px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }
        
        .header {
            padding: 20px;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .header h1 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.75rem;
            color: var(--dark);
        }
        
        .tabs {
            display: flex;
            border-bottom: 1px solid var(--light-gray);
            position: relative;
            overflow-x: auto;
            scrollbar-width: none; /* Firefox */
        }
        
        .tabs::-webkit-scrollbar {
            display: none; /* Chrome/Safari */
        }
        
        .tab {
            padding: 15px 20px;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray);
            font-weight: 500;
            border-bottom: 2px solid transparent;
        }
        
        .tab:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }
        
        .tab.active {
            border-bottom-color: var(--primary);
            color: var(--primary);
            font-weight: 600;
        }
        
        .tab-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: var(--danger);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .tab-content {
            display: none;
            padding: 25px;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .tab-content.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }
        
        input, textarea, select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            font-size: 0.95rem;
        }
        
        input:focus, textarea:focus, select:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px var(--primary-light);
        }
        
        button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: var(--border-radius-sm);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.95rem;
        }
        
        button:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        button.secondary {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        button.secondary:hover {
            background: var(--primary-light);
        }
        
        button.danger {
            background: var(--danger);
        }
        
        button.danger:hover {
            background: var(--danger-hover);
        }
        
        button.success {
            background: var(--success);
        }
        
        button.success:hover {
            background: var(--success-hover);
        }
        
        button.warning {
            background: var(--warning);
            color: var(--dark);
        }
        
        button i {
            font-size: 0.9em;
        }
        
        .profile-pic-container {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 3px solid var(--light-gray);
            transition: var(--transition);
        }
        
        .profile-pic:hover {
            transform: scale(1.05);
        }
        
        .profile-pic-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .password-meter {
            height: 5px;
            background: var(--light-gray);
            margin-top: 10px;
            border-radius: 5px;
            overflow: hidden;
        }
        
        .password-meter-bar {
            height: 100%;
            width: 0%;
            background: red;
            transition: width 0.3s, background-color 0.3s;
        }
        
        .verification-code {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            justify-content: center;
        }
        
        .verification-code input {
            width: 40px;
            height: 50px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border-radius: var(--border-radius-sm);
            border: 1px solid var(--light-gray);
            transition: var(--transition);
        }
        
        .verification-code input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px var(--primary-light);
        }
        
        .session-item {
            border: 1px solid var(--light-gray);
            padding: 15px;
            margin-bottom: 15px;
            border-radius: var(--border-radius);
            transition: var(--transition);
            background: white;
        }
        
        .session-item:hover {
            box-shadow: var(--shadow-sm);
        }
        
        .session-item.current {
            border-left: 4px solid var(--primary);
            background-color: var(--primary-light);
        }
        
        .session-item .device-icon {
            font-size: 24px;
            margin-right: 10px;
            color: var(--gray);
        }
        
        .session-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            flex-wrap: wrap;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .status-badge i {
            font-size: 0.8em;
        }
        
        .status-badge.verified {
            background-color: var(--success-light);
            color: var(--success);
        }
        
        .status-badge.unverified {
            background-color: var(--danger-light);
            color: var(--danger);
        }
        
        .status-badge.warning {
            background-color: var(--warning-light);
            color: #856404;
        }
        
        .two-factor-box {
            border: 1px solid var(--light-gray);
            padding: 20px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            background: white;
        }
        
        .two-factor-box.enabled {
            border-left: 4px solid var(--success);
            background-color: var(--success-light);
        }
        
        .two-factor-box.disabled {
            border-left: 4px solid var(--danger);
            background-color: var(--danger-light);
        }
        
        .two-factor-methods {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        .two-factor-method {
            border: 1px solid var(--light-gray);
            padding: 20px;
            border-radius: var(--border-radius);
            flex: 1;
            min-width: 200px;
            background: white;
            transition: var(--transition);
        }
        
        .two-factor-method:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-sm);
        }
        
        .two-factor-method i {
            font-size: 28px;
            margin-bottom: 10px;
            color: var(--primary);
        }
        
        .qr-code {
            width: 150px;
            height: 150px;
            margin: 15px auto;
            background-color: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            border-radius: var(--border-radius-sm);
        }
        
        .backup-codes {
            background-color: var(--light-gray);
            padding: 15px;
            border-radius: var(--border-radius);
            font-family: var(--font-mono);
            margin-top: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .backup-code {
            display: inline-block;
            margin: 5px;
            padding: 5px 10px;
            background: white;
            border-radius: var(--border-radius-sm);
            font-weight: bold;
            box-shadow: var(--shadow-sm);
        }
        
        .notification-settings {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .notification-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            border-radius: var(--border-radius);
            transition: var(--transition);
            background: white;
            border: 1px solid var(--light-gray);
        }
        
        .notification-item:hover {
            box-shadow: var(--shadow-sm);
        }
        
        .notification-item-content {
            flex: 1;
        }
        
        .notification-item-content strong {
            display: block;
            margin-bottom: 3px;
            color: var(--dark);
        }
        
        .notification-item-content p {
            margin-bottom: 0;
            font-size: 0.9rem;
        }
        
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }
        
        .switch input {
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
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: var(--primary);
        }
        
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--light-gray);
        }
        
        th {
            background-color: var(--light-gray);
            font-weight: 600;
        }
        
        tr:hover {
            background-color: var(--light-gray);
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(3px);
        }
        
        .modal-content {
            background: white;
            padding: 25px;
            border-radius: var(--border-radius);
            width: 90%;
            max-width: 450px;
            box-shadow: var(--shadow-lg);
            animation: modalFadeIn 0.3s ease;
        }
        
        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .modal-header {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .modal-header h2 {
            margin: 0;
            font-size: 1.5rem;
        }
        
        .modal-footer {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary);
            color: white;
            padding: 15px 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 1000;
            transform: translateY(100px);
            opacity: 0;
            transition: var(--transition);
        }
        
        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        .toast.success {
            background-color: var(--success);
        }
        
        .toast.error {
            background-color: var(--danger);
        }
        
        .toast.warning {
            background-color: var(--warning);
            color: var(--dark);
        }
        
        .danger-zone {
            border: 1px solid var(--danger);
            background-color: var(--danger-light);
            padding: 20px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
        }
        
        .danger-zone h4 {
            color: var(--danger);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .danger-zone p {
            color: var(--danger);
        }
        
        .password-requirements {
            font-size: 0.9rem;
            color: var(--gray);
            margin-top: 5px;
        }
        
        .password-requirements li {
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .password-requirements i {
            font-size: 0.8em;
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .profile-pic-container {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .two-factor-methods {
                flex-direction: column;
            }
            
            .two-factor-method {
                width: 100%;
            }
            
            .modal-content {
                width: 95%;
                padding: 20px;
            }
            
            .modal-footer {
                flex-direction: column;
            }
            
            .modal-footer button {
                width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                margin-top: 20px;
            }
            
            .tab {
                padding: 12px 15px;
                font-size: 0.9rem;
            }
            
            .tab-content {
                padding: 15px;
            }
            
            .session-actions button {
                width: 100%;
            }
        }
    </style>

    <div class="container">
        <div class="header">
            <h1><i class="fas fa-cog"></i> Settings</h1>
            <div>
                <button id="saveBtn"><span>Save Changes</span> <i class="fas fa-save"></i></button>
            </div>
        </div>
        
        <div class="tabs">
            <div class="tab active" data-tab="personal">
                <i class="fas fa-user"></i> Personal Info
            </div>
            <div class="tab" data-tab="email">
                <i class="fas fa-envelope"></i> Email
            </div>
            <div class="tab" data-tab="password">
                <i class="fas fa-lock"></i> Password
            </div>
            <div class="tab" data-tab="security">
                <i class="fas fa-shield-alt"></i> Security
                <span class="tab-badge">2</span>
            </div>
            <div class="tab" data-tab="notifications">
                <i class="fas fa-bell"></i> Notifications
            </div>
            <div class="tab" data-tab="danger">
                <i class="fas fa-exclamation-triangle"></i> Danger Zone
            </div>
        </div>
        
        <div class="tab-content active" id="personal-tab">
            <div class="form-group">
                <div class="profile-pic-container">
                    <div>
                        <img src="https://via.placeholder.com/100" class="profile-pic" id="profilePic">
                    </div>
                    <div class="profile-pic-actions">
                        <button id="changePicBtn"><span>Change Picture</span> <i class="fas fa-camera"></i></button>
                        <button id="removePicBtn" class="secondary"><span>Remove</span> <i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" id="firstName" value="John">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" id="lastName" value="Doe">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" value="johndoe">
            </div>
            <div class="form-group">
                <label>Bio</label>
                <textarea id="bio" rows="4">Software engineer and tech enthusiast</textarea>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" id="location" value="San Francisco, CA">
            </div>
            <div class="form-group">
                <label>Website</label>
                <input type="url" id="website" value="https://johndoe.dev">
            </div>
        </div>
        
        <div class="tab-content" id="email-tab">
            <div class="form-group">
                <label>Current Email</label>
                <p>john.doe@example.com <span class="status-badge verified"><i class="fas fa-check-circle"></i> Verified</span></p>
            </div>
            <div class="form-group">
                <label>New Email</label>
                <input type="email" id="newEmail" placeholder="Enter new email address">
            </div>
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" id="emailPassword" placeholder="Enter your current password">
            </div>
            <button id="changeEmailBtn"><span>Change Email</span> <i class="fas fa-envelope"></i></button>
            
            <div class="form-group" style="margin-top: 30px;">
                <h3><i class="fas fa-mail-bulk"></i> Email Preferences</h3>
                <p>Control how we communicate with you via email</p>
                
                <div class="notification-settings">
                    <div class="notification-item">
                        <div class="notification-item-content">
                            <strong>Product updates</strong>
                            <p>Get the latest features and improvements</p>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="notification-item">
                        <div class="notification-item-content">
                            <strong>Security alerts</strong>
                            <p>Important notifications about your account security</p>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="notification-item">
                        <div class="notification-item-content">
                            <strong>Newsletter</strong>
                            <p>Monthly digest of news and tips</p>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="password-tab">
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" id="currentPassword" placeholder="Enter your current password">
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" id="newPassword" placeholder="Create a new password">
                <div class="password-meter">
                    <div class="password-meter-bar" id="passwordStrength"></div>
                </div>
                <ul class="password-requirements">
                    <li id="lengthReq"><i class="fas fa-check-circle"></i> At least 8 characters</li>
                    <li id="upperReq"><i class="fas fa-check-circle"></i> Uppercase letter</li>
                    <li id="lowerReq"><i class="fas fa-check-circle"></i> Lowercase letter</li>
                    <li id="numberReq"><i class="fas fa-check-circle"></i> Number</li>
                    <li id="specialReq"><i class="fas fa-check-circle"></i> Special character</li>
                </ul>
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" id="confirmPassword" placeholder="Confirm your new password">
                <small id="passwordMatch" style="display:none;color:var(--danger);"><i class="fas fa-exclamation-circle"></i> Passwords don't match</small>
            </div>
            <button id="changePasswordBtn"><span>Change Password</span> <i class="fas fa-key"></i></button>
            
            <div class="form-group" style="margin-top: 30px;">
                <h3><i class="fas fa-history"></i> Password History</h3>
                <p>For security reasons, you can't reuse any of your last 5 passwords</p>
                <div style="background:var(--light-gray);padding:15px;border-radius:var(--border-radius);">
                    <p><i class="fas fa-info-circle"></i> Last changed: 3 months ago</p>
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="security-tab">
            <div class="form-group">
                <h3><i class="fas fa-laptop"></i> Active Sessions</h3>
                <p>These are devices that are currently logged in to your account</p>
                
                <div class="session-item current">
                    <div style="display:flex;align-items:center;">
                        <i class="fas fa-laptop device-icon"></i>
                        <div>
                            <p><strong>Windows 10, Chrome</strong></p>
                            <p>New York, USA • Current session</p>
                            <p>Last activity: Just now</p>
                        </div>
                    </div>
                </div>
                
                <div class="session-item">
                    <div style="display:flex;align-items:center;">
                        <i class="fas fa-mobile-alt device-icon"></i>
                        <div>
                            <p><strong>iPhone 13, Safari</strong></p>
                            <p>San Francisco, USA</p>
                            <p>Last activity: 2 days ago</p>
                        </div>
                    </div>
                    <div class="session-actions">
                        <button class="secondary"><span>Log out device</span> <i class="fas fa-sign-out-alt"></i></button>
                    </div>
                </div>
                
                <div class="session-item">
                    <div style="display:flex;align-items:center;">
                        <i class="fas fa-tablet-alt device-icon"></i>
                        <div>
                            <p><strong>iPad Pro, Safari</strong></p>
                            <p>London, UK</p>
                            <p>Last activity: 1 week ago</p>
                            <span class="status-badge warning"><i class="fas fa-exclamation-triangle"></i> Unusual location</span>
                        </div>
                    </div>
                    <div class="session-actions">
                        <button class="secondary"><span>Log out device</span> <i class="fas fa-sign-out-alt"></i></button>
                        <button class="warning"><span>Report suspicious</span> <i class="fas fa-flag"></i></button>
                    </div>
                </div>
                
                <button style="margin-top: 15px;" class="secondary"><span>Log out of all other devices</span> <i class="fas fa-sign-out-alt"></i></button>
            </div>
            
            <div class="form-group">
                <h3><i class="fas fa-shield-alt"></i> Two-Factor Authentication</h3>
                
                <div class="two-factor-box disabled">
                    <p>Status: <span class="status-badge unverified"><i class="fas fa-times-circle"></i> Disabled</span></p>
                    <p>Add an extra layer of security to your account by enabling two-factor authentication.</p>
                    <button id="enable2faBtn"><span>Enable 2FA</span> <i class="fas fa-shield-alt"></i></button>
                </div>
                
                <div id="twoFactorSetup" style="display:none;">
                    <div class="two-factor-methods">
                        <div class="two-factor-method">
                            <i class="fas fa-mobile-alt"></i>
                            <h4>Authenticator App</h4>
                            <p>Use an app like Google Authenticator or Authy to generate verification codes</p>
                            <button style="margin-top:10px;"><span>Set Up</span> <i class="fas fa-qrcode"></i></button>
                        </div>
                        <div class="two-factor-method">
                            <i class="fas fa-sms"></i>
                            <h4>SMS Verification</h4>
                            <p>Receive verification codes via text message</p>
                            <button style="margin-top:10px;"><span>Set Up</span> <i class="fas fa-phone"></i></button>
                        </div>
                    </div>
                    
                    <div style="margin-top:30px;">
                        <h4><i class="fas fa-qrcode"></i> Scan QR Code</h4>
                        <div class="qr-code">
                            [QR Code Would Appear Here]
                        </div>
                        <p>Or enter this code manually: <strong>JBSWY3DPEHPK3PXP</strong></p>
                        
                        <div style="margin-top:20px;">
                            <label>Verification Code</label>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <input type="text" placeholder="Enter 6-digit code" style="width:200px;">
                                <button><span>Verify</span> <i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <div style="margin-top:30px;">
                        <h4><i class="fas fa-key"></i> Backup Codes</h4>
                        <p>Save these one-time use codes in case you lose access to your authentication methods.</p>
                        <div class="backup-codes">
                            <div class="backup-code">A1B2-C3D4</div>
                            <div class="backup-code">E5F6-G7H8</div>
                            <div class="backup-code">I9J0-K1L2</div>
                            <div class="backup-code">M3N4-O5P6</div>
                            <div class="backup-code">Q7R8-S9T0</div>
                            <div class="backup-code">U1V2-W3X4</div>
                            <div class="backup-code">Y5Z6-7890</div>
                            <div class="backup-code">1234-5678</div>
                        </div>
                        <div style="display:flex;gap:10px;margin-top:15px;flex-wrap:wrap;">
                            <button class="secondary"><span>Generate New Codes</span> <i class="fas fa-redo"></i></button>
                            <button class="secondary"><span>Print Codes</span> <i class="fas fa-print"></i></button>
                            <button class="secondary"><span>Download Codes</span> <i class="fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <h3><i class="fas fa-clock"></i> Login History</h3>
                <p>Recent login attempts to your account</p>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Device</th>
                            <th>Location</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Today, 10:30 AM</td>
                            <td>Windows 10, Chrome</td>
                            <td>New York, USA</td>
                            <td><span class="status-badge verified">Success</span></td>
                        </tr>
                        <tr>
                            <td>Yesterday, 8:15 PM</td>
                            <td>iPhone 13, Safari</td>
                            <td>San Francisco, USA</td>
                            <td><span class="status-badge verified">Success</span></td>
                        </tr>
                        <tr>
                            <td>2 days ago, 3:45 AM</td>
                            <td>Unknown, Firefox</td>
                            <td>London, UK</td>
                            <td><span class="status-badge unverified">Failed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="tab-content" id="notifications-tab">
            <div class="form-group">
                <h3><i class="fas fa-bell"></i> Notification Preferences</h3>
                <p>Customize how you receive notifications</p>
                
                <div class="notification-settings">
                    <div class="notification-item">
                        <div class="notification-item-content">
                            <strong>Email Notifications</strong>
                            <p>Receive notifications via email</p>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="notification-item">
                        <div class="notification-item-content">
                            <strong>Push Notifications</strong>
                            <p>Receive notifications on your devices</p>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="notification-item">
                        <div class="notification-item-content">
                            <strong>SMS Notifications</strong>
                            <p>Receive notifications via text message</p>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="notification-item">
                        <div class="notification-item-content">
                            <strong>Desktop Notifications</strong>
                            <p>Show notifications on your desktop</p>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group" style="margin-top:30px;">
                <h3><i class="fas fa-sliders-h"></i> Notification Types</h3>
                
                <div class="notification-item">
                    <div class="notification-item-content">
                        <strong>New Messages</strong>
                        <p>Notify me when I receive new messages</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="notification-item">
                    <div class="notification-item-content">
                        <strong>Mentions</strong>
                        <p>Notify me when I'm mentioned</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="notification-item">
                    <div class="notification-item-content">
                        <strong>Comments</strong>
                        <p>Notify me about new comments</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="notification-item">
                    <div class="notification-item-content">
                        <strong>Product Updates</strong>
                        <p>Notify me about new features</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="notification-item">
                    <div class="notification-item-content">
                        <strong>Security Alerts</strong>
                        <p>Notify me about security issues</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="danger-tab">
            <div class="form-group">
                <h3 style="color:var(--danger);"><i class="fas fa-exclamation-triangle"></i> Danger Zone</h3>
                <p>These actions are irreversible. Proceed with caution.</p>
                
                <div class="danger-zone">
                    <h4><i class="fas fa-ban"></i> Deactivate Account</h4>
                    <p>Temporarily disable your account. You can reactivate it by logging back in.</p>
                    <button id="deactivateBtn" class="danger"><span>Deactivate Account</span> <i class="fas fa-ban"></i></button>
                </div>
                
                <div class="danger-zone">
                    <h4><i class="fas fa-trash-alt"></i> Delete Account</h4>
                    <p>Permanently delete your account and all associated data. This cannot be undone.</p>
                    <button id="deleteAccountBtn" class="danger"><span>Delete Account</span> <i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
            
            <div class="form-group" style="margin-top:30px;">
                <h3><i class="fas fa-download"></i> Data Export</h3>
                <p>Download a copy of all your data</p>
                <button id="exportDataBtn" class="secondary"><span>Export Data</span> <i class="fas fa-file-export"></i></button>
            </div>
        </div>
    </div>

    <div id="emailVerifyModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-envelope"></i>
                <h2>Verify Your Email</h2>
            </div>
            <p>We've sent a 6-digit verification code to <strong id="verifyEmailDisplay"></strong></p>
            <div class="verification-code">
                <input type="text" maxlength="1" pattern="[0-9]">
                <input type="text" maxlength="1" pattern="[0-9]">
                <input type="text" maxlength="1" pattern="[0-9]">
                <input type="text" maxlength="1" pattern="[0-9]">
                <input type="text" maxlength="1" pattern="[0-9]">
                <input type="text" maxlength="1" pattern="[0-9]">
            </div>
            <div class="modal-footer">
                <button id="verifyCodeBtn" class="success"><span>Verify</span> <i class="fas fa-check"></i></button>
                <button id="resendCodeBtn" class="secondary"><span>Resend Code</span> <i class="fas fa-redo"></i></button>
                <button id="cancelVerifyBtn" class="secondary"><span>Cancel</span> <i class="fas fa-times"></i></button>
            </div>
        </div>
    </div>

    <div id="confirmDeactivateModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-exclamation-triangle" style="color:var(--danger);"></i>
                <h2 style="color:var(--danger);">Confirm Deactivation</h2>
            </div>
            <p>Are you sure you want to deactivate your account? You can reactivate it by logging back in.</p>
            <div style="margin-top:20px;">
                <label>Enter your password to confirm:</label>
                <input type="password" id="deactivatePassword" style="margin-top:5px;width:100%;">
            </div>
            <div class="modal-footer">
                <button id="confirmDeactivateBtn" class="danger"><span>Deactivate</span> <i class="fas fa-ban"></i></button>
                <button id="cancelDeactivateBtn" class="secondary"><span>Cancel</span> <i class="fas fa-times"></i></button>
            </div>
        </div>
    </div>

    <div id="confirmDeleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-exclamation-triangle" style="color:var(--danger);"></i>
                <h2 style="color:var(--danger);">Confirm Account Deletion</h2>
            </div>
            <p>This action is <strong>permanent</strong> and cannot be undone. All your data will be deleted.</p>
            <p>To confirm, please type <strong style="color:var(--danger);">DELETE MY ACCOUNT</strong> below:</p>
            <input type="text" id="deleteConfirmation" style="width:100%;margin-top:10px;" placeholder="DELETE MY ACCOUNT">
            <div style="margin-top:20px;">
                <label>Enter your password:</label>
                <input type="password" id="deletePassword" style="margin-top:5px;width:100%;">
            </div>
            <div class="modal-footer">
                <button id="confirmDeleteBtn" class="danger"><span>Delete Account</span> <i class="fas fa-trash-alt"></i></button>
                <button id="cancelDeleteBtn" class="secondary"><span>Cancel</span> <i class="fas fa-times"></i></button>
            </div>
        </div>
    </div>

    <div class="toast" id="toast">
        <i class="fas fa-check-circle"></i>
        <span id="toastMessage">Changes saved successfully!</span>
    </div>

    <script>
        // Tab switching
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                tab.classList.add('active');
                document.getElementById(tab.dataset.tab + '-tab').classList.add('active');
            });
        });

        // Password strength meter
        document.getElementById('newPassword').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            let strength = 0;
            
            // Requirements
            const requirements = {
                length: password.length >= 8,
                upper: /[A-Z]/.test(password),
                lower: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[^A-Za-z0-9]/.test(password)
            };
            
            // Calculate strength
            strength = Object.values(requirements).filter(Boolean).length * 20;
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            strengthBar.style.backgroundColor = 
                strength < 50 ? 'red' : 
                strength < 75 ? 'orange' : 'green';
            
            // Update requirement indicators
            document.getElementById('lengthReq').innerHTML = 
                `<i class="fas ${requirements.length ? 'fa-check-circle' : 'fa-times-circle'}" 
                  style="color:${requirements.length ? 'green' : 'gray'}"></i> At least 8 characters`;
            
            document.getElementById('upperReq').innerHTML = 
                `<i class="fas ${requirements.upper ? 'fa-check-circle' : 'fa-times-circle'}" 
                  style="color:${requirements.upper ? 'green' : 'gray'}"></i> Uppercase letter`;
            
            document.getElementById('lowerReq').innerHTML = 
                `<i class="fas ${requirements.lower ? 'fa-check-circle' : 'fa-times-circle'}" 
                  style="color:${requirements.lower ? 'green' : 'gray'}"></i> Lowercase letter`;
            
            document.getElementById('numberReq').innerHTML = 
                `<i class="fas ${requirements.number ? 'fa-check-circle' : 'fa-times-circle'}" 
                  style="color:${requirements.number ? 'green' : 'gray'}"></i> Number`;
            
            document.getElementById('specialReq').innerHTML = 
                `<i class="fas ${requirements.special ? 'fa-check-circle' : 'fa-times-circle'}" 
                  style="color:${requirements.special ? 'green' : 'gray'}"></i> Special character`;
            
            // Check password match
            checkPasswordMatch();
        });

        // Check password confirmation
        document.getElementById('confirmPassword').addEventListener('input', checkPasswordMatch);
        
        function checkPasswordMatch() {
            const password = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const matchIndicator = document.getElementById('passwordMatch');
            
            if (password && confirmPassword && password !== confirmPassword) {
                matchIndicator.style.display = 'block';
            } else {
                matchIndicator.style.display = 'none';
            }
        }

        // Email verification modal
        document.getElementById('changeEmailBtn').addEventListener('click', function() {
            const newEmail = document.getElementById('newEmail').value;
            const currentPassword = document.getElementById('emailPassword').value;
            
            if (!newEmail) {
                showToast('Please enter a new email address', 'error');
                return;
            }
            
            if (!currentPassword) {
                showToast('Please enter your current password', 'error');
                return;
            }
            
            document.getElementById('verifyEmailDisplay').textContent = newEmail;
            document.getElementById('emailVerifyModal').style.display = 'flex';
        });

        document.getElementById('cancelVerifyBtn').addEventListener('click', function() {
            document.getElementById('emailVerifyModal').style.display = 'none';
        });

        document.getElementById('verifyCodeBtn').addEventListener('click', function() {
            // In a real app, you would verify the code here
            showToast('Email changed successfully!', 'success');
            document.getElementById('emailVerifyModal').style.display = 'none';
        });

        document.getElementById('resendCodeBtn').addEventListener('click', function() {
            showToast('Verification code resent!', 'success');
        });

        // Verification code auto-focus
        const codeInputs = document.querySelectorAll('.verification-code input');
        codeInputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < codeInputs.length - 1) {
                    codeInputs[index + 1].focus();
                }
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                    codeInputs[index - 1].focus();
                }
            });
        });

        // Profile picture change
        document.getElementById('changePicBtn').addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = e => {
                const file = e.target.files[0];
                if (!file) return;
                
                if (file.size > 5 * 1024 * 1024) { // 5MB limit
                    showToast('Image size should be less than 5MB', 'error');
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = event => {
                    document.getElementById('profilePic').src = event.target.result;
                    showToast('Profile picture updated!', 'success');
                };
                reader.readAsDataURL(file);
            };
            input.click();
        });

        document.getElementById('removePicBtn').addEventListener('click', function() {
            if (confirm('Are you sure you want to remove your profile picture?')) {
                document.getElementById('profilePic').src = 'https://via.placeholder.com/100';
                showToast('Profile picture removed', 'success');
            }
        });

        // Two-factor authentication setup
        document.getElementById('enable2faBtn').addEventListener('click', function() {
            document.getElementById('twoFactorSetup').style.display = 'block';
            this.style.display = 'none';
        });

        // Deactivate account
        document.getElementById('deactivateBtn').addEventListener('click', function() {
            document.getElementById('confirmDeactivateModal').style.display = 'flex';
        });

        document.getElementById('cancelDeactivateBtn').addEventListener('click', function() {
            document.getElementById('confirmDeactivateModal').style.display = 'none';
        });

        document.getElementById('confirmDeactivateBtn').addEventListener('click', function() {
            const password = document.getElementById('deactivatePassword').value;
            if (!password) {
                showToast('Please enter your password', 'error');
                return;
            }
            // In a real app, you would verify the password and deactivate the account
            showToast('Account deactivated successfully', 'success');
            document.getElementById('confirmDeactivateModal').style.display = 'none';
        });

        // Delete account
        document.getElementById('deleteAccountBtn').addEventListener('click', function() {
            document.getElementById('confirmDeleteModal').style.display = 'flex';
        });

        document.getElementById('cancelDeleteBtn').addEventListener('click', function() {
            document.getElementById('confirmDeleteModal').style.display = 'none';
        });

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            const confirmation = document.getElementById('deleteConfirmation').value;
            const password = document.getElementById('deletePassword').value;
            
            if (confirmation !== 'DELETE MY ACCOUNT') {
                showToast('Please type the confirmation phrase exactly', 'error');
                return;
            }
            
            if (!password) {
                showToast('Please enter your password', 'error');
                return;
            }
            
            // In a real app, you would verify the password and delete the account
            showToast('Account deletion initiated. You will receive a confirmation email.', 'success');
            document.getElementById('confirmDeleteModal').style.display = 'none';
        });

        // Export data
        document.getElementById('exportDataBtn').addEventListener('click', function() {
            showToast('Data export started. You will receive an email when your data is ready to download.', 'success');
        });

        // Save all changes
        document.getElementById('saveBtn').addEventListener('click', function() {
            showToast('All changes saved successfully!', 'success');
        });

        // Toast notification
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            
            toast.className = 'toast';
            toast.classList.add(type);
            toast.classList.add('show');
            
            // Update icon based on type
            const icon = toast.querySelector('i');
            if (type === 'error') {
                icon.className = 'fas fa-exclamation-circle';
            } else if (type === 'warning') {
                icon.className = 'fas fa-exclamation-triangle';
            } else {
                icon.className = 'fas fa-check-circle';
            }
            
            toastMessage.textContent = message;
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Close modals when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal')) {
                e.target.style.display = 'none';
            }
        });
    </script>
