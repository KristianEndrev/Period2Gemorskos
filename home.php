<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo1.png" alt="logo">
            <h3>Gemorskos</h3>
        </div>
        <a href="log_out.php">Log Out</a>
    </header>
    <section class="hero">
        <div class="hero-text">
            <p>Gemorskos is your digital newsroom hub where editors, journalists and photographers
             work together seamlessly from office or home to create tomorrow’s stories.</p>
        </div>
        <img src="images/hero-image.png" alt="hero-image">
    </section>
    <main>
        <div class="database-data">
            <div class="phpmyadmin"><a href="phpmyadmin">GO TO DATABASE</a></div>
            <div class="phpmyadmin"><a href="table.php">DATA TABLE</a></div>
        </div>
        <div class="title">
            <h1>Latest news</h1>
            <div class="horizontal-line"></div>
        </div>
        <section class="news">
            <div class="news-article">
                <img src="images/AI.png" alt="AI">
                    <div class="topic">
                        <h4>Technology</h4>
                    </div>
                        <div class="news-article-text">
                            <h3>AI Revolution Reshapes Tech Industry</h3>
                            <p>Artificial intelligence continues to transform how businesses operate, 
                               with new breakthroughs announced daily.</p>
                            <div class="time">
                                <img src="images/clock.png" alt="clock">
                                <p>2 hours ago</p>
                            </div>
                        </div>
            </div>
            <div class="news-article">
                <img src="images/stock_market.png" alt="Stock Market">
                    <div class="custom-topic">
                        <h4>Business</h4>
                    </div>
                        <div class="news-article-text">
                            <h3>Stock Markets Reach New Heights</h3>
                            <p>Global stock markets show resilience as investors respond positively
                                 to economic indicators and corporate earnings.</p>
                            <div class="time">
                                <img src="images/clock.png" alt="clock">
                                <p>4 hours ago</p>
                            </div>
                        </div>
            </div>
            <div class="news-article">
                <img src="images/sport.png" alt="sport">
                    <div class="custom-topic">
                        <h4>Sports</h4>
                    </div>
                        <div class="news-article-text">
                            <h3>Championship Finals Set Record Attendance</h3>
                            <p>Fans pack stadiums worldwide as the most anticipated sporting events
                                 of the year unfold with thrilling matches.</p>
                            <div class="time">
                                <img src="images/clock.png" alt="clock">
                                <p>5 hours ago</p>
                            </div>
                        </div>
            </div>
            <div class="news-article">
                <img src="images/politics.png" alt="politics">
                    <div class="custom-topic">
                        <h4>Politics</h4>
                    </div>
                        <div class="news-article-text">
                            <h3>New Legislative Package Unveiled</h3>
                            <p>Government officials announce comprehensive reform package aimed at 
                                addressing key social and economic challenges.</p>
                            <div class="time">
                                <img src="images/clock.png" alt="clock">
                                <p>6 hours ago</p>
                            </div>
                        </div>
            </div>
            <div class="news-article">
                <img src="images/culture.png" alt="culture">
                    <div class="custom-topic">
                        <h4>Culture</h4>
                    </div>
                        <div class="news-article-text">
                            <h3>Museum Exhibits Draw Record Crowds</h3>
                            <p>Cultural institutions report unprecedented visitor numbers as new 
                                exhibitions celebrate art and history.</p>
                            <div class="time">
                                <img src="images/clock.png" alt="clock">
                                <p>8 hours ago</p>
                            </div>
                        </div>
            </div>
            <div class="news-article">
                <img src="images/world.png" alt="world">
                    <div class="custom-topic">
                        <h4>World</h4>
                    </div>
                        <div class="news-article-text">
                            <h3>International Summit Addresses Global Issues</h3>
                            <p>World leaders convene to discuss pressing matters affecting countries across continents and oceans.</p>
                            <div class="time">
                                <img src="images/clock.png" alt="clock">
                                <p>10 hours ago</p>
                            </div>
                        </div>
            </div>
        </section>
    </main>
    <footer>
            <div class="footer-text">
                 <div class="left-footer-text">
                    <h1>Gemorskos</h1>
                    <p>Your trusted source for news and insights from around the world. Delivering 
                        quality journalism since 2025.</p>
                </div>
                <div class="right-footer-text">
                    <h1>Follow us</h1>
                    <div class="social-media">
                        <a href="https://www.instagram.com/" target="_blank"><img src="images/instagram.png" alt="instagram"></a>
                        <a href="https://x.com/" target="_blank"><img src="images/x.png" alt="x"></a>
                        <a href="https://www.facebook.com/?locale=bg_BG" target="_blank"><img src="images/facebook.png" alt="facebook"></a>
                    </div>
                </div>
            </div>
            <div class="footer-horizontal-line"></div>
            <h3>&copy;2026 Gemorskos. All rights reserved.</h3>
        </footer>
</body>
</html>