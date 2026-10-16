<div class="card el-card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar-sm bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                <i class="bi bi-person-gear fs-5"></i>
            </div>
            <div>
                <h5 class="card-title fw-bold mb-0 text-dark" style="font-size: 16px;">Personal Information</h5>
                <small class="text-muted">Update your account name and registered email address</small>
            </div>
        </div>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-pill small">
            <i class="bi bi-person-check me-1"></i> Account Details
        </span>
    </div>

    <div class="card-body p-4">
        @if (session('status') === 'profile-updated')
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert" style="border-radius: 12px;">
                <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                <div class="small">
                    <strong>Changes Saved!</strong> Your profile information has been updated successfully.
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="profile_name" class="form-label fw-semibold text-secondary small mb-1">
                        Full Name <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text"
                               id="profile_name"
                               name="name"
                               class="form-control border-start-0 ps-1 @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}"
                               required
                               placeholder="Enter your full name"
                               autocomplete="name">
                    </div>
                    @error('name')
                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="profile_email" class="form-label fw-semibold text-secondary small mb-1">
                        Email Address <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email"
                               id="profile_email"
                               name="email"
                               class="form-control border-start-0 ps-1 @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}"
                               required
                               placeholder="name@example.com"
                               autocomplete="email">
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-3 rounded-3 bg-warning-subtle border border-warning-subtle">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-exclamation-triangle-fill text-warning fs-5"></i>
                            <span class="small text-dark">Your email address is unverified.</span>
                        </div>
                        <button form="send-verification" type="submit" class="btn btn-sm btn-outline-dark" style="border-radius: 8px;">
                            Resend Verification Email
                        </button>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <p class="small text-success fw-semibold mt-2 mb-0">
                            <i class="bi bi-check2-circle me-1"></i> A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif

            <hr class="my-4 text-muted opacity-25">

            <div class="d-flex align-items-center justify-content-end gap-2">
                <button type="submit" class="btn btn-primary d-inline-flex align-items-center gap-2 px-4 py-2" style="border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-check2"></i>
                    <span>Save Changes</span>
                </button>
            </div>
        </form>
    </div>
</div>
