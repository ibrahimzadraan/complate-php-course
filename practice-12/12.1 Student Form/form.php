<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <?php echo "<link rel='stylesheet' href='styles.css'>"; ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Student Information</h2>
        </div>


        <?php
        $name = $email = $phone = "";
        $students = [];

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Clear submissions button handle
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear'])) {
            unset($_SESSION['students']);
            $students = [];
        }

        // Submit button handle
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $name = ($_POST['name']);
            $email = ($_POST['email']);
            $phone = ($_POST['phone']);


            if (!isset($_SESSION['students'])) {
                $_SESSION['students'] = [];
            }

            $newStudent = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
            ];

            $_SESSION['students'][] = $newStudent;
            $students = $_SESSION['students'];

            $name = "";
            $email = "";
            $phone = "";
        }
        ?>

        <div class="form-container">
            <form method="POST" action="">

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo ($name); ?>">
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo ($email); ?>">
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?php echo ($phone); ?>">
                </div>


                <button type="submit" name="submit" class="submit-btn">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="submissions-list">
            <div class="header">
                <h2>Submission Data</h2>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($students)): ?>
                            <tr>
                                <td>Jone Doe</td>
                                <td>john@example.com</td>
                                <td>1234567890</td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>1234567890</td>
                            </tr>
                            <tr>
                                <td>Bob Johnson</td>
                                <td>bob@example.com</td>
                                <td>1234567890</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?php echo ($student['name']); ?></td>
                                    <td><?php echo ($student['email']); ?></td>
                                    <td><?php echo ($student['phone']); ?></td>

                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Clear Button Form -->
            <form method="POST" action="" style="margin-top: 10px;">
                <button type="submit" class="submit-btn" name="clear" onclick="return confirm('Are you sure you want to clear all submissions?')">Clear Submissions</button>
            </form>
        </div>

    </div>
</body>

</html>