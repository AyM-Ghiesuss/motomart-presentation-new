<form method="POST" action="/sellercenter/gcash-payment-methods">
    @csrf
    <div class="mb-3">
        <label>Environment</label>
        <select name="environment" class="form-control">
            <option value="1" {{ optional($gcashConfig)->sandbox ? 'selected' : '' }}>Test</option>
            <option value="0" {{ optional($gcashConfig)->sandbox ? '' : 'selected' }}>Live</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Client ID</label>
        <input type="text" name="client_id" class="form-control" value="{{ $gcashConfig ? $gcashConfig->client_id : '' }}">
    </div>
    <div class="mb-3">
        <label>Secret Key</label>
        <textarea name="secret_key" class="form-control">{{ $gcashConfig ? $gcashConfig->secret : '' }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
