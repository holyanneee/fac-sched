<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1200px;
            height: 90vh;
            overflow-y: auto;
        }
        .form-header {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-header h2 {
            margin: 0;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group label.required::after {
            content: ' *';
            color: red;
            font-size: 20px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .form-group input[type="file"] {
            padding: 5px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .form-actions button {
            padding: 10px 20px;
            border: none;
            background: #28a745;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 15px;
        }
        .form-actions button.secondary {
            background: #6c757d;
        }
        .row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .row .column {
            flex: 1;
        }
        .error-message {
            color: red;
            display: none;
            margin-bottom: 15px;
            margin-top: 5px;
            font-size: 12px;
        }
        .agreement-text {
            margin-bottom: 20px;
            margin-top: 10px;
        }
        .section-header {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 15px;
            font-weight: bold;
        }
        .terms-container {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .terms-container input[type="checkbox"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="form-header">
        <h2>Faculty Registration Form</h2>
    </div>

    <form id="facultyForm">
        <div class="form-group">
            <label for="employment_status" class="required">Employment Status</label>
            <select id="employment_status" name="employment_status" required onchange="toggleForm()">
                <option value="Regular">Regular</option>
                <option value="Part-Time">Part-Time</option>
            </select>
        </div>

        <div id="partTimeForm">
            <div class="section-header">Basic Details</div>

            <div class="row">
                <div class="column form-group">
                    <label for="last_name" class="required">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="column form-group">
                    <label for="first_name" class="required">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="column form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name">
                </div>
                <div class="column form-group">
                    <label for="name_extension">Name Extension</label>
                    <input type="text" id="name_extension" name="name_extension" placeholder="e.g., Jr., Sr., III">
                </div>
            </div>

            <div class="row">
                <div class="column form-group">
                    <label for="date_of_birth" class="required">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required onchange="calculateAge()">
                </div>
                <div class="column form-group">
                    <label for="age">Age</label>
                    <input type="text" id="age" name="age" readonly>
                </div>
                <div class="column form-group">
                    <label for="place_of_birth" class="required">Place of Birth</label>
                    <input type="text" id="place_of_birth" name="place_of_birth" required>
                </div>
            </div>

            <div class="row">
               
                <div class="column form-group">
                    <label for="sex" class="required">Sex</label>
                    <select id="sex" name="sex" required>
                        <option value="">Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="column form-group">
                    <label for="civil_status" class="required">Civil Status</label>
                    <select id="civil_status" name="civil_status" required>
                        <option value="">Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="column form-group">
                    <label for="citizenship" class="required">Citizenship</label>
                    <input type="text" id="citizenship" name="citizenship" required>
                </div>
            </div>

            <div class="section-header">Personal Details</div>

            <div class="row">
                <div class="column form-group">
                    <label for="gsis_id_no">GSIS ID No.</label>
                    <input type="text" id="gsis_id_no" name="gsis_id_no">
                </div>
                <div class="column form-group">
                    <label for="pagibig_id_no">Pag-IBIG ID No.</label>
                    <input type="text" id="pagibig_id_no" name="pagibig_id_no">
                </div>
                <div class="column form-group">
                    <label for="philhealth_no">PhilHealth No.</label>
                    <input type="text" id="philhealth_no" name="philhealth_no">
                </div>
            </div>

            <div class="row">
                <div class="column form-group">
                    <label for="sss_no">SSS No.</label>
                    <input type="text" id="sss_no" name="sss_no">
                </div>
                <div class="column form-group">
                    <label for="tin_no">TIN No.</label>
                    <input type="text" id="tin_no" name="tin_no">
                </div>
                <div class="column form-group">
                    <label for="agency_employee_no">Agency Employee No.</label>
                    <input type="text" id="agency_employee_no" name="agency_employee_no">
                </div>
            </div>

            <div class="agreement-text">
                <p>By submitting this form, you acknowledge that your personal data is collected and processed in accordance with the Data Privacy Act of 2012 (R.A. 10173). You agree to the terms and conditions of this registration and confirm that the information provided is accurate and truthful to the best of your knowledge.</p>
            </div>
            <div class="terms-container">
                <input type="checkbox" id="agree_terms" name="agree_terms" required>
                <label for="agree_terms">I agree to the terms and conditions</label>
            </div>
        </div>

        <div id="regularForm">
            <p>This is a regular employee. Please proceed to update your details in the personal information system.</p>

            <div id="partTimeForm">
            <div class="section-header">Basic Details</div>

            <div class="row">
                <div class="column form-group">
                    <label for="last_name" class="required">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="column form-group">
                    <label for="first_name" class="required">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="column form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name">
                </div>
                <div class="column form-group">
                    <label for="name_extension">Name Extension</label>
                    <input type="text" id="name_extension" name="name_extension" placeholder="e.g., Jr., Sr., III">
                </div>
            </div>

            <div class="row">
                <div class="column form-group">
                    <label for="date_of_birth" class="required">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required onchange="calculateAge()">
                </div>
                <div class="column form-group">
                    <label for="age">Age</label>
                    <input type="text" id="age" name="age" readonly>
                </div>
            </div>

            <div class="row">
                <div class="column form-group">
                    <label for="place_of_birth" class="required">Place of Birth</label>
                    <input type="text" id="place_of_birth" name="place_of_birth" required>
                </div>
                <div class="column form-group">
                    <label for="sex" class="required">Sex</label>
                    <select id="sex" name="sex" required>
                        <option value="">Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="column form-group">
                    <label for="civil_status" class="required">Civil Status</label>
                    <select id="civil_status" name="civil_status" required>
                        <option value="">Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="column form-group">
                    <label for="citizenship" class="required">Citizenship</label>
                    <input type="text" id="citizenship" name="citizenship" required>
                </div>
            </div>
            <div class="section-header">Personal Details</div>

            <div class="row">
                <div class="column form-group">
                    <label for="gsis_id_no">GSIS ID No.</label>
                    <input type="text" id="gsis_id_no" name="gsis_id_no">
                </div>
                <div class="column form-group">
                    <label for="pagibig_id_no">Pag-IBIG ID No.</label>
                    <input type="text" id="pagibig_id_no" name="pagibig_id_no">
                </div>
                <div class="column form-group">
                    <label for="philhealth_no">PhilHealth No.</label>
                    <input type="text" id="philhealth_no" name="philhealth_no">
                </div>
            </div>

            <div class="row">
                <div class="column form-group">
                    <label for="sss_no">SSS No.</label>
                    <input type="text" id="sss_no" name="sss_no">
                </div>
                <div class="column form-group">
                    <label for="tin_no">TIN No.</label>
                    <input type="text" id="tin_no" name="tin_no">
                </div>
                <div class="column form-group">
                    <label for="agency_employee_no">Agency Employee No.</label>
                    <input type="text" id="agency_employee_no" name="agency_employee_no">
                </div>
            </div>

            <div class="agreement-text">
                <p>By submitting this form, you acknowledge that your personal data is collected and processed in accordance with the Data Privacy Act of 2012 (R.A. 10173). You agree to the terms and conditions of this registration and confirm that the information provided is accurate and truthful to the best of your knowledge.</p>
            </div>
            <div class="terms-container">
                <input type="checkbox" id="agree_terms" name="agree_terms" required>
                <label for="agree_terms">I agree to the terms and conditions</label>
            </div>
        </div>
        </div>

        <div class="form-actions">
            <button type="submit">Submit</button>
            <button type="reset" class="secondary">Reset</button>
        </div>
    </form>
</div>

<script>
    function toggleForm() {
        var employmentStatus = document.getElementById('employment_status').value;
        var partTimeForm = document.getElementById('partTimeForm');
        var regularForm = document.getElementById('regularForm');

        if (employmentStatus === 'Part-Time') {
        partTimeForm.style.display = 'block';
        regularForm.style.display = 'none';
    } else if (employmentStatus === 'Regular') {
        partTimeForm.style.display = 'none';
        regularForm.style.display = 'block';
    }
    
    }

    function calculateAge() {
        var birthDate = new Date(document.getElementById('date_of_birth').value);
        var today = new Date();
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();

        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        document.getElementById('age').value = age;
    }
</script>

</body>
</html>
