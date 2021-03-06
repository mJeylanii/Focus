<?php if (!app\core\Application::isGuest()): ?>
    <div class="text-center">
        <div class="alert alert-warning"><h1>You need to login first!</h1> <br>
            <h2>Please login to proceed to checkout</h2>
        </div>
        <p class="lead">Redirecting you to login page...</p>
        <?php echo ' <meta http-equiv="refresh" 
          content="3; url=/login" />' ?>
    </div>
<?php else: ?>
    <div class="container ">
        <main class="">
            <div class="text-center ">
                <img class="d-block mx-auto mb-4" src="images/logo.png" alt="" width="72" height="57">
                <h2>Checkout</h2>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <span class="badge bg-primary rounded-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 id="product_name" class="my-0 "></h6>
                                <small id="product_details" class="text-muted"></small>
                            </div>
                            <span id="product_price" class="text-muted"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLE CODE</small>
                            </div>
                            <span class="text-success">−$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>$20</strong>
                        </li>
                    </ul>

                    <div class="container d-flex justify-content-center">
                        <button onclick="function func(){localStorage.clear()}" class="btn btn-danger">Clear cart
                        </button>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form method="post" action="/checkout" class="needs-validation" novalidate>
                        <div class="col-12">
                            <label for="email" class="form-label">Email <span
                                        class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input name="card_adress" type="text" class="form-control" id="address"
                                   placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="country" class="form-label">Product</label>
                            <select name="product_id" class="form-select" id="country" required>
                                <option value="991">Standard</option>
                                <option value="992">Pro</option>
                                <option value="1001">Extra 40GB</option>
                                <option value="1002">Extra 140GB</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="country" class="form-label">Country</label>
                            <select name="card_country" class="form-select" id="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <hr class="my-4">
                        <h4 class="mb-3">Payment</h4>
                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="payment_type" type="radio" class="form-check-input"
                                       value="credit"
                                       checked
                                       required>
                                <label class="form-check-label" for="credit">Credit card</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="payment_type" type="radio" class="form-check-input"
                                       value="debit"
                                       required>
                                <label class="form-check-label" for="debit">Debit card</label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="payment_type" type="radio" class="form-check-input"
                                       value="paypal"
                                       required>
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                        </div>

                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input name="card_name" type="text" class="form-control" id="cc-name" placeholder=""
                                       required>
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input name="card_num" type="text" class="form-control" id="cc-number" placeholder=""
                                       required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <input name="card_expiry" type="text" class="form-control" id="cc-expiration"
                                       placeholder="" required>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input name="card_cvv" type="text" class="form-control" id="cc-cvv" placeholder=""
                                       required>
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Confirm purchase</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="js/checkout.js"></script>
    <script>
        document.getElementById('product_name').innerText = localStorage.getItem("product_name");
        document.getElementById('product_details').innerText = localStorage.getItem("product_details");
        document.getElementById('product_price').innerText = '$' + localStorage.getItem("product_price");
    </script>

<?php endif; ?>