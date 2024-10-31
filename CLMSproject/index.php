<!DOCTYPE html>
<html>
<head>
    <title>Computer Laboratory Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'navigation.php'; ?>
    <div class="container">
        <div class="left-side">
            <div class="login-form">
                <?php include 'login_form.php'; ?>
            </div>
            <div class="gallery-link">
                <a href="photo_gallery.php" target="_blank">Your Practical Labs Gallery!!!</a>
            </div>
        </div>
        <div class="right-side">
            <div class="download-labbooks">
                <?php include 'download_labbooks.php'; ?>
            </div>
            <div class="check-practical-schedule">
                <?php include 'check_practical_schedule.php'; ?>
            </div>
            <div class="lab-availability">
                <?php include 'lab_availability.php'; ?>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="google-map-container">
        <?php include 'google_map.php'; ?>
    </div>
    <div class="contact-us-container">
        <?php include 'contact_us.php'; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
<style>
    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
    }

    .gallery-link a {
        animation: blink 1s infinite;
    }
</style>