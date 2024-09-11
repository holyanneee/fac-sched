<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Contact Details</title>
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
        <h2>Contact Details</h2>
    </div>

    <form action="contact_details.php" method="POST">
        <div class="section-header">Contact Details</div>

        <div class="row">
            <div class="column form-group">
                <label for="residential_address" class="required">Residential Address</label>
                <input type="text" id="residential_address" name="residential_address" placeholder="House/Block/Lot No., Street" required>
            </div>
        </div>

        <div class="row">
            <div class="column form-group">
                <label for="subdivision_village">Subdivision/Village</label>
                <input type="text" id="subdivision_village" name="subdivision_village" placeholder="Subdivision/Village">
            </div>
            <div class="column form-group">
                <label for="barangay" class="required">Barangay</label>
                <input type="text" id="barangay" name="barangay" required>
            </div>
        </div>

        <div class="row">
            <div class="column form-group">
                <label for="city_municipality" class="required">City/Municipality</label>
                <input type="text" id="city_municipality" name="city_municipality" required>
            </div>
            <div class="column form-group">
                <label for="province" class="required">Province</label>
                <input type="text" id="province" name="province" required>
            </div>
        </div>

        <div class="row">
            <div class="column form-group">
                <label for="residential_zip_code" class="required">Zip Code</label>
                <input type="text" id="residential_zip_code" name="residential_zip_code" required>
            </div>
            <div class="column form-group">
                <label for="mobile_number" class="required">Mobile Number</label>
                <input type="text" id="mobile_number" name="mobile_number" placeholder="09XX-XXX-XXXX" required>
            </div>
            <div class="column form-group">
                <label for="telephone_number">Telephone Number</label>
                <input type="text" id="telephone_number" name="telephone_number" placeholder="(Area Code) XXX-XXXX">
            </div>
            <div class="column form-group">
                <label for="email_address" class="required">Email Address</label>
                <input type="email" id="email_address" name="email_address" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
