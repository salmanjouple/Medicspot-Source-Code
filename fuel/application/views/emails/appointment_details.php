<html>
<head>
    <title>Appointment Details</title>
</head>
<body style="font: 13px arial, helvetica, tahoma;">
    <div class="email-container" style="width: 650px; border: 1px solid #eee;">
        <div id="header" style="background-color: #3DD481; border-bottom: 4px solid #1A865F;
                height: 45px; padding: 10px 15px;">
            <strong id="logo" style="color: white; font-size: 20px;
                    text-shadow: 1px 1px 1px #8F8888; margin-top: 10px; display: inline-block">
                    $company_name</strong>
        </div>

        <div id="content" style="padding: 10px 15px;">
            <h2>$email_title</h2>
            <p>$email_message</p>

            <p>
                YOU HAVE MADE PAYMENT ALREADY – please provide pharmacy code: TYHG78
            </p>

            <h2>Appointment Details</h2>
            <table id="appointment-details">
                <tr>
                    <td class="label" style="padding: 3px;font-weight: bold;">Service</td>
                    <td style="padding: 3px;">$appointment_service</td>
                </tr>
                <tr>
                    <td class="label" style="padding: 3px;font-weight: bold;">Start</td>
                    <td style="padding: 3px;">$appointment_start_date</td>
                </tr>
                <tr>
                    <td class="label" style="padding: 3px;font-weight: bold;">End</td>
                    <td style="padding: 3px;">$appointment_end_date</td>
                </tr>
            </table>

            <h2>Customer Details</h2>
            <table id="customer-details">
                <tr>
                    <td class="label" style="padding: 3px;font-weight: bold;">Name</td>
                    <td style="padding: 3px;">$customer_name</td>
                </tr>
                <tr>
                    <td class="label" style="padding: 3px;font-weight: bold;">Email</td>
                    <td style="padding: 3px;">$customer_email</td>
                </tr>
                <tr>
                    <td class="label" style="padding: 3px;font-weight: bold;">Phone</td>
                    <td style="padding: 3px;">$customer_phone</td>
                </tr>
            </table>
            <p>
            Your Selected Pharmacy: 
            <br>
            $clinic_name, $address
            </p>

            <p>
            What to expect at the pharmacy:
            <ol>
            <li>
            Show this email with your pre-booking code to the pharmacy staff
            </li>
            <li>
            You will be asked to complete a short sign-up form
            </li>
            <li>
            Within a matter of minutes, you will be speaking to one of our expert UK qualified GP’s about your healthcare needs through our revolutionary MedicSpot clinical station
            </li>
            <li>
            Our GP will provide you with expert diagnosis, advice and treatment
            </li>
            <li>
            You can collect any prescribed medication instantly from the pharmacy
            </li>
            </ol>
            <br>
            We look forward to helping you,

            </p>
        </div>

        <div id="footer" style="padding: 10px; text-align: center; margin-top: 10px;
                border-top: 1px solid #EEE; background: #FAFAFA;">
            <a href="$company_link" style="text-decoration: none;">$company_name</a>
        </div>
    </div>
</body>
</html>
