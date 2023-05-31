@extends('shop.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="image-container" style="cursor: pointer; border-radius: 10px; overflow: hidden;" onclick="changeBorderColor(this)">
                        <img src="/img/applepay.png" alt="Apple Pay" style="border-radius: 10px; width: 100%; height: 100%;">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="image-container" style="cursor: pointer; border-radius: 10px; overflow: hidden;" onclick="changeBorderColor(this)">
                        <img src="/img/gpay.png" alt="Google Pay" style="border-radius: 10px; width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="image-container" style="cursor: pointer; border-radius: 10px; overflow: hidden;" onclick="changeBorderColor(this)">
                        <img src="/img/maestro.png" alt="Maestro" style="border-radius: 10px; width: 100%; height: 100%;">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="image-container" style="cursor: pointer; border-radius: 10px; overflow: hidden;" onclick="changeBorderColor(this)">
                        <img src="/img/mastercard.png" alt="Mastercard" style="border-radius: 10px; width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="image-container" style="cursor: pointer; border-radius: 10px; overflow: hidden;" onclick="changeBorderColor(this)">
                        <img src="/img/paypal.png" alt="PayPal" style="border-radius: 10px; width: 100%; height: 100%;">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="image-container" style="cursor: pointer; border-radius: 10px; overflow: hidden;" onclick="changeBorderColor(this)">
                        <img src="/img/paysafe.png" alt="Paysafe" style="border-radius: 10px; width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="image-container" style="cursor: pointer; border-radius: 10px; overflow: hidden;" onclick="changeBorderColor(this)">
                        <img src="/img/visa.png" alt="Visa" style="border-radius: 10px; width: 100%; height: 100%;">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="image-container" style="cursor: pointer; border-radius: 10px; overflow: hidden;" onclick="changeBorderColor(this)">
                        <img src="/img/blik.jpg" alt="Blik" style="border-radius: 10px; width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div id="margin">
                <form action="{{ route('shop.pay') }}" method="POST" onsubmit="return validatePaymentMethod()">
                    @csrf
                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                        <button type="submit" class="btn btn-success" id="pay-btn" style="flex: 1;">
                            <i class="bi bi-credit-card"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                            </svg>
                            Pay
                        </button>
                        <a href="{{ route('shop.films') }}" class="btn btn-danger" style="flex: 1; margin-left: 10px;">
                            <i class="bi bi-arrow-return-left"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                            </svg>
                            Continue Shopping
                        </a>
                    </div>

                    <br>
                    <h3>Select your address </h3>
                    <br>
                    <select class="form-select" name="address_id">
                        @foreach ($addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->street }}, {{ $address->home_number }},
                                {{ $address->apartment_number }}, {{ $address->city }}</option>
                        @endforeach
                    </select>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function changeBorderColor(element) {
        var imageContainers = document.getElementsByClassName("image-container");
        for (var i = 0; i < imageContainers.length; i++) {
            imageContainers[i].style.boxShadow = "none";
        }
        element.style.boxShadow = "0 2px 20px rgba(255, 0, 0, 0.697)";
    }

    function validatePaymentMethod() {
        var imageContainers = document.getElementsByClassName("image-container");
        var isPaymentMethodSelected = false;

        for (var i = 0; i < imageContainers.length; i++) {
            if (imageContainers[i].style.boxShadow !== "none") {
                isPaymentMethodSelected = true;
                break;
            }
        }

        if (!isPaymentMethodSelected) {
            alert("Please select a payment method.");
            return false;
        }

        return true;
    }

    window.onload = function() {
        var payBtn = document.getElementById("pay-btn");
        payBtn.disabled = true;

        var imageContainers = document.getElementsByClassName("image-container");

        for (var i = 0; i < imageContainers.length; i++) {
            imageContainers[i].addEventListener("click", function() {
                for (var j = 0; j < imageContainers.length; j++) {
                    imageContainers[j].style.boxShadow = "none";
                }
                this.style.boxShadow = "0 2px 20px rgba(255, 0, 0, 0.697)";
                payBtn.disabled = false;
            });
        }
    };
</script>

@endsection
