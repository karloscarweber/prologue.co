<div id="header" class="clearfix">
	<img class="logo" src="/img/prologue-logo-300.svg">
	<img class="logo-white" src="/img/prologue-logo-300-white.svg">
	<p class="lead">We Design &amp; Develop Beautiful Apps</p>
	<a class="downarrow" href="#"><img src="/img/downarrow.svg"></a>
</div>
<div class="grater-container">

	<h3>Prologue is a Tiny studio focusing on only one thing: Digital Products.</h3>

	<p class="lead">We believe that the right piece of technology for the right person can make the world of difference; That's Why we've been hand crafting our little apps since 2011. Sometimes we take on outside projects. Tell us about your project.</p>

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