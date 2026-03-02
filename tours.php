<html>
    <head>
        <meta charset="UTF-8">
        <title>Astronomica - Astronomy museum</title>
        <link rel="stylesheet" href="styles-tour.css">
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
                <li><a href="index.php#contact">Contact</a></li>
            </ul>
            <div class="nav-login">
                <a href="membership.php">Membership</a>
                <span style="width: 80px"> </span>
            </div>
        </nav>
<div class="tour1">
            <div style="height: 200px;">TOURS</div>

            <div class="tour">

                <div class="tour-card card1">
                    <div class="tour-name"><h3>Rocketry exhibit</h3></div>
                    <div class="tour-info">
                        <p></p>
                    </div>
                </div>

                <div class="tour-card card2">
                    <div class="tour-name"><h3>Constellation exhibit</h3></div>
                    <div class="tour-info">
                        <p></p>
                    </div>
                </div>

                <div class="tour-card card3">
                    <div class="tour-name"><h3>Planetary exhibit</h3></div>
                    <div class="tour-info">
                        <p></p>
                    </div>
                </div>

            </div>   
            
             <div class="tour">

                <div class="tour-card2" style="margin-top: -100; border-top-right-radius: 0; border-top-left-radius: 0;">
                    <div class="tour-par">
                        <p>ROCKETS AND PROBES</p>
                        <hr style="width: 80%;">
                        Explore vintage spacecraft. Guided walk-through starts every hour.
                        <button class="button-buy open-modal-btn" data-tour="Rocketry exhibit">Book a tour</button>
                    </div>
                </div>

                <div class="tour-card2" style="margin-top: -100; border-top-right-radius: 0; border-top-left-radius: 0;">
                    <div class="tour-par">
                        <p>STARS AND GALAXIES</p>
                        <hr style="width: 80%;">
                        View 3D star maps. Sit-down laser show included.
                       <button class="button-buy open-modal-btn" data-tour="Constellation exhibit">Book a tour</button>
                    </div>
                </div>

                <div class="tour-card2" style="margin-top: -100; border-top-right-radius: 0; border-top-left-radius: 0;">
                    <div class="tour-par">
                        <p style="font-size: 17.8px;">PLANETS AND SOLAR SYSTEMS</p>
                        <hr style="width: 80%;">
                        Touch real meteorites. Self-paced interactive tour.                        
                        <button class="button-buy open-modal-btn" data-tour="Planetary exhibit">Book a tour</button>
                         
                    </div>
                </div>

            </div>  
        </div>


        <div id="bookingModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Book Your Tour</h2>
                <hr>
                <form action="process_booking.php" method="POST">
                    <input type="hidden" id="selectedTour" name="tour_name" value="">

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" required placeholder="John Doe">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required placeholder="john@example.com">
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <div class="form-group" style="flex: 1;">
                            <label>Guests</label>
                            <input type="number" name="guest_count" min="1" max="20" value="1" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Date</label>
                            <input type="date" name="booking_date" required>
                        </div>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <div class="form-group" style="flex: 1;">
                            <label>Preferred Time</label>
                            <select name="booking_time" required>
                                <option value="10:00:00">10:00 AM</option>
                                <option value="13:00:00">01:00 PM</option>
                                <option value="16:00:00">04:00 PM</option>
                            </select>
                        </div>
                        
                        <div class="form-group" style="flex: 1;">
                            <label>Payment Method</label>
                            <select name="payment_method" id="paymentMethod" onchange="togglePaymentFields()" required>
                                <option value="">Select Payment...</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="PayPal">PayPal</option>
                                <option value="At Entrance">Pay at Entrance</option>
                            </select>
                        </div>
                    </div>

                    <div id="extra-payment-info" style="display: none; background: #f9f9f9; padding: 15px; border-radius: 8px; margin-top: 10px; margin-bottom: 15px; border: 1px dashed #d4af37;">
                        <div id="card-fields" style="display: none;">
                            <div class="form-group">
                                <label>Card Number</label>
                                <input type="text" name="card_no" placeholder="1234 5678 9101 1121">
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <input type="text" name="expiry" placeholder="MM/YY" style="flex: 1;">
                                <input type="text" name="cvv" placeholder="CVV" style="flex: 1;">
                            </div>
                        </div>

                        <div id="paypal-fields" style="display: none;">
                            <p style="font-size: 13px; color: #555; margin: 0;">You will be redirected to PayPal to complete your booking.</p>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Confirm Booking</button>
                </form>
            </div>
        </div>

        <script>
    const modal = document.getElementById("bookingModal");
    const closeBtn = document.querySelector(".close-btn");
    const tourInput = document.getElementById("selectedTour");

    // Function to open the modal and set the tour name
    const openBooking = (tourName) => {
        tourInput.value = tourName; // Sets the hidden input for PHP
        modal.style.display = "flex"; // Shows the pop-up
    };

    // 1. Listen for clicks on the Image Cards (the .tour-card divs)
    document.querySelectorAll(".tour-card").forEach(card => {
        card.addEventListener("click", () => {
            const name = card.querySelector("h3").innerText;
            openBooking(name);
        });
    });

    // 2. Listen for clicks on the "Book a tour" Buttons
    document.querySelectorAll(".open-modal-btn").forEach(btn => {
        btn.addEventListener("click", (e) => {
            e.preventDefault(); // Prevents any default link action
            const name = btn.getAttribute("data-tour");
            openBooking(name);
        });
    });

    // 3. Close modal logic
    closeBtn.onclick = () => modal.style.display = "none";
    window.onclick = (event) => {
        if (event.target == modal) modal.style.display = "none";
    };

    function togglePaymentFields() {
        const method = document.getElementById("paymentMethod").value;
        const extraInfo = document.getElementById("extra-payment-info");
        const cardFields = document.getElementById("card-fields");
        const paypalFields = document.getElementById("paypal-fields");

        // Show the main container if a method is selected
        extraInfo.style.display = (method === "Credit Card" || method === "PayPal") ? "block" : "none";

        // Show Card fields ONLY if Credit Card is picked
        cardFields.style.display = (method === "Credit Card") ? "block" : "none";

        // Show PayPal message ONLY if PayPal is picked
        paypalFields.style.display = (method === "PayPal") ? "block" : "none";
    }
</script>


    </body>
</html>