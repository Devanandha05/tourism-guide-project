<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'connect.php';
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Set Budget Amount
if (isset($_POST['set_budget'])) {
    $budget = $_POST['budget'];
    $sql = "UPDATE user_data SET budget = $budget, balance = $budget WHERE user_id = $user_id";
    $conn->query($sql);
}
/*
// Add Expense
if (isset($_POST['add_expense'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];

    // Insert expense into budget_tracker
    $sql = "INSERT INTO budget_tracker (user_id, title, description, amount) VALUES ($user_id, '$title', '$description', $amount)";
    $conn->query($sql);

    // Update user's balance
    $update_balance_sql = "UPDATE user_data SET balance = balance - $amount WHERE user_id = $user_id";
    $conn->query($update_balance_sql);
}
*/

// Get User Data
$userQuery = $conn->query("SELECT budget, balance FROM user_data WHERE user_id = $user_id");
$userData = $userQuery->fetch_assoc();
$budget = $userData['budget'];
$balance = $userData['balance'];


// Get Expenses
$expenseQuery = $conn->query("SELECT * FROM budget_tracker WHERE user_id = $user_id ORDER BY b_id DESC");
$expenses = $expenseQuery->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>
    <link rel="stylesheet" href="budgettracker.css">
    <script>
        // Intercept the form submission
$("#expenseForm").submit(function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Collect form data
    const formData = $(this).serialize();

    // Send data to budget.php via AJAX
    $.ajax({
        url: "budget.php", // Path to your PHP handler
        type: "POST",
        data: formData,
        dataType: "json", // Expect JSON response from the server
        success: function (data) {
            if (data.success) {
                // Append the new expense to the table
                const expenseList = $("#expenseList");
                const newRow = `
                    <tr>
                        <td>${data.expense.title}</td>
                        <td>${data.expense.description}</td>
                        <td>${data.expense.amount}</td>
                    </tr>`;
                expenseList.append(newRow);

                // Clear the form inputs
                $("#expenseForm")[0].reset();
            } else {
                alert(data.error); // Display error if something went wrong
            }
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
            alert("An error occurred while adding the expense.");
        },
    });
});

    </script>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Hello, <?php echo htmlspecialchars($username ?? 'User'); ?></h1>
            <div class="total-box">
                <span>Your Balance</span>
                <h2>₹ <?php echo isset($balance) ? number_format($balance, 2) : '0.00'; ?></h2>
            </div>
            <div class="initial-budget">
                <span>Initial Budget: 
                ₹<?php echo isset($budget) ? number_format($budget, 2) : '0.00'; ?></span>
            </div>
            <div class="breakdown">
                <h3>Expenses</h3>
                <?php if (!empty($expenses) && is_array($expenses)): ?> <!-- Check if expenses is an array -->
                    <?php foreach ($expenses as $expense): ?>
                        <div class="expense-item">
                            <div class="details">
                                <p class="ex-title"><?php echo htmlspecialchars($expense['title'] ?? ''); ?></p> <!-- Fallbacks for missing data -->
                                <p class="ex-description"><?php echo htmlspecialchars($expense['description'] ?? ''); ?></p>
                                <p class="ex-amount">~ ₹ <?php echo isset($expense['amount']) ? number_format($expense['amount'], 2) : '0.00'; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No expenses recorded.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="right-panel">
            <form method="POST" action="budget.php">
                <div class="set-amount">
                    <h3>Set Your Budget Amount</h3>
                    <div class="input-group">
                        <span>₹</span>
                        <input type="text" name="budget" placeholder="Amount" required>
                    </div>
                    <button type="submit" name="set_budget">Set Budget</button>
                </div>
            </form>

            <form id="expenseform" method="POST" action="budget.php">
                <div class="expense-input">
                    <div class="input-group">
                        <input type="text" name="title" placeholder="Expense Title" required>
                    </div>
                    <div class="input-group">
                        <input type="text" name="description" placeholder="Expense Description">
                    </div>
                    <div class="input-group">
                        <span>₹</span>
                        <input type="text" name="amount" placeholder="Amount" required>
                    </div>
                    <button class="add-btn" type="submit" name="add_expense">Add Expense</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
