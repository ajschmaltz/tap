<form action="/subscribe" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_MhWz3DOaj2FqJTSx1UWt8YS9"
    data-amount="2000"
    data-name="Demo Site"
    data-description="2 widgets ($20.00)"
    data-image="/128x128.png">
  </script>
</form>