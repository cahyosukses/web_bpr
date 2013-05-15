<div class="socials">
    <div class="socials-inner">
        <h3>Follow us</h3>
        <ul>
            <li><a href="<?php echo get_title('FACEBOOK'); ?>" class="facebook-ico"><span></span>Facebook</a></li>
            <li><a href="<?php echo get_title('TWITTER'); ?>" class="twitter-ico"><span></span>Twitter</a></li>
        </ul>
        <img src="<?php echo base_url(); ?>assets/css/images/lembaga.png" style="margin-left: 200px; margin-top: 2px;">
        <div class="cl">&nbsp;</div>
    </div>
</div>
<div id="footer">			
    <?php if ($class == 'Abouts') {
    ?>
        <div class="footer-cols">
            <div class="col">
                <h2>Kantor Cabang</h2>
                <table style="width: 940px; font-weight:bold; color: #ccc;">
                <?php
                $x = 0;
                $query = mysql_query("SELECT * FROM branches ORDER BY ID");
                while ($row = mysql_fetch_assoc($query)) {
                    $x++;
                ?>
                    <tr>
                        <td width="20"><?php echo $x; ?>.</td>
                        <td width="250"><?php echo $row['name'] ?></td>
                        <td width="350"><?php echo $row['address'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="cl">&nbsp;</div>
    </div>
    <?php } ?>
            <div class="footer-bottom">
                <nav class="footer-nav">
                    <ul>
                        <li class="<?php echo $class == "Home" ? "active" : "" ?>"><a href="<?php echo site_url(); ?>">Beranda</a></li>
                        <li class="<?php echo $class == "Products" ? "active" : "" ?>"><a href="<?php echo site_url('products'); ?>">Produk</a></li>
                        <li class="<?php echo $class == "Abouts" ? "active" : "" ?>"><a href="<?php echo site_url('abouts'); ?>">Tentang Kami</a></li>
                        <li class="<?php echo $class == "Contacts" ? "active" : "" ?>"><a href="<?php echo site_url('contacts'); ?>">Hubungi BPR</a></li>
                        <li class="<?php echo $class == "Simulator" ? "active" : "" ?>"><a href="<?php echo site_url('simulator'); ?>">Simulasi Kredit</a></li>
                        <li class="<?php echo $class == "Pinca" ? "active" : "" ?>"><a href="<?php echo site_url('leader-of-the-month'); ?>">Leader of the month</a></li>
                        <li class="<?php echo $class == "Support" ? "active" : "" ?>"><a href="<?php echo site_url('technical-support'); ?>">Technical Support</a></li>
            </ul>
        </nav>
        <p class="copy">&copy;2013 <?php echo get_title('TITLE'); ?></p>
        <div class="cl">&nbsp;</div>
    </div>
</div>
</div>
<!-- end of container -->	
</div>
<!-- end of shell -->	
</div>
<!-- end of wrapper -->

<!--<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>-->
</body>
</html>