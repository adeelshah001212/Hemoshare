<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS stylesheet link here -->
</head>
<body>
    <header class="page-header">
        <h1 class="page-title">Contact Us</h1>
    </header>

    <section class="contact-info">
        <h2>Contact Information</h2>
        <ul>
            <li><strong>Email:</strong> <a href="mailto:contact@yourwebsite.com" class="contact-link">contact@yourwebsite.com</a></li>
            <li><strong>Phone:</strong> <a href="tel:+11234567890" class="contact-link">+1 (123) 456-7890</a></li>
            <li><strong>Address:</strong> 123 Main Street, City, State, Zip</li>
        </ul>
    </section>

    <section class="contact-form-section">
        <h2>Get in Touch</h2>
        <p class="contact-form-description">Feel free to use the contact form below to reach out to us. We're here to assist you.</p>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];

            // Process the form data, send email, etc.
            // You can customize this section based on your requirements.
            // For demonstration purposes, let's just display the submitted data.
            
            echo "<p class='form-success'>Thank you for contacting us, $name! We'll get back to you soon.</p>";
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contact-form">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-input" required>
            
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-input" required>
            
            <label for="subject" class="form-label">Subject:</label>
            <input type="text" id="subject" name="subject" class="form-input" required>
            
            <label for="message" class="form-label">Message:</label>
            <textarea id="message" name="message" class="form-textarea" rows="4" required></textarea>
            
            <button type="submit" class="form-button">Send Message</button>
        </form>
    </section>

    <!-- Add your Google Maps embed code here -->

    <section class="working-hours">
        <h2>Working Hours</h2>
        <p>We're available to assist you during the following hours:</p>
        <ul class="working-hours-list">
            <li>Monday to Friday: 9:00 AM - 6:00 PM</li>
            <li>Saturday: 10:00 AM - 3:00 PM</li>
            <li>Sunday: Closed</li>
        </ul>
    </section>

    <!-- Add the rest of the content as described in the previous response -->

</body>
</html>