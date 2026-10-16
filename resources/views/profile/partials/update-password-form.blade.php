<div class="card el-card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar-sm bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                <i class="bi bi-shield-lock fs-5"></i>
            </div>
            <div>
                <h5 class="card-title fw-bold mb-0 text-dark" style="font-size: 16px;">Security & Password</h5>
                <small class="text-muted">Ensure your account is protected with a strong, random password</small>
            </div>
        </div>
        <span class="badge bg-light text-secondary border px-2.5 py-1.5 rounded-pill small">
            <i class="bi bi-lock me-1"></i> Authentication
        </span>
    </div>

    <div class="card-body p-4">
        @if (session('status') === 'password-updated')
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert" style="border-radius: 12px;">
                <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                <div class="small">
                    <strong>Password Updated!</strong> Your account password has been changed successfully.
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="row g-3">
                <div class="col-12">
                    <label for="update_password_current_password" class="form-label fw-semibold text-secondary small mb-1">
                        Current Password <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bi bi-key"></i>
                        </span>
                        <input type="password"
                               id="update_password_current_password"
                               name="current_password"
                               class="form-control border-start-0 border-end-0 ps-1 @if($errors->updatePassword->has('current_password')) is-invalid @endif"
                               placeholder="Enter your current password"
                               autocomplete="current-password"
                               required>
                        <button class="btn btn-outline-secondary toggle-password-btn" type="button" data-target="update_password_current_password" title="Show/Hide Password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @if($errors->updatePassword->has('current_password'))
                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->updatePassword->first('current_password') }}</div>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="update_password_password" class="form-label fw-semibold text-secondary small mb-1">
                        New Password <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password"
                               id="update_password_password"
                               name="password"
                               class="form-control border-start-0 border-end-0 ps-1 @if($errors->updatePassword->has('password')) is-invalid @endif"
                               placeholder="Minimum 8 characters"
                               autocomplete="new-password"
                               required>
                        <button class="btn btn-outline-secondary toggle-password-btn" type="button" data-target="update_password_password" title="Show/Hide Password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @if($errors->updatePassword->has('password'))
                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->updatePassword->first('password') }}</div>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="update_password_password_confirmation" class="form-label fw-semibold text-secondary small mb-1">
                        Confirm New Password <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bi bi-check2-circle"></i>
                        </span>
                        <input type="password"
                               id="update_password_password_confirmation"
                               name="password_confirmation"
                               class="form-control border-start-0 border-end-0 ps-1 @if($errors->updatePassword->has('password_confirmation')) is-invalid @endif"
                               placeholder="Re-enter new password"
                               autocomplete="new-password"
                               required>
                        <button class="btn btn-outline-secondary toggle-password-btn" type="button" data-target="update_password_password_confirmation" title="Show/Hide Password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @if($errors->updatePassword->has('password_confirmation'))
                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->updatePassword->first('password_confirmation') }}</div>
                    @endif
                </div>
            </div>

            <div class="mt-3 p-3 rounded-3 bg-light border">
                <div class="d-flex align-items-center gap-2 small text-muted">
                    <i class="bi bi-info-circle text-primary"></i>
                    <span>Password should contain at least 8 characters, combining uppercase, lowercase, numbers, and symbols.</span>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="d-flex align-items-center justify-content-end gap-2">
                <button type="submit" class="btn btn-primary d-inline-flex align-items-center gap-2 px-4 py-2" style="border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-shield-check"></i>
                    <span>Update Password</span>
                </button>
            </div>
        </form>
    </div>
</div>
