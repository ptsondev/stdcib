<footer id="footer">
	<?php if(is_home()){ ?>
	<div id="footer-info">
		<div class="main-wrapper container">	
			<div class="col-sm-6 col-xs-12">
				<div itemscope itemtype="http://schema.org/Organization">
				  <h2 itemprop="name" class="shake-rotate shake-constant shake-constant--hover">CIBWEB</h2>		
				  <div itemprop="description" class="description">
					Là 1 trong những đơn vị thiết kế website giàu kinh nghiệm, chúng tôi hiểu rõ mối quan tâm của khách hàng với nhu cầu xây dựng thương hiệu của mình trên thị trường online.
				  </div><br /><br />
				  <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="">
					<span class="fa fa-building"></span> Địa chỉ:
					  <span itemprop="streetAddress">158 Điện Biên Phủ</span>
					  <span itemprop="postalCode">Phường 6</span>
					  <span itemprop="addressLocality">Quận 3, TP.HCM</span>					
				  </div>
					<div><span class="fa fa-mobile" style="font-size:36px!important;"></span> Tel:<span itemprop="telephone"> 0908 143 576 </span></div>
					<div style="margin-top:10px;"><span class="fa fa-envelope"></span> E-mail: <span itemprop="email"><a href="mailto:info.cibweb@gmail.com">info.cibweb@gmail.com</a></span></div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<h2>Bạn</h2>
				<?php echo do_shortcode('[contact-form-7 id="88" title="Untitled"]');?>
			</div>
		</div>
	</div>
	<?php } ?>
	
	<div id="working-time">
		<div class="main-wrapper container">	
			<div class="col-sm-3 col-xs-12">
				<h3>Bạn muốn đăng ký?</h3>
				<h3>Bạn cần tư vấn rõ hơn?</h3>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div id="main-hotline">0908 143 576</div>
			</div>
			<div class="col-sm-3 col-xs-12">
				<h3>Các ngày trong tuần</h3>
				<h3>8:00 am => 5:00 pm</h3>
			</div>
		</div>
	</div>
	
	<div id="copy-right">
		© Copyright 2014 by <a href="http://cibweb.com" target="_blank">CIBWEB</a>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>