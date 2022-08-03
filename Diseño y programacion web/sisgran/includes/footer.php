    <footer class="footer">
    <div class="footer-redes-sociales">
                <div class="icons">
                    <a href="#"> <i class="fa-brands fa-instagram"></i> </a>
                    <a href="#"> <i class="fa-brands fa-facebook-f"></i> </a>
                </div>
            </div>
        <div class="footer-grid">
            <div class="footer-sisgran">
                <h3 class="footer-title">Sisgran</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, ab.</p>
            </div>
            <div class="footer-sobre-nosotros">
                <h3 class="footer-title">Sobre nosotros</h3>
                <p>Somos una cooperativa uruguaya de huertas ecológicas, dedicadas a llevarte a tu mesa un vegetal completamente natural sin aditivos químicos.</p>
            </div>
            <div class="footer-contacto">
                <h3 class="footer-title">¡Contáctanos!</h3>
                <p>Email: sisgran2022@gmail.com</p>
                <p>Tlf: 2204 5199</p>
                <p>Cel: 093 912 754</p>
            </div>
            <div class="footer-logo">
                <?php 
                
                    if($index){?>
                        <img src="images/LogoColor.png" alt="">
                <?php }else{ ?>
                        <img src="../images/LogoColor.png" alt="">
                <?php    }

                ?>
                
            </div>
        </div>
        <div class="footer-geatech-info">
            <p>Software made by <a target="_blank" href="https://geatech.vercel.app/">GeaTech</a> | Copyright &copy; 2022 </p>
        </div>
    </footer>
</body>
</html>