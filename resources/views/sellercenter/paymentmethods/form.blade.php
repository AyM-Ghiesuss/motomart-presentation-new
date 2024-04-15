{{-- <form method="POST" action="{{ $paypalConfig ? route('payment-methods.update', ['payment_method' => $paypalConfig->id]) : '#' }}">
    @csrf
    <div class="mb-3">
        <label>Environment</label>
        <select name="environment" class="form-control">
            <option value="1" {{ optional($paypalConfig)->sandbox ? 'selected' : '' }}>Test</option>
            <option value="0" {{ optional($paypalConfig)->sandbox ? '' : 'selected' }}>Live</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Client ID</label>
        <input type="text" name="client_id" class="form-control" value="{{ $paypalConfig ? $paypalConfig->client_id : '' }}">
    </div>
    <div class="mb-3">
        <label>Secret Key</label>
        <textarea name="secret_key" class="form-control">{{ $paypalConfig ? $paypalConfig->secret : '' }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> --}}


<form method="POST" action="/sellercenter/payment-methods">
    @csrf
    <div class="mb-3">
        <label>Environment</label>
        <select name="environment" class="form-control">
            <option value="1" {{ optional($paypalConfig)->sandbox ? 'selected' : '' }}>Test</option>
            <option value="0" {{ optional($paypalConfig)->sandbox ? '' : 'selected' }}>Live</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Client ID</label>
        <input type="text" name="client_id" class="form-control" value="{{ $paypalConfig ? $paypalConfig->client_id : '' }}">
    </div>
    <div class="mb-3">
        <label>Secret Key</label>
        <textarea name="secret_key" class="form-control">{{ $paypalConfig ? $paypalConfig->secret : '' }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

