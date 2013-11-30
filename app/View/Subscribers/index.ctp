<div class="grater-container">
	<a href="/users/logout" class="button logout">Logout</a>
	<p class="lead">Subscribers </p>

<form action="http://localhost/subscribers/new_charge" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_HEePwUD8F7fmmQKqGddKcZeH"
    data-amount="199"
    data-name="Super Powered Pixels"
    data-description="One Month ($1.99)">
  </script>
<input type="hidden" name="stripeAmount" value="1.99"/>
<input type="hidden" name="prologueApp" value="Super Powered Pixels"/>
<input type="hidden" name="redirect" value="http://superpoweredpixels.com/about/#supportheblog"/>
</form>
</div>