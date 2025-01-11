<!DOCTYPE html>

<html>

<head>

    <title>Laravel - Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <h1>Laravel - Stripe Payment Gateway Integration Example</h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <h3 class="panel-title">Payment Details</h3>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif
                        <form id="payment-form">
    <div class="form-group">
        <label for="amount">Enter Amount to Pay</label>
        <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter amount in INR" required>
    </div>

    <!-- Payment Element -->
    <div id="payment-element"></div>

    <!-- Error Message Display -->
    <div class="error hide">
        <div class="alert alert-danger">An error occurred. Please try again.</div>
    </div>

    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
</form>



                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    $(document).ready(async function () {
        // Initialize Stripe with your publishable key
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");

        // Create an instance of Elements
        const elements = stripe.elements();

        // Handle form submission
        const form = document.getElementById("payment-form");
        form.addEventListener("submit", async function (event) {
            event.preventDefault();

            // Get the amount entered by the user
            const amountInput = document.getElementById("amount");
            const amount = amountInput.value; // Retrieve the amount from the input field

            if (!amount || amount <= 0) {
                alert("Please enter a valid amount.");
                return;
            }

            // Fetch the Payment Intent client secret from the backend
            const { clientSecret } = await fetch("{{ route('payment.intent') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}", // Include CSRF token for Laravel
                },
                body: JSON.stringify({ amount: amount }), // Pass the amount dynamically
            }).then((response) => response.json());

            // Create a Payment Element
            const paymentElement = elements.create("payment", {
                clientSecret: clientSecret,
                layout: "accordion", // Accordion layout for a cleaner display
            });

            // Mount the Payment Element into the `#payment-element` div
            paymentElement.mount("#payment-element");

            // Disable the submit button to prevent repeated clicks
            const submitButton = document.querySelector("button[type='submit']");
            submitButton.disabled = true;

          

            if (error) {
                // Show error to the user
                const errorElement = document.querySelector(".error .alert-danger");
                errorElement.textContent = error.message;
                document.querySelector(".error").classList.remove("hide");
                submitButton.disabled = false;
            }
        });
    });
</script>
