<style>
    /*footer......................................*/

.footer {
    background: linear-gradient(135deg, #1a202c, #2d3748);
    color: #fff;
    padding: 4rem 0 2rem;
    position: relative;
    overflow: hidden;
}

.footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #3498db, #2ecc71, #f1c40f, #e74c3c);
    animation: rainbow 5s linear infinite;
}

@keyframes rainbow {
    0% { background-position: 0% 50%; }
    100% { background-position: 100% 50%; }
}

.footer-container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.footer-section {
    position: relative;
    z-index: 1;
}

.footer-section h3 {
    color: #3498db;
    font-size: 1.4rem;
    margin-bottom: 1.5rem;
    position: relative;
    display: inline-block;
}

.footer-section h3::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 0;
    height: 2px;
    background-color: #3498db;
    transition: width 0.3s ease;
}

.footer-section:hover h3::after {
    width: 100%;
}

.footer-section p, .footer-section a {
    color: #ecf0f1;
    text-decoration: none;
    transition: all 0.3s ease;
}

.footer-section a:hover {
    color: #3498db;
    transform: translateX(5px);
}

.footer-section ul {
    list-style: none;
}

.footer-section ul li {
    margin-bottom: 0.8rem;
}

.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.social-links .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.social-links .icon:hover {
    background-color: #3498db;
    transform: translateY(-5px);
}
.contact-info li {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.contact-info li i {
    margin-right: 10px;
    color: #3498db;
}

.copyright {
    text-align: center;
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    color: #bdc3c7;
}

@media (max-width: 768px) {
    .footer-container {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
}
</style>

<!-- footer section -->
<footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>esyDo</h3>
                <p>Empowering your work, simplifying your life.</p>
                <div class="social-links">
                    <span class="icon"> <ion-icon name="logo-facebook"></ion-icon></ion-icon></span>
                    <span class="icon"> <ion-icon name="logo-instagram"></ion-icon></ion-icon></span>
                    <span class="icon"> <ion-icon name="mail"></ion-icon></ion-icon></span>
                    <span class="icon"><ion-icon name="logo-linkedin"></ion-icon></ion-icon></span>

                    </div>
            </div>
           
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Our Services</h3>
                <ul>
                    <li><a href="#">Mechanical</a></li> 
                    <li><a href="#">Construction</a></li>
                    <li><a href="#">Carpentry</a></li>
                    <li><a href="#">Plumbing </a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact Us</h3>
                <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i>  294/A colombo street, Sri Lanka</li>
                    <li><i class="fas fa-phone"></i> <a href="tel:+1234567890">+94 - 773454287</a></li>
                    <li><i class="fas fa-envelope"></i> <a href="mailto:info@esydo.com">info@easyDo.com</a></li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2024 easyDo. All rights reserved.</p>
        </div>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Include Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>