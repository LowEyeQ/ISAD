<html>
<head>
</head>
<body>
    <form method="POST" action="{{ route('payment.payNow') }}">
        @csrf <!-- Add this line for CSRF protection -->
        <script type="text/javascript" src="https://cdn.omise.co/omise.js"
          data-key="{{config('services.omise.public_key')}}"
      data-image="https://cdn.omise.co/assets/dashboard/images/omise-logo.png"
          data-frame-label="Merchant site name"
          data-button-label="Pay now"
          data-submit-label="Submit"
          data-location="no"
          data-amount="10025"
          data-currency="thb"
          data-other-payment-methods="promptpay">
        >
        </script>
        <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
      </form>


<!-- data-key="YOUR_PUBLIC_KEY" -->
</body>
</html>
