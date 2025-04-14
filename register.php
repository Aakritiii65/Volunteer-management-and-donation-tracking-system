<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $conn = $database->getConnection();
    $username = isset($_POST['username']) ? sanitize_input($_POST['username']) : '';
    $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $first_name = isset($_POST['first_name']) ? sanitize_input($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? sanitize_input($_POST['last_name']) : '';
    $full_name = $first_name . ' ' . $last_name;
    $role = 'volunteer';
    
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($first_name) || empty($last_name)) {
        $error = "All fields are required";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long";
    } elseif (strlen($username) < 3) {
        $error = "Username must be at least 3 characters long";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $error = "Username can only contain letters, numbers, and underscores";
    } else {
        try {
            $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->execute([$username]);
            if ($stmt->fetch()) {
                $error = "Username already taken";
            } else {
                $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);
                if ($stmt->fetch()) {
                    $error = "Email already registered";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users (username, email, password, full_name, role) VALUES (?, ?, ?, ?, ?)");
                    if ($stmt->execute([$username, $email, $hashed_password, $full_name, $role])) {
                        $_SESSION['registration_success'] = true;
                        $_SESSION['registered_email'] = $email;
                        header('Location: login.php');
                        exit();
                    } else {
                        $error = "Registration failed. Please try again.";
                    }
                }
            }
        } catch (PDOException $e) {
            $error = "An error occurred. Please try again later.";
            error_log("Registration error: " . $e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - VolunteerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .glass {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-yellow-700 ">

    <div class="bg-cover p-6 bg-center h-100 w-full flex items-center justify-center" style="background-image: url('d3.jpeg');">
    <div class="w-full max-w-md p-8 glass text-white shadow-lg fade-in">

            <div class="text-center mb-6">
                <div class="bg-white/20 p-4 rounded-full inline-block mb-3">
                    <i class="fas fa-user-plus text-4xl text-yellow-200"></i>
                </div>
                <h1 class="text-3xl font-bold text-white">Join Sparkservices</h1>
                <p class="text-yellow-200">We are ready to provide better service to make the world happy.</p>
            </div>

            <?php if ($error): ?>
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4 animate-pulse">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span><?php echo $error; ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <form method="POST" action="register.php" class="space-y-4">

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-sm text-yellow-200">First Name</label>
                        <input type="text" id="first_name" name="first_name" required
                            class="w-full px-3 py-2 rounded-md bg-white/80 text-black focus:outline-none"
                            value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm text-yellow-200">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required
                            class="w-full px-3 py-2 rounded-md bg-white/80 text-black focus:outline-none"
                            value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>">
                    </div>
                </div>

                <div>
                    <label for="username" class="block text-sm text-yellow-200">Username</label>
                    <input type="text" id="username" name="username" required
                        class="w-full px-3 py-2 rounded-md bg-white/80 text-black focus:outline-none"
                        value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                        pattern="[a-zA-Z0-9_]+" title="Username can only contain letters, numbers, and underscores">
                    <p class="text-xs text-white/80 mt-1">Only letters, numbers, and underscores allowed</p>
                </div>

                <div>
                    <label for="email" class="block text-sm text-yellow-200">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-3 py-2 rounded-md bg-white/80 text-black focus:outline-none"
                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>

                <div>
                    <label for="password" class="block text-sm text-yellow-200">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 rounded-md bg-white/80 text-black focus:outline-none">
                    <p class="text-xs text-white/80 mt-1">Must be at least 8 characters</p>
                </div>

                <div>
                    <label for="confirm_password" class="block text-sm text-yellow-200">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required
                        class="w-full px-3 py-2 rounded-md bg-white/80 text-black focus:outline-none">
                </div>

                <button type="submit" class="w-full bg-yellow-600 hover:bg-yellow-500 transition duration-200 text-white font-semibold py-2 px-4 rounded-md">
                    Create Account
                </button>
            </form>

            <p class="text-center mt-6 text-yellow-100">Already have an account?
                <a href="login.php" class="underline font-semibold hover:text-yellow-300">Sign in</a>
            </p>
        </div>
    </div>
</body>
</html>

