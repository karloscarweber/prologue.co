<div class="grater-container">
	<a href="/users/logout" class="button logout">Logout</a>
	<p class="lead">Account </p>
	<p>Hello <?= $user['User']['username']  ?>, You've been supporting Prologue since <?= date('F',$supporting) ?> <?= date('j',$supporting) ?> <?= date('Y',$supporting) ?>. In that time you've accumulated <?= $votes ?> Votes and used <?= $used?> of them.<?php if($isplus){
		echo "You're a <span class=\"prologueBlue\">Plus</span> member, Thanks! You're Awesome!";
	} ?></p>
</div>
<?php if($nocard){ ?>
<div class="grater-container" id="skeuocard-container">
	<h3>Add Credit Card?</h3>
	<p>We never keep your Credit Card information, instead we have <a href="https://stripe.com">Stripe</a> handle all of that stuff. They are super secure. We never Charge your card without your permission either.</p>

	<form>
	<div class="credit-card-input no-js" id="skeuocard">
	  <p class="no-support-warning">Either you have Javascript disabled, or you're using an unsupported browser, amigo! That's why you're seeing this old-school credit card input form instead of a fancy new Skeuocard. On the other hand, at least you know it gracefully degrades...</p>
	  <label for="cc_type">Card Type</label>
	  <select name="cc_type">
	    <option value="">...</option>
	    <option value="visa">Visa</option>
	    <option value="discover">Discover</option>
	    <option value="mastercard">MasterCard</option>
	    <option value="maestro">Maestro</option>
	    <option value="jcb">JCB</option>
	    <option value="unionpay">China UnionPay</option>
	    <option value="amex">American Express</option>
	    <option value="dinersclubintl">Diners Club</option>
	  </select>
	  <label for="cc_number">Card Number</label>
	  <input type="text" name="cc_number" id="cc_number" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" size="19">
	  <label for="cc_exp_month">Expiration Month</label>
	  <input type="text" name="cc_exp_month" id="cc_exp_month" placeholder="00">
	  <label for="cc_exp_year">Expiration Year</label>
	  <input type="text" name="cc_exp_year" id="cc_exp_year" placeholder="00">
	  <label for="cc_name">Cardholder's Name</label>
	  <input type="text" name="cc_name" id="cc_name" placeholder="John Doe">
	  <label for="cc_cvc">Card Validation Code</label>
	  <input type="text" name="cc_cvc" id="cc_cvc" placeholder="123" maxlength="3" size="3">
	</div>
	</form>

	<br><br>
	<a href="#" id="saveSkeuoCard" class="button">Save Card</a>
	
</div>
<div class="grater-container messages"></div>
<script type="text/javascript">
$(document).ready(function(){
	// Activate the skeocard
	card = new Skeuocard($('#skeuocard'));


	Stripe.setPublishableKey('pk_test_HEePwUD8F7fmmQKqGddKcZeH');

	// Credit Card
	$('#saveSkeuoCard').on('click', function(event){

		event.preventDefault();

		Stripe.card.createToken({
		    number: $('#cc_number').val(),
		    cvc: $('#cc_cvc').val(),
		    exp_month: $('#cc_exp_month').val(),
		    exp_year: $('#cc_exp_year').val(),
		    name: $('#cc_name').val(),
		}, stripeResponseHandler);

	});	

	function stripeResponseHandler(status, response) {
	    if (response.error) {
	        // show the errors on the form
	        $(".messages").html('<p>'+response.error.message+'</p>');
	    } else {
	        
	        var token = response['id'];

			var requestURL = "<?php echo $this->Html->url('/users/savenewcard'); ?>";
			$.post(requestURL, token, function(data){

				if(data == 'success'){
					$('.messages').html('<p>Card Saved Successfully.</p>');
					//$('.subscribe').show();
					$('#skeuocard-container').hide();
				} else {
					$('.messages').html(data);	
				}
			},'html');
	    }
	}
});
</script>
<?php } ?>