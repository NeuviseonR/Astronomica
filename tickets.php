<?php
// --- DATABASE CONNECTION & INSERT LOGIC ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "astronomica";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form names we added below
    $tier = $_POST['tier_name'];
    $email = $_POST['email_address'];
    $date = $_POST['mission_date'];
    $payment = $_POST['payment_method'];
    $account = isset($_POST['account_info']) ? $_POST['account_info'] : 'Card Transaction';

    $stmt = $conn->prepare("INSERT INTO ticket_bookings (ticket_tier, email, mission_date, payment_method, account_info) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $tier, $email, $date, $payment, $account);
    
    if ($stmt->execute()) {
        echo "<script>alert('Mission Confirmed! Data saved to database.');</script>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tickets - Astronomica</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Modern Space Theme Enhancements */
        body {
            background-image: url("images/back.webp");
            color: #ffffff;
            height: fit-content;
        }

        .ticket-header {
            text-align: center;
            padding: 15vh 20px 40px;
        }

        .ticket-header h1 {
            font-size: 3rem;
            color: #d4af37;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 10px;
        }

        .ticket-grid {
            display: flex;
            justify-content: center;
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto 60px;
            padding: 0 20px;
        }

        /* Glassmorphism Card Design */
        .ticket-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(39, 104, 255, 0.3);
            border-radius: 20px;
            padding: 40px 30px;
            width: 320px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .ticket-card:hover {
            transform: translateY(-15px);
            border-color:rgba(255, 194, 39, 0.76);
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.2);
            background: rgba(255, 255, 255, 0.07);
        }

        .vip-card {
            border: 2px solid #285aff;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.1);
        }
        
        .vip-badge {
            position: absolute;
            top: 20px;
            right: -30px;
            background: #d4af37;
            color: black;
            padding: 5px 40px;
            transform: rotate(45deg);
            font-weight: bold;
            font-size: 0.8rem;
        }

        .tier-name { color: #d4af37; font-size: 1.8rem; margin: 0; }
        .price { font-size: 3.5rem; margin: 20px 0; font-family: Arial; }
        .price span { font-size: 1rem; color: #aaa; }
        
        .availability { 
            font-family: Arial; 
            font-size: 0.85rem; 
            margin-bottom: 25px; 
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
        }

        .features {
            list-style: none;
            padding: 0;
            text-align: left;
            margin-bottom: 30px;
            flex-grow: 1;
        }

        .features li {
            margin: 15px 0;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
        }

        .features li::before {
            content: "✦";
            color: #d4af37;
            margin-right: 12px;
        }

        /* Selection Form Overlay */
        #booking-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(8px);
            overflow-y: auto;
        }

        .booking-form {
            background: #ffffff;
            color: #030011;
            padding: 40px;
            border-radius: 30px;
            width: 90%;
            max-width: 550px;
            position: relative;
            margin: 20px;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 25px;
            font-size: 2rem;
            cursor: pointer;
            color: #666;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-group {
            flex: 1;
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: bold;
            margin-bottom: 5px;
            color: #444;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        #payment-details {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 15px;
            margin-top: 10px;
            display: none;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: #3d7cf1;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 20px;
        }

        .submit-btn:hover { background: #1e56c4; transform: scale(1.02); }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-logo"> 
            <span style="width: 20px"> </span>
            <span>Astronomica</span>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="tours.php">Tours</a></li>
            <li><a href="tickets.php">Tickets</a></li>
            <li><a href="#">Booking</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="nav-login">
            <a href="membership.php">Membership</a>
            <span style="width: 80px"> </span>
        </div>
    </nav>

    <div class="ticket-header">
        <h1>Mission Briefing</h1>
        <p>Select your clearance level to explore the depths of our galaxy.</p>
        <P>"Each ticket grants comprehensive facility access for the duration of the scheduled date, 
            concluding at the close of daily operations."</P>   
    </div>

    <div class="ticket-grid">
        <div class="ticket-card" onclick="openBooking('Basic Rover', '$25')">
            <h3 class="tier-name">Basic Rover</h3>
            <div class="price">$25<span>/person</span></div>
            <span class="availability">High Availability</span>
            <ul class="features">
                <li>Main Exhibit Hall Access</li>
                <li>Rocketry Outdoor Park</li>
                <li>Digital Star Map App</li>
            </ul>
            <button class="b2" style="width:100%; color:#d4af37; border-color:#d4af37; padding: 10px; cursor:pointer; background:transparent; border: 1px solid; border-radius:50px;">Select Tier</button>
        </div>

        <div class="ticket-card" onclick="openBooking('Enhanced Explorer', '$55')">
            <h3 class="tier-name">Enhanced Explorer</h3>
            <div class="price">$55<span>/person</span></div>
            <span class="availability">Limited Slots</span>
            <ul class="features">
                <li>Everything in Basic</li>
                <li>Interactive VR Simulation</li>
                <li>Planetarium Laser Show</li>
                <li>Guided Solar Walk</li>
            </ul>
            <button class="b1" style="width:100%; background:#3d7cf1; border:none; padding: 10px; border-radius:50px; color:white; cursor:pointer;">Select Tier</button>
        </div>

        <div class="ticket-card vip-card" onclick="openBooking('VIP Commander', '$120')">
            <div class="vip-badge">ELITE</div>
            <h3 class="tier-name">VIP Commander</h3>
            <div class="price">$120<span>/person</span></div>
            <span class="availability" style="background:rgba(255,100,100,0.1); color:#ff6b6b;">Only 12 Left</span>
            <ul class="features">
                <li>All-Access Pass</li>
                <li>Real Meteorite Handling</li>
                <li>Vault of Ancient Artifacts</li>
                <li>Private Telescope Session</li>
            </ul>
            <button class="b1" style="width:100%; background:#d4af37; border:none; padding: 10px; border-radius:50px; color:black; font-weight:bold; cursor:pointer;">Select Tier</button>
        </div>
    </div>

    <div id="booking-overlay">
        <div class="booking-form">
            <span class="close-btn" onclick="closeBooking()">&times;</span>
            <h2 id="form-title" style="margin-top:0; color:#3d7cf1;">Complete Booking</h2>
            <p>Clearance Level: <strong id="display-tier"></strong></p>
            
            <form action="tickets.php" method="POST">
                <input type="hidden" name="tier_name" id="db-tier-input">
                <div class="form-row">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email_address" class="form-input" placeholder="commander@space.com" required>
                    </div>
                    <div class="form-group">
                        <label>Date of Mission</label>
                        <input type="date" name="mission_date" class="form-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Payment Method</label>
                    <select id="payment-method" name="payment_method" class="form-input" onchange="togglePaymentDetails()" required>
                        <option value="">Choose Method...</option>
                        <option value="card">Interstellar Credit (Visa/MC)</option>
                        <option value="wallet">Digital Wallet (PayPal/Crypto)</option>
                    </select>
                </div>

                <div id="payment-details">
                    <div id="card-fields" style="display:none;">
                        <div class="form-group">
                            <label>Card Number</label>
                            <input type="text" class="form-input" placeholder="0000 0000 0000 0000">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Expiry</label>
                                <input type="text" class="form-input" placeholder="MM/YY">
                            </div>
                            <div class="form-group">
                                <label>CVV</label>
                                <input type="password" class="form-input" placeholder="***">
                            </div>
                        </div>
                    </div>
                    <div id="wallet-fields" style="display:none;">
                        <p style="font-size:0.9rem; color:#666;">You will be redirected to complete your secure transaction.</p>
                        <div class="form-group">
                            <label>Account Username/Address</label>
                            <input type="text" name="account_info" class="form-input" placeholder="@astronomer_id">
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Finalize Mission</button>
            </form>
        </div>
    </div>

    <script>
        function openBooking(tier, price) {
            document.getElementById('booking-overlay').style.display = 'flex';
            document.getElementById('display-tier').innerText = tier + " - " + price;
            // ADDED: Set the hidden input value for the database
            document.getElementById('db-tier-input').value = tier;
        }

        function closeBooking() {
            document.getElementById('booking-overlay').style.display = 'none';
        }

        function togglePaymentDetails() {
            const method = document.getElementById('payment-method').value;
            const container = document.getElementById('payment-details');
            const cardFields = document.getElementById('card-fields');
            const walletFields = document.getElementById('wallet-fields');

            if (method) {
                container.style.display = 'block';
                cardFields.style.display = method === 'card' ? 'block' : 'none';
                walletFields.style.display = method === 'wallet' ? 'block' : 'none';
            } else {
                container.style.display = 'none';
            }
        }

        window.onclick = function(event) {
            let overlay = document.getElementById('booking-overlay');
            if (event.target == overlay) {
                closeBooking();
            }
        }
    </script>
</body>
</html>