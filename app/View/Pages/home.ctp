<div id="header" class="clearfix">
	<img class="logo" src="/img/prologue-logo-300.svg">
	<img class="logo-white" src="/img/prologue-logo-300-white.svg">
	<p class="lead">We Design &amp; Develop Beautiful Apps</p>
	<a class="downarrow" href="#"><img src="/img/downarrow.svg"></a>
</div>
<div class="grater-container">

	<h3>Prologue is tiny studio focusing on only one thing: Digital Products. We believe that the right piece of technology for the right person can make the world of difference; That's Why we've been hand crafting our little apps since 2011.</h3>

	<p class="lead">Sometimes we build products for other people as well. If you would like use to work on your next project, just <a href="#contact">ask</a></p>

	<img src="/img/iphone+ipad.svg" style="box-shadow:none;">

	<p>The iPhone changed the way we work and communicate.</p>

	<h3 style="text-align:center">Responsive Websites</h3>

	<img src="/img/browsers+iphone.svg" style="box-shadow:none;">

	<p>I'll post my best ideas on prologue with details, designs, and the number of votes it will take to green light the project. It will be up to you to decide what I build. Think you have a better idea? Send me an email with Your Idea, I'll design it and put it up for voting.</p>

	<h2 id="contact">Want to Get in touch?</h2>
	<p class="lead">Sometimes we take on outside projects when were not busy with our own apps. Tell us about your project.</p>

	<div style="width:300px;margin:0 auto;" class="contactFormContainer">
	<?= $this->Form->create('Contact', array('default' => false, 'action' => 'request','class'=>'contactForm', 'div' => false)); ?>
	
		<?= $this->Form->input('name', array('label' => false, 'placeholder' => 'Name', 'div' => false)) ?>
		<?= $this->Form->input('email', array('label' => false, 'placeholder' => 'Email', 'div' => false)) ?>
		<?= $this->Form->input('message', array('type' => 'textarea', 'label' => false, 'div' => false)) ?>
		<?php $options = array('label' => 'Send', 'style' => 'margin:2rem auto 0rem;display:block;', 'class' => 'button', 'div' => false, 'id' => 'submitButton'); ?>
		<?= $this->form->end($options); ?>
	</div>
	<div class="thanks">
		<h2>Thanks for your interest. We'll be in touch soon.</h2>
	</div>
	<br><br><br><br>
		<p class="lead">Stay Informed about new apps and other News by signing up for our email newsletter.</p>
	<div class="grater newsletter">
		<div>
			<form action="http://prologue.us7.list-manage.com/subscribe/post?u=566b6a939ab109f0181960a6e&amp;id=bce84181ab" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				
			<div class="mc-field-group">
				<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
			</div>
		</div>
		<div>
			<!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup">
			
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" ></div>
			</form>
			</div>
			<!--End mc_embed_signup-->
		</div>
	</div>


</div><!-- End of Grater-container -->