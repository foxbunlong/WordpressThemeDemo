<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline">
                <?php
                if (is_home()) {
                ?>
                    <li>
                        <a href="#home">Home</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                <?php
                } else {
                ?>
                    <li>
                        <a href="<?php echo site_url(); ?>#home">Home</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="<?php echo site_url(); ?>#about">About</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="<?php echo site_url(); ?>#services">Services</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="<?php echo site_url(); ?>#contact">Contact</a>
                    </li>
                <?php
                }
                ?>
                    
                </ul>
                <p class="copyright text-muted small">Bản quyền thuộc về <?php bloginfo('name'); ?></p>
            </div>
            <div class="col-md-4">
                Thiết kế được tạo bởi <a href="http://shaneweng.com/" target="_blank">shaneweng</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>