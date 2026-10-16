<div class="card el-card border-0 shadow-sm mb-4" style="border: 1px solid rgba(220, 38, 38, 0.25) !important;">
    <div class="card-header py-3 border-bottom d-flex align-items-center justify-content-between" style="background-color: rgba(220, 38, 38, 0.04); border-bottom-color: rgba(220, 38, 38, 0.15) !important;">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar-sm rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 38px; height: 38px; background-color: var(--el-danger, #dc2626);">
                <i class="bi bi-exclamation-triangle-fill fs-5"></i>
            </div>
            <div>
                <h5 class="card-title fw-bold mb-0 text-danger" style="font-size: 16px;">Danger Zone</h5>
                <small class="text-danger-emphasis">Irreversible and destructive account actions</small>
            </div>
        </div>
        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2.5 py-1.5 rounded-pill small">
            <i class="bi bi-shield-x me-1"></i> Permanent Action
        </span>
    </div>

    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <h6 class="fw-bold text-dark mb-1">Delete Account Permanently</h6>
                <p class="text-muted small mb-0" style="max-width: 600px;">
                    Once your account is deleted, all of its resources, transactions, savings goals, and history will be permanently wiped out. Please export or backup any essential financial records before proceeding.
                </p>
            </div>

            <button type="button"
                    class="btn btn-outline-danger d-inline-flex align-items-center gap-2 px-3 py-2 flex-shrink-0"
                    style="border-radius: 10px; font-weight: 600;"
                    data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteUserModal">
                <i class="bi bi-trash3"></i>
                <span>Delete Account</span>
            </button>
        </div>
    </div>
</div>

{{-- Bootstrap 5 Delete Confirmation Modal --}}
<div class="modal fade" id="confirmDeleteUserModal" tabindex="-1" aria-labelledby="confirmDeleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
            <div class="modal-header text-white p-3 border-0" style="background-color: var(--el-danger, #dc2626);">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2 fs-6" id="confirmDeleteUserModalLabel">
                    <i class="bi bi-exclamation-octagon-fill"></i>
                    Confirm Account Deletion
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="modal-body p-4">
                    <div class="alert alert-danger d-flex align-items-start gap-2 mb-3" style="border-radius: 10px;">
                        <i class="bi bi-exclamation-triangle-fill fs-5 flex-shrink-0 mt-1"></i>
                        <div class="small">
                            <strong>Warning:</strong> This action cannot be undone. All your personal data and ledger records will be wiped immediately.
                        </div>
                    </div>

                    <p class="text-secondary small mb-3">
                        To confirm this permanent action, please enter your current account password:
                    </p>

                    <div>
                        <label for="delete_account_password" class="form-label fw-semibold text-secondary small mb-1">
                            Current Password <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <i class="bi bi-key"></i>
                            </span>
                            <input type="password"
                                   id="delete_account_password"
                                   name="password"
                                   class="form-control border-start-0 ps-1 @if($errors->userDeletion->has('password')) is-invalid @endif"
                                   placeholder="Enter your password to confirm"
                                   required>
                        </div>
                        @if($errors->userDeletion->has('password'))
                            <div class="text-danger small mt-1">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $errors->userDeletion->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer bg-light px-4 py-3 border-top d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-light border px-3" data-bs-dismiss="modal" style="border-radius: 8px;">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger d-inline-flex align-items-center gap-2 px-3" style="border-radius: 8px; font-weight: 600;">
                        <i class="bi bi-trash3-fill"></i>
                        <span>Yes, Delete My Account</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if ($errors->userDeletion->isNotEmpty())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalEl = document.getElementById('confirmDeleteUserModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                var deleteModal = new bootstrap.Modal(modalEl);
                deleteModal.show();
            }
        });
    </script>
@endif
