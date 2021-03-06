<?php 
include('include/node-check.php');
include('include/header-recap.php');
include('include/menu.php');
?>
<!-- Maintenance Header -->
<?php if ($coinFunctions->config['maintenance'] == '1') { ?>
	<section id="banner">
	<div class="inner">
		<?php if ($adCount>0) { echo $bannerAd[$randomAdNumber]; } ?>
		<br><h3><a href="https://trustaking.com/" target="_blank"><img src="images/logo_transparent.png" alt="trustaking.com" width="150" /></a></h3>
		<h2><a href="https://trustaking.com/" target="_blank">TRUSTAKING.COM</a></h3>
		<p>The trusted home <br> of cold staking</p>
	</div>
	</section>
<?php } else { ?>
<?php if ($coinFunctions->config['payment'] == '1') { ?>
<!-- Payment Header -->
<section id="banner">
	<div class="inner">
		<?php if ($adCount>0) { echo $bannerAd[$randomAdNumber]; } ?>
		<br><h3><a href="https://trustaking.com/" target="_blank"><img src="images/logo_transparent.png" alt="trustaking.com" width="150" /></a></h3>
		<h2><a href="https://trustaking.com/" target="_blank">TRUSTAKING.COM</a></h3>
		<p>The trusted home <br> of cold staking</p>
	</div>
	<p>Choose your <?php echo $coinFunctions->config['ticker'];?> plan</p>
	<a href="#main" class="more scrolly"></a>
	</section>
<!-- Main -->
<article id="main">
	<div class="subscription-plans">
		<div class="plan-box-center">
			<div class="panel panel-plan box-active">
				<div class="panel-heading" style="background-color: #cd7f32; color: white">
					<h4 class="pull-left panel-title text-center">
						Bronze </h4>
				</div>
				<div class="plan-price-box text-info">
					<span class="price">$2</span> / month
				</div>
			<div class="panel-body pt-0">
			<h4 class="text-primary text-teal-800 mb-0">Features</h4>
				<ul class="mt-0 mb-0 text-info top-border-none plans-intro">
					<li>
					Duration: <span class="text-primary">1 month</span>
					</li>
					<li>
						Expiration: <span class="text-primary"><?php echo date("d-M-Y",strtotime("+1 month")) ?></span>
					</li>
					<li>
						Price: <span class="text-primary"><span class="text-warning">$2</span></span>
					</li>
				</ul>
			</div>
			<div class="panel-footer pt-10 pb-10 text-center">
			<form method="post" action="invoice.php" name="bronze" id="bronze">
				<input type="hidden" name="recaptcha_response" id="recaptchaResponse1">
				<input type="hidden" name="action" value="payment">
				<input type="hidden" name="Plan" value="1">
				<input type="submit" class="button primary small fitn" value="Select Plan" />
			</form>
			</div>
		</div>		
	</div>
	<div class="plan-box-center">
		<div class="panel panel-plan box-active">
			<div class="panel-heading" style="background-color: silver; color: white">
				<h4 class="pull-left panel-title text-center">Silver</h4>
			</div>
			<div class="plan-price-box text-info">
				<span class="price">$1.50</span> / month
			</div>
			<div class="panel-body pt-0">
				<h4 class="text-primary text-teal-800 mb-0">Features</h4>
				<ul class="mt-0 mb-0 text-info top-border-none plans-intro">
				<li>
						Duration: <span class="text-primary">6 month</span>
					</li>
					<li>
						Expiration: <span class="text-primary"><?php echo date("d-M-Y",strtotime("+6 months")) ?></span>
					</li>
					<li>
						Price: <span class="text-primary"><span class="text-warning">$9</span></span>
					</li>
				</ul>
			</div>
			<div class="panel-footer pt-10 pb-10 text-center">	
				<form method="post" action="invoice.php" name="silver" id="silver">
					<input type="hidden" name="recaptcha_response" id="recaptchaResponse2">
					<input type="hidden" name="action" value="payment">
					<input type="hidden" name="Plan" value="2">
					<input type="submit" class="button primary small fitn" value="Select Plan" />
				</form>
			</div>
		</div>	
	</div>
	<div class="plan-box-center">
		<div class="panel panel-plan box-active">
			<div class="panel-heading" style="background-color: gold; color: white">
				<h4 class="pull-left panel-title text-center">													
					Gold
				</h4>
			</div>
			<div class="plan-price-box text-info">
				<span class="price">$1</span> / month
			</div>
			<div class="panel-body pt-0">
				<h4 class="text-primary text-teal-800 mb-0">Features</h4>
				<ul class="mt-0 mb-0 text-info top-border-none plans-intro">
					<li>
						Duration: <span class="text-primary">12 month</span>
					</li>
					<li>
						Expiration: <span class="text-primary"><?php echo date("d-M-Y",strtotime("+12 months")) ?></span>
					</li>
					<li>
						Price: <span class="text-primary"><span class="text-warning">$12</span></span>
					</li>
				</ul>
			</div>
	<div class="panel-footer pt-10 pb-10 text-center">	
		<form method="post" action="invoice.php" name="gold" id="gold">
			<input type="hidden" name="recaptcha_response" id="recaptchaResponse3">
			<input type="hidden" name="action" value="payment">
			<input type="hidden" name="Plan" value="3">
			<input type="submit" class="button primary small fitn" value="Select Plan" />
		</form>
	</div>
	</div>   
		</div>
		<div class="plan-box-center">
			<div class="panel panel-plan box-active">
					<div class="panel-heading" style="background-color: #008c6e; color: white">
						<h4 class="pull-left panel-title text-center">													
							Free Trial
						</h4>
					</div>
					<div class="plan-price-box text-info">
						<span class="price">Free</span>	
					</div>
			<div class="panel-body pt-0">
				<h4 class="text-primary text-teal-800 mb-0">Features</h4>
				<ul class="mt-0 mb-0 text-info top-border-none plans-intro">
					<li>
						Duration: <span class="text-primary">1 week</span>
					</li>
					<li>
						Expiration: <span class="text-primary"><?php echo date("d-M-Y",strtotime("+1 week")) ?></span>
					</li>
					<li>
						Price: <span class="text-primary"><span class="text-warning">$0</span></span>
					</li>
				</ul>
			</div>
				<div class="panel-footer pt-10 pb-10 text-center">	
					<form method="post" action="invoice.php" name="free" id="free">
						<input type="hidden" name="recaptcha_response" id="recaptchaResponse4">
						<input type="hidden" name="action" value="payment">
						<input type="hidden" name="Plan" value="0">
						<input type="submit" class="button primary small fitn" value="Select Plan" />
					</form>
				</div>
			</div>
		</div>
	</section>
</article>
<?php } else { ?>
<!-- No Payment Header -->
	<section id="banner">
	<div class="inner">
		<?php if ($adCount>0) { echo $bannerAd[$randomAdNumber]; } ?>
		<br><h3><a href="https://trustaking.com/" target="_blank"><img src="images/logo_transparent.png" alt="trustaking.com" width="150" /></a></h3>
		<h2><a href="https://trustaking.com/" target="_blank">TRUSTAKING.COM</a></h3>
		<p>The trusted home <br> of cold staking</p>
	</div>
		<form method="post" action="invoice.php" name="free" id="free">
			<input type="hidden" name="recaptcha_response" id="recaptchaResponse5">
			<input type="hidden" name="action" value="payment">
			<input type="hidden" name="Plan" value="0">
			<input type="submit" class="button icon fa-shopping-cart" value="Cold Stake Now" />
		</form>
			<br><p>Send us a <a href="https://donations.trustaking.com/">tip</a> to keep the service free of charge.</p>
</section>
<?php }; ?> <!-- End Payment -->
<?php }; ?> <!-- End Maintenance -->

