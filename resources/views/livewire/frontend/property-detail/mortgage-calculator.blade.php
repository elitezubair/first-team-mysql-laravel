<div>
    <div class="calculator_section common-space">
        <div class="container common">
            <div class="property-detail-card mort-calc">
                <h2 class="pd-tab-heading border-bottom">Mortgage Calculator</h2>
                <div class="form-wrapper w-form">
                    {{-- <form class="motgage-calc-form"> --}}
                    <div class="calc-results-wrap">
                        <div class="monthly-wrap">
                            <div class="monthly-payment">$<span class="monthly-payment"></span></div>
                            <div>Monthly</div>
                        </div>
                        <div class="results-wrap">
                            <div class="mc-card">
                                <div class="mc-card-descr-wrap">
                                    <div class="color-indicator p-i"><i class="bi bi-circle"></i>
                                    </div>
                                    <div class="mc-desc-text"><strong>Principle &amp;
                                            Interest</strong></div>
                                </div>
                                <div class="mc-desc-text greyed-out  ">$<span class="principle-interest"></span></div>
                            </div>
                            <div class="mc-card">
                                <div class="mc-card-descr-wrap">
                                    <div class="color-indicator prop-tax "><i class="bi bi-circle"></i>
                                    </div>
                                    <div class="mc-desc-text"><strong>Property Tax (monthy)</strong></div>
                                </div>
                                <div class="mc-desc-text greyed-out  ">$<span class="property-tax"></span></div>
                            </div>
                            <div class="mc-card">
                                <div class="mc-card-descr-wrap">
                                    <div class="color-indicator hi"><i class="bi bi-circle"></i>
                                    </div>
                                    <div class="mc-desc-text"><strong>Home Insurance (monthy)</strong></div>
                                </div>
                                <div class="mc-desc-text greyed-out  ">$<span class="home-insurance"></span></div>
                            </div>
                            <div class="mc-card">
                                <div class="mc-card-descr-wrap">
                                    <div class="color-indicator"><i class="bi bi-circle"></i></div>
                                    <div class="mc-desc-text"><strong>PMI</strong></div>
                                </div>
                                <div class="mc-desc-text greyed-out">$1,000.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="calc-input-wrap">
                        <div>
                            <label for="name-5" class="mcalc-field-label">Total Amount</label>
                            <div class="mc-innner-wrap requisite">
                                <label for="house-price" class="mc-sign">$</label>
                                <input type="text" class="mcalc-input w-input" name="house-price"
                                    placeholder="1250000" id="house-price">
                            </div>
                        </div>
                        <div>
                            <label for="name-5" class="mcalc-field-label">Down Payment</label>
                            <div class="mc-innner-wrap requisite">
                                <label for="down-payment" class="mc-sign">%</label>
                                <input type="text" class="mcalc-input w-input" name="down-payment"
                                    placeholder="12.5" id="down-payment" >
                            </div>
                        </div>
                        <div>
                            <label for="name-5" class="mcalc-field-label">Interest Rate</label>
                            <div class="mc-innner-wrap requisite">
                                <label for="interest-rate" class="mc-sign">%</label>
                                <input type="text" class="mcalc-input w-input" name="interest-rate"
                                    placeholder="12.5" id="interest-rate">
                            </div>
                        </div>
                        <div>
                            <label for="name-5" class="mcalc-field-label">Loan Terms
                                (Years)</label>
                            <div class="mc-innner-wrap requisite">
                                <label for="loan-terms" class="mc-sign"><i class="bi bi-calendar2"></i></label>
                                <input type="text" class="mcalc-input w-input" name="loan-terms" placeholder="30"
                                    id="loan-terms" >
                            </div>
                        </div>
                        <div>
                            <label for="name-5" class="mcalc-field-label">Property Tax</label>
                            <div class="mc-innner-wrap requisite">
                                <label for="taxes" class="mc-sign">$</label>
                                <input type="text" class="mcalc-input w-input" name="taxes" placeholder="15000"
                                    id="taxes" >
                            </div>
                        </div>
                        <div>
                            <label for="name-5" class="mcalc-field-label">Home Insurance</label>
                            <div class="mc-innner-wrap requisite">
                                <label for="insurance" class="mc-sign">$</label>
                                <input type="text" class="mcalc-input w-input" name="insurance" placeholder="1400"
                                    id="insurance" >
                            </div>
                        </div>
                        <div>
                            <label for="name-5" class="mcalc-field-label">PMI</label>
                            <div class="mc-innner-wrap requisite">
                                <label for="PMI" class="mc-sign">$</label>
                                <input type="text" class="mcalc-input w-input" name="PMI" placeholder="20000"
                                    id="PMI">
                            </div>
                        </div>
                    </div>
                    {{-- <input type="button" value="Calculate" name="calculate"> --}}
                    <button type="button" class="button mcalc w-button button-2" name="calculate"
                        tabindex="6">Calculate</button>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>

</div>



