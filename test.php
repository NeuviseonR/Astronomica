<?php
$auctions = [
    [
        "id" => 1,
        "title" => "Modern Masters Auction",
        "date" => "March 15, 2026",
        "pieces" => [
            "Abstract Dreams – J. Collins",
            "Golden Silence – M. Rivera",
            "Fragments of Time – L. Zhang"
        ]
    ],
    [
        "id" => 2,
        "title" => "Renaissance Revival",
        "date" => "April 2, 2026",
        "pieces" => [
            "The Forgotten Muse – A. Romano",
            "Eternal Light – C. De Luca",
            "Echoes of Florence – P. Bianchi"
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Auction House</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="overlay">
    <header>
        <h1>Art Auction House</h1>
        <p>Experience timeless masterpieces</p>
    </header>

    <section class="auctions">
        <?php foreach ($auctions as $auction): ?>
            <div class="auction-card">
                <h2><?= $auction['title']; ?></h2>
                <p class="date"><?= $auction['date']; ?></p>

                <h3>Featured Pieces</h3>
                <ul>
                    <?php foreach ($auction['pieces'] as $piece): ?>
                        <li><?= $piece; ?></li>
                    <?php endforeach; ?>
                </ul>

                <a class="ticket-btn" href="buy_ticket.php?auction=<?= $auction['id']; ?>">
                    Buy Ticket
                </a>
            </div>
        <?php endforeach; ?>
    </section>
</div>

</body>
</html>
