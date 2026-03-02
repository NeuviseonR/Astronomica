<?php
$auctionId = $_GET['auction'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy Ticket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="overlay">
    <div class="ticket-form">
        <h1>Purchase Ticket</h1>

        <?php if ($auctionId): ?>
            <p>You're buying a ticket for Auction #<?= htmlspecialchars($auctionId); ?></p>

            <form method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Email Address" required>

                <button type="submit">Confirm Ticket</button>
            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
                <p class="success">
                    🎟️ Ticket confirmed! A confirmation email will be sent shortly.
                </p>
            <?php endif; ?>

        <?php else: ?>
            <p>No auction selected.</p>
        <?php endif; ?>

        <a class="back-link" href="index.php">← Back to Auctions</a>
    </div>
</div>

</body>
</html>
