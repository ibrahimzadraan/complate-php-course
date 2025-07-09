<?php
if (isset($_GET["accept_cookie"])) {
    setcookie("cookie_accepted", "yes", time() + (86400 * 30), "/");
    exit;
}
?>


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
        $name = $email = $phone = $student_id = $group = $birth_date = $gender = $address = $photo = "";
        $students = [];
        $success = "";
        $error = [];

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
            $student_id = ($_POST['student_id']);
            $group = ($_POST['group']);
            $birth_date = ($_POST['birth_date']);
            $gender = ($_POST['gender'] ?? "");
            $address = ($_POST['address']);
            $photo = $_FILES['photo']['name'];


            // Validation
            if (empty($name)) $error['name'] = "Name is required";
            if (empty($email)) $error['email'] = "Email is required";
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email'] = "Invalid email format";
            if (empty($phone)) $error['phone'] = "Phone is required";
            if (empty($student_id)) $error['student_id'] = "Student ID is required";
            if (empty($group)) $error['group'] = "Group is required";
            if (empty($birth_date)) $error['birth_date'] = "Birth Date is required";
            if (empty($gender)) $error['gender'] = "Gender is required";
            if (empty($address)) $error['address'] = "Address is required";
            if (empty($photo)) $error['photo'] = "Photo is required";


            // If no errors, save data
            if (empty($error)) {
                if (!isset($_SESSION['students'])) {
                    $_SESSION['students'] = [];
                }

                // Upload image
                $upload_dir = "uploads/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                $target_file = $upload_dir . basename($_FILES["photo"]["name"]);
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                $photo = $target_file;

                $newStudent = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'student_id' => $student_id,
                    'group' => $group,
                    'birth_date' => $birth_date,
                    'gender' => $gender,
                    'address' => $address,
                    'photo' => $photo
                ];

                $_SESSION['students'][] = $newStudent;
                $students = $_SESSION['students'];
                $success = "New Student Added Successfully";
            }
        }
        ?>

        <div class="form-container">
            <form method="POST" action="" enctype="multipart/form-data">

                <?php if (!empty($success)): ?>
                    <div class="success"><?php echo $success; ?></div>
                <?php endif; ?>


                <!-- Name -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                </div>
                <?php if (isset($error['name'])): ?>
                    <div class="error"><?php echo $error['name']; ?></div>
                <?php endif; ?>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                </div>
                <?php if (isset($error['email'])): ?>
                    <div class="error"><?php echo $error['email']; ?></div>
                <?php endif; ?>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
                </div>
                <?php if (isset($error['phone'])): ?>
                    <div class="error"><?php echo $error['phone']; ?></div>
                <?php endif; ?>

                <!-- Student ID -->
                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" id="student_id" name="student_id" value="<?php echo htmlspecialchars($student_id); ?>">
                </div>
                <?php if (isset($error['student_id'])): ?>
                    <div class="error"><?php echo $error['student_id']; ?></div>
                <?php endif; ?>

                <!-- Group Dropdown -->
                <div class="form-group">
                    <label for="group">Group</label>
                    <select id="group" name="group" class="group-dropdown">
                        <option value="">Select Group</option>
                        <option value="Science" <?php if ($group == "Science") echo "selected"; ?>>Science</option>
                        <option value="Commerce" <?php if ($group == "Commerce") echo "selected"; ?>>Commerce</option>
                        <option value="Arts" <?php if ($group == "Arts") echo "selected"; ?>>Arts</option>
                    </select>
                </div>

                <?php if (isset($error['group'])): ?>
                    <div class="error"><?php echo $error['group']; ?></div>
                <?php endif; ?>

                <!-- Birth Date -->
                <div class="form-group">
                    <label for="birth_date">Date of Birth</label>
                    <input type="date" id="birth_date" name="birth_date" value="<?php echo htmlspecialchars($birth_date); ?>">
                </div>

                <?php if (isset($error['birth_date'])): ?>
                    <div class="error"><?php echo $error['birth_date']; ?></div>
                <?php endif; ?>

                <!-- Gender -->
                <div class="form-group">
                    <label>Gender</label>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male</label>
                        <label><input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female</label>
                        <label><input type="radio" name="gender" value="Other" <?php if ($gender == "Other") echo "checked"; ?>> Other</label>
                    </div>
                </div>

                <?php if (isset($error['gender'])): ?>
                    <div class="error"><?php echo ($error['gender']); ?></div>
                <?php endif; ?>

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address"><?php echo htmlspecialchars($address); ?></textarea>
                </div>

                <?php if (isset($error['address'])): ?>
                    <div class="error"><?php echo $error['address']; ?></div>
                <?php endif; ?>

                <!-- Photo Upload -->
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" accept="image/*">
                </div>

                <?php if (isset($error['photo'])): ?>
                    <div class="error"><?php echo $error['photo']; ?></div>
                <?php endif; ?>

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
                            <th>ID</th>
                            <th>Group</th>
                            <th>Gender</th>
                            <th>Birth Date</th>
                            <th>Address</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($students)): ?>
                            <tr>
                                <td>Jone Doe</td>
                                <td>john@example.com</td>
                                <td>1234567890</td>
                                <td>2025001</td>
                                <td>Science</td>
                                <td>Male</td>
                                <td>1990-01-01</td>
                                <td>123 Main St</td>
                                <td><img src="img/image1.jpeg" alt="Student Photo"></td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>1234567890</td>
                                <td>2025002</td>
                                <td>Science</td>
                                <td>Male</td>
                                <td>1990-01-01</td>
                                <td>123 Main St</td>
                                <td><img src="img/image2.jpeg" alt="Student Photo"></td>
                            </tr>
                            <tr>
                                <td>Bob Johnson</td>
                                <td>bob@example.com</td>
                                <td>1234567890</td>
                                <td>2025003</td>
                                <td>Science</td>
                                <td>Male</td>
                                <td>1990-01-01</td>
                                <td>123 Main St</td>
                                <td><img src="img/image3.jpeg" alt="Student Photo"></td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                                    <td><?php echo htmlspecialchars($student['email']); ?></td>
                                    <td><?php echo htmlspecialchars($student['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                                    <td><?php echo htmlspecialchars($student['group']); ?></td>
                                    <td><?php echo htmlspecialchars($student['birth_date']); ?></td>
                                    <td><?php echo htmlspecialchars($student['gender']); ?></td>
                                    <td><?php echo htmlspecialchars($student['address']); ?></td>
                                    <td>
                                        <img src="<?php echo htmlspecialchars($student['photo']); ?>" alt="Student Photo">
                                    </td>
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


        <!-- Cookie Consent -->
        <?php if (!isset($_COOKIE['cookie_accepted'])): ?>
            <div class="cookie-box" id="cookieBox">
                <p>This site uses cookies to enhance your experience.</p>
                <button class="cookie-allow-btn" onclick="accept_cookie()">Allow</button>
            </div>
        <?php endif; ?>

        <script>
            function accept_cookie() {
                fetch("?accept_cookie=true").then(() => {
                    document.getElementById("cookieBox").style.display = "none";
                });
            }
        </script>
    </div>
</body>

</html>