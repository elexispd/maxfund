@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('user.kyc.store') }}" method="POST" enctype="multipart/form-data"  id="kycForm">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="document_type">Document Type</label>
                <select class="form-control @error('document_type') is-invalid @enderror"
                        id="document_type" name="document_type" required>
                    <option value="">Select Document Type</option>
                    <option value="nin" {{ old('document_type', optional($latestKyc)->document_type) == 'nin' ? 'selected' : '' }}>National ID (NIN)</option>
                    <option value="driver_license" {{ old('document_type', optional($latestKyc)->document_type) == 'driver_license' ? 'selected' : '' }}>Driver's License</option>
                    <option value="passport" {{ old('document_type', optional($latestKyc)->document_type) == 'passport' ? 'selected' : '' }}>Passport</option>
                </select>
                @error('document_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="id_number">ID Number</label>
                <input type="text" class="form-control @error('id_number') is-invalid @enderror"
                       id="id_number" name="id_number"
                       value="{{ old('id_number', optional($latestKyc)->id_number) }}" required>
                @error('id_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="document_front">Document Front</label>
                <input type="file" class="form-control-file @error('document_front') is-invalid @enderror"
                       id="document_front" name="document_front" accept="image/jpeg,image/png" required>
                @error('document_front')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">
                    Upload a clear image of the front of your document (JPEG or PNG, max 2MB)
                </small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="document_back">Document Back (if applicable)</label>
                <input type="file" class="form-control-file @error('document_back') is-invalid @enderror"
                       id="document_back" name="document_back" accept="image/jpeg,image/png">
                @error('document_back')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">
                    For documents with information on both sides (like driver's license)
                </small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input type="date" class="form-control @error('dob') is-invalid @enderror"
                       id="dob" name="dob"
                       value="{{ old('dob', $user->dob) }}" required>
                @error('dob')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="state">State/Province</label>
                <input type="text" class="form-control @error('state') is-invalid @enderror"
                       id="state" name="state"
                       value="{{ old('state', $user->state) }}" required>
                @error('state')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="zip">ZIP/Postal Code</label>
                <input type="text" class="form-control @error('zip') is-invalid @enderror"
                       id="zip" name="zip"
                       value="{{ old('zip', $user->zip) }}" required>
                @error('zip')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            Submit KYC Information
        </button>
    </div>
</form>
