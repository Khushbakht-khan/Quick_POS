<?php
session_start();

// Capture errors and old form values from session
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>QuickPOS - The Last POS System You'll Ever Need</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- AOS Animation Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

<style>
/* Root Colors */
:root {
    --primary: #FF6B6B;      /* Coral */
    --primary-dark: #FF4757; /* Darker Coral */
    --secondary: #4ECDC4;    /* Teal */
    --dark: #1A1A1D;
    --gray: #888;
    --light-gray: #F1F2F6;
    --white: #FFFFFF;
}

/* Reset */
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family: 'Inter', sans-serif; line-height:1.6; color:var(--dark); overflow-x:hidden; }
html { scroll-behavior: smooth; }

/* Navigation */
nav { position:fixed; top:0; width:100%; background:rgba(255,255,255,0.95); backdrop-filter:blur(10px); z-index:1000; padding:1rem 0; box-shadow:0 1px 3px rgba(0,0,0,0.1);}
.nav-container { max-width:1200px; margin:0 auto; padding:0 2rem; display:flex; justify-content:space-between; align-items:center; }
.logo { font-size:1.75rem; font-weight:800; color:var(--primary); display:flex; align-items:center; gap:0.5rem; }
.logo i { font-size:2rem; }
.nav-links { display:flex; gap:2rem; list-style:none; align-items:center; }
.nav-links a { text-decoration:none; color:var(--dark); font-weight:500; transition:color 0.3s; }
.nav-links a:hover { color:var(--primary); }
.btn { padding:0.75rem 1.5rem; border-radius:8px; font-weight:600; cursor:pointer; transition:all 0.3s; border:none; text-decoration:none; display:inline-block; }
.btn-primary { background:var(--primary); color:var(--white); }
.btn-primary:hover { background:var(--primary-dark); transform:translateY(-3px) scale(1.05); box-shadow:0 10px 20px rgba(255,107,107,0.3); }
.btn-secondary { background:transparent; color:var(--primary); border:2px solid var(--primary); }
.btn-secondary:hover { background:var(--primary); color:var(--white); }
.mobile-menu-btn { display:none; font-size:1.5rem; background:none; border:none; color:var(--dark); cursor:pointer; }

/* Hero */
.hero {
    padding:120px 2rem 80px;
    background: linear-gradient(270deg, #FF6B6B, #4ECDC4, #FFD93D);
    background-size: 600% 600%;
    animation: gradientBG 15s ease infinite;
    color:var(--white);
    text-align:center;
    margin-top:70px;
}

/* Features */
.features { padding:80px 2rem; background:var(--white); }
.section-title { text-align:center; margin-bottom:3rem; }
.section-title h2 { font-size:2.5rem; font-weight:800; margin-bottom:1rem; color:var(--dark); }
.section-title p { font-size:1.1rem; color:var(--gray); max-width:600px; margin:0 auto; }
.features-grid { max-width:1200px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:2rem; }
.feature-card { padding:2rem; background:var(--light-gray); border-radius:12px; transition:all 0.4s; text-align:center; opacity:0; }
.feature-card:hover { transform:translateY(-10px) scale(1.03); box-shadow:0 20px 40px rgba(0,0,0,0.1); }
.feature-icon { width:70px; height:70px; background:linear-gradient(135deg,var(--primary),var(--secondary)); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 1.5rem; font-size:2rem; color:var(--white); }
.feature-card h3 { font-size:1.5rem; margin-bottom:1rem; color:var(--dark); }
.feature-card p { color:var(--gray); line-height:1.7; }

/* Contact */
.contact { padding:80px 2rem; background:var(--white); }
.contact-container { max-width:600px; margin:0 auto; }
.form-group { margin-bottom:1.5rem; }
.form-group label { display:block; margin-bottom:0.5rem; font-weight:600; color:var(--dark); }
.form-group input, .form-group textarea { width:100%; padding:1rem; border:2px solid var(--light-gray); border-radius:8px; font-size:1rem; font-family:inherit; transition:all 0.3s; }
.form-group input:focus, .form-group textarea:focus { outline:none; border-color:var(--primary); box-shadow:0 0 10px rgba(255,107,107,0.3); }
.form-group textarea { resize:vertical; min-height:150px; }
.error-messages { color:red; margin-bottom:1rem; }

</style>
</head>
<body>

<!-- Navigation -->
<nav>
<div class="nav-container">
    <div class="logo"><i class="fas fa-cash-register"></i> QuickPOS</div>
    <ul class="nav-links">
        <li><a href="#features">Features</a></li>
        <li><a href="#pricing">Pricing</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#" class="btn btn-primary">Sign Up</a></li>
    </ul>
    <button class="mobile-menu-btn"><i class="fas fa-bars"></i></button>
</div>
</nav>
<!-- Hero Section -->
<section class="hero">
<div class="hero-container">
    <h1>The Last POS System You'll Ever Need</h1>
    <p>Streamline your business operations with our powerful tools, easy-to-use point of sale system. Built for modern businesses.</p>
    <div class="hero-cta">
        <a href="#contact" class="btn btn-primary">Get Started For Free</a>
        <a href="#features" class="btn btn-secondary">Learn More</a>
    </div>
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=500&fit=crop" alt="QuickPOS Dashboard">
    </div>
</div>
</section>

<!-- Features Section -->
<section id="features" class="features">
<div class="section-title" data-aos="fade-up">
    <h2>Powerful Features for Your Business</h2>
    <p>Everything you need to manage your business efficiently in one place</p>
</div>
<div class="features-grid">
    <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-icon"><i class="fas fa-boxes"></i></div>
        <h3>Inventory Management</h3>
        <p>Track stock levels in real-time, set automatic reorder points, and never run out of your best-selling products here.</p>
    </div>
    <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
        <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
        <h3>Sales Analytics</h3>
        <p>Get detailed insights into your sales performance with beautiful dashboards and comprehensive reports.</p>
    </div>
    <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
        <div class="feature-icon"><i class="fas fa-plug"></i></div>
        <h3>Easy Integration</h3>
        <p>Connect seamlessly with your existing tools including accounting software, e-commerce platforms, and more.</p>
    </div>
    <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
        <div class="feature-icon"><i class="fas fa-mobile-alt"></i></div>
        <h3>Mobile Ready</h3>
        <p>Accept payments anywhere with our mobile app. Perfect for pop-up shops, events, and delivery services.</p>
    </div>
</div>
</section>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
AOS.init({ duration:1200, once:true });

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if(target) target.scrollIntoView({ behavior:'smooth', block:'start' });
    });
});

const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
const navLinks = document.querySelector('.nav-links');
mobileMenuBtn.addEventListener('click', () => {
    navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
});
</script>
</body>
</html>