<article id="one">
<!-- One -->
	<section id="one" class="wrapper style1 special">
		<div class="inner">
			<header class="major">
				<h2>Full Node as a Service</h2>
				<p><b>Effortless cold staking with no technical knowledge required</b></p>
				<p>To see how easy it is to get started, please see our how-to guides by visiting this <b><u><a href="how-to.php#trustaking">page</a></b></u>
				<?php if ($coinFunctions->config['payment'] != '1') { ?>
					<p>This service is being provided in parts <b>free of charge</b> as we are trialling a donation/tips based business model. We will rely on these tips and donations as long as possible, giving everyone the opportunity to use cold staking. If you appreciate our service, please donate on a regular basis so that we can keep the service running. Please visit <b><u><a href="https://donations.trustaking.com/">donations.trustaking.com</a></b></u> if you want to help.<p> 
				<?php }; ?>
			</header>
			<ul class="icons major">
				<li><span class="icon fa-diamond major style1"><span class="label">Lorem</span></span></li>
				<li><span class="icon fa-heart-o major style2"><span class="label">Ipsum</span></span></li>
				<li><span class="icon fa-code major style3"><span class="label">Dolor</span></span></li>
			</ul>
		</div>
	</section>
<!-- Two -->
	<section id="two" class="wrapper alt style2">
		<section class="spotlight">
			<div class="image"><img src="images/pic01.jpg" alt="" /></div><div class="content">
				<h2>Cold Staking</h2>
				<p>Cold Staking lets users securely delegate staking powers to “staking nodes” which contain no coins. The purpose of these “staking nodes” is to provide a dedicated resource connected to a blockchain network and stake on behalf of another wallet without being able to spend its coins. In other words, it allows users to stake offline coins.</p>
			</div>
		</section>
		<section class="spotlight">
			<div class="image"><img src="images/pic02.jpg" alt="" /></div><div class="content">
				<h2>Benefits of staking</h2>
				<p>Staking enables coin holders to earn compounding rewards in return for freezing their staked coins so they cannot be otherwise used while they are being staked. Stack those coins!</p>
			</div>
		</section>
		<section class="spotlight">
			<div class="image"><img src="images/pic03.jpg" alt="" /></div><div class="content">
				<h2>Withdraw at anytime<br />
				No Penalties</h2>
				<p>Staked Coins aren't kept on the full node, so you and only you can withdraw your coins back to your wallet at anytime. No fee's or penalties.</p>
			</div>
		</section>
	</section>
<?php include('include/footer.php'); ?>