@push('front_scripts')
    <script>
        $(document).ready(function() {
            // Initiate popovers for '?' buttons next to input labels
            $("[data-toggle='popover']").popover({
                container: "body",
                placement: "auto"
            });

            // Lay out number inputs as Jquery selector to iterate upon for validation
            var inputs = $(
                "input[name=house-price], input[name=interest-rate], input[name=down-payment], input[name=insurance], input[name=taxes], input[name=loan-terms]"
                );

            // Declare input variables for ease of use
            var housePrice = $("input[name=house-price]");
            var interestRate = $("input[name=interest-rate]");
            var years = $("input[name=loan-terms]");
            var downPayment = $("input[name=down-payment]");
            var insurance = $("input[name=insurance]");
            var taxes = $("input[name=taxes]");


            // Booleans for input validation
            var housePriceValid = false;
            var interestRateValid = false;
            var yearsValid = false;
            var downPaymentValid = false;
            var insuranceValid = false;
            var taxesValid = false;

            // Iterate upon inputs, making white when empty.
            $.each(inputs, function() {
                var input = $(this);
                input.keyup(function() {
                    if (!input.val()) {
                        input.closest($("div .requisite")).removeClass("has-error").removeClass(
                            "has-success");
                    }
                });
            });

            // Check if House Price input is greater than 0 on each keyup.
            housePrice.keyup(function() {
                if ($(this).val()) {
                    if (parseFloat($(this).val()) > 0) {
                        $(this).closest($("div .requisite")).removeClass("has-error").addClass(
                            "has-success");
                        housePriceValid = true;
                    } else {
                        $(this).closest($("div .requisite")).removeClass("has-success").addClass(
                            "has-error");
                        housePriceValid = false;
                    }
                }
            });

            // Check if Interest Rate input is greater than 0 and less than 100 on each keyup.
            interestRate.keyup(function() {
                if ($(this).val()) {
                    if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) < 100) {
                        $(this).closest($("div .requisite")).removeClass("has-error").addClass(
                            "has-success");
                        interestRateValid = true;
                    } else {
                        $(this).closest($("div .requisite")).removeClass("has-success").addClass(
                            "has-error");
                        interestRateValid = false;
                    }
                }
            });

            // Check if Down Payment input is >= 0 and < 100 for validation
            years.keyup(function() {
                if ($(this).val()) {
                    if (parseFloat($(this).val()) >= 0 && parseFloat($(this).val()) < 100) {
                        $(this).closest($("div .requisite")).removeClass("has-error").addClass(
                            "has-success");
                        yearsValid = true;
                    } else {
                        $(this).closest($("div .requisite")).removeClass("has-success").addClass(
                            "has-error");
                    }
                }
            });

            // Check if Down Payment input is >= 0 and < 100 for validation
            downPayment.keyup(function() {
                if ($(this).val()) {
                    if (parseFloat($(this).val()) >= 0 && parseFloat($(this).val()) < 100) {
                        $(this).closest($("div .requisite")).removeClass("has-error").addClass(
                            "has-success");
                        downPaymentValid = true;
                    } else {
                        $(this).closest($("div .requisite")).removeClass("has-success").addClass(
                            "has-error");
                    }
                }
            });

            // Make sure no negative number is inputted for insurance dollar amount
            insurance.keyup(function() {
                if ($(this).val()) {
                    if (parseFloat($(this).val()) > 0) {
                        $(this).closest($("div .requisite")).removeClass("has-error").addClass(
                            "has-success");
                        insuranceValid = true;
                    } else {
                        $(this).closest($("div .requisite")).removeClass("has-success").addClass(
                            "has-error");
                    }
                }
            });

            // Make sure no negative number is inputted for taxes dollar amount
            taxes.keyup(function() {
                if ($(this).val()) {
                    if (parseFloat($(this).val()) > 0) {
                        $(this).closest($("div .requisite")).removeClass("has-error").addClass(
                            "has-success");
                        taxesValid = true;
                    } else {
                        $(this).closest($("div .requisite")).removeClass("has-success").addClass(
                            "has-error");
                    }
                }
            });


            // Validate inputs and calculate if all is valid.
            $("button[name=calculate]").click(function() {
                console.log(3);

                $.each(inputs, function() {
                    var input = $(this);
                    if (!input.val()) {
                        input.closest($("div .requisite")).addClass("has-error");
                    }
                });
                if (housePriceValid && interestRateValid && yearsValid && downPaymentValid &&
                    insuranceValid && taxesValid) {
                    calculate();
                    emailHousePrice = $("input[name=house-price]").val();
                    emailInterestRate = $("input[name=interest-rate]").val();
                    emailYears = $("input[name=loan-terms]").val();
                    emailDownPayment = $("input[name=down-payment]").val();
                    emailInsurance = $("input[name=insurance]").val();
                    emailTaxes = $("input[name=taxes]").val();
                    emailInsuranceMonthly = $("input[name=insurance-monthly]").val();
                    emailTaxesMonthly = $("input[name=taxes-monthly]").val();
                    emailFHA = $("input[name=fha]").val();
                    emailVA = $("input[name=va]").val();
                    emailUSDA = $("input[name=usda]").val();
                    emailCONV = $("input[name=conv]").val();
                }
            });

            // Handle all calculations given the values inputted.
            function calculate() {

                function getTotal(principle, payment) {
                    return ((((principle * interestRateM) / (1 - Math.pow(1 + interestRateM, (-1 * months))) *
                        100) / 100) + insuranceMonthly + taxesMonthly + payment);
                }
                var numYears = parseInt(years.val());
                var principle = housePrice.val() - (housePrice.val() * (downPayment.val() / 100));
                var interestRateM = interestRate.val() / (100 * 12);
                var months = numYears * 12;
                var monthlyPayment = ((principle * interestRateM) / (1 - Math.pow(1 + interestRateM, -1 * months)) *
                    100) / 100;
                var insuranceMonthly = insurance.val() / 12;
                var taxesMonthly = taxes.val() / 12;

                // arif code
                $("span[class=principle-interest]").text((monthlyPayment*months).toFixed(2));
                $("span[class=home-insurance]").text(insuranceMonthly.toFixed(2));
                $("span[class=property-tax]").text(taxesMonthly.toFixed(2));
                $("span[class=monthly-payment]").text(monthlyPayment.toFixed(2));


            }

        });
    </script>
@endpush
