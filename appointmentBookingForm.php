<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = trim($_POST['name']);
    $contact = trim($_POST['contact']);
    $date    = $_POST['date'];
    $time    = $_POST['time'];
    $reason  = $_POST['reason'];
    $note    = trim($_POST['note']);

    if (!empty($name) && !empty($contact) && !empty($date) && !empty($time) && !empty($reason)) {

        $data = "Name: $name | Contact: $contact | Date: $date | Time: $time | Reason: $reason | Note: $note" . PHP_EOL;
        file_put_contents("appointments.txt", $data, FILE_APPEND);

        $message = "Appointment booked successfully!";
    } else {
        $message = "Please fill all required fields.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment Booking</title>
      <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #e8f2f8;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .appointment-container {
            background: #ffffff;
            width: 420px;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #0077b6;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: green;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            width: 100%;
            background: #0077b6;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #005f8f;
        }
    </style>
</head>
<body>
    

    <div class="appointment-container">
         <h2>Doctor Appointment Booking</h2>

         <?php if ($message) echo "<p>$message</p>"; ?>

         <form action="" method="post">
             <div class="form-group">
            <label>Patient Name</label>
            <input type="text" name="name" placeholder="Enter your name">
        </div>

        <div class="form-group">
            <label>Contact Number</label>
            <input type="tel" name="contact" placeholder="Enter mobile number">
        </div>

        <div class="form-group">
            <label>Appointment Date</label>
            <input type="date" name="date">
        </div>

        <div class="form-group">
            <label>Appointment Time</label>
            <input type="time" name="time">
        </div>

        <div class="form-group">
            <label>Reason for Visit</label>
            <select name="reason">
                <option value="">-- Select Reason --</option>
                <option>General Check-up</option>
                <option>Fever</option>
                <option>Consultation</option>
                <option>Follow-up</option>
            </select>
        </div>

        <div class="form-group">
            <label>Additional Message</label>
            <textarea name="note" placeholder="Describe your problem..."></textarea>
        </div>

        <button type="submit">Book Appointment</button>
         </form>
    </div>

</body>
</html>