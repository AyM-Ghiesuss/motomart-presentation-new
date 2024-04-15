@extends('layouts.sellercenter')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Paypal</h4>
                </div>
                <div></div>
                <div class="card-body">
                    <div class="border">
                        <p class="list-group-item-text">
                        Add PayPal as a payment method to allow customers to checkout with PayPal. Express Checkout offers the ease of convenience and security of PayPal, can turn more shoppers into buyers. You must have a PayPal business account to activate this payment method. - You must have a PayPal business account.<br><strong>To activate PayPal Express: </strong><br>- You must have a PayPal business account to accept payments.<br>- Create an app to receive API credentials for testing and live transactions.<br>- Go to this link to create your app: <small>https://developer.paypal.com/webapps/developer/applications/myapps</small>
                        </p>
                    </div>
                    {{-- @include('sellercenter.paymentmethods.form') --}}
                    <form method="POST" action="/sellercenter/payment-methods">
                        @csrf
                        <div class="mb-3">
                            <label>Environment</label>
                            <select name="environment" class="form-control">
                                <option value="1" {{ optional($config_paypal)->sandbox ? 'selected' : '' }}>Test</option>
                                <option value="0" {{ optional($config_paypal)->sandbox ? '' : 'selected' }}>Live</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Client ID</label>
                            <input type="text" name="client_id" class="form-control" value="{{ $config_paypal ? $config_paypal->client_id : '' }}">
                        </div>
                        <div class="mb-3">
                            <label>Secret Key</label>
                            <textarea name="secret" class="form-control">{{ $config_paypal ? $config_paypal->secret : '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
