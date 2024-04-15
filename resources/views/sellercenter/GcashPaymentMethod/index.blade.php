@extends('layouts.sellercenter')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Gcash</h4>
                </div>
                <div></div>
                <div class="card-body">
                    <div class="border">
                        <p class="list-group-item-text">
                        text</small>
                        </p>
                    </div>
                    {{-- @include('sellercenter.paymentmethods.form') --}}
                    <form method="POST" action="/sellercenter/gcash-payment-methods">
                        @csrf
                        <div class="mb-3">
                            <label>Environment</label>
                            <select name="environment" class="form-control">
                                <option value="1" {{ optional($config_gcash)->sandbox ? 'selected' : '' }}>Test</option>
                                <option value="0" {{ optional($config_gcash)->sandbox ? '' : 'selected' }}>Live</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Client ID</label>
                            <input type="text" name="client_id" class="form-control" value="{{ $config_gcash ? $config_gcash->client_id : '' }}">
                        </div>
                        <div class="mb-3">
                            <label>Secret Key</label>
                            <textarea name="secret" class="form-control">{{ $config_gcash ? $config_gcash->secret : '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
