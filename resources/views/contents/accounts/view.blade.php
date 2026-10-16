<x-app-layout>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        .account-view-card {
            background: #ffffff;
            border: 1px solid var(--el-border, #d7e3f5);
            border-radius: var(--el-radius, 16px);
            box-shadow: 0 10px 30px rgba(15, 79, 191, 0.06);
            overflow: hidden;
        }

        .account-hero-banner {
            padding: 24px 28px;
            background: linear-gradient(135deg, rgba(15, 79, 191, 0.08) 0%, rgba(37, 99, 235, 0.03) 100%);
            border-bottom: 1px solid var(--el-border, #d7e3f5);
        }

        .bank-badge-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--el-primary, #0f4fbf), #2563eb);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            box-shadow: 0 8px 18px rgba(15, 79, 191, 0.22);
            flex-shrink: 0;
        }

        .account-balance-card {
            background: linear-gradient(135deg, #0b3f99 0%, #1e40af 100%);
            color: #ffffff;
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 10px 24px rgba(11, 63, 153, 0.25);
        }

        .account-info-tile {
            background: #fbfdff;
            border: 1px solid #e8f0fe;
            border-radius: 12px;
            padding: 16px 18px;
            height: 100%;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .account-info-tile:hover {
            border-color: #cbdcf7;
            box-shadow: 0 4px 14px rgba(15, 79, 191, 0.05);
        }

        .account-info-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--el-muted, #64748b);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .account-info-value {
            font-size: 15px;
            font-weight: 700;
            color: var(--el-text, #102a56);
            margin: 0;
            word-break: break-all;
        }

        .copy-btn {
            border: none;
            background: transparent;
            color: var(--el-muted, #64748b);
            padding: 2px 6px;
            border-radius: 6px;
            transition: all 0.15s ease;
            font-size: 13px;
        }

        .copy-btn:hover {
            background: var(--el-primary-soft, #eaf3ff);
            color: var(--el-primary, #0f4fbf);
        }
    </style>

    <div class="row">
        <div class="col-xl-12">

            {{-- Breadcrumb & Title Row with Top Action Buttons --}}
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1 small">
                            <li class="breadcrumb-item"><a href="{{ url('/accounts') }}" class="text-decoration-none">Accounts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Account #{{ $record->id }}</li>
                        </ol>
                    </nav>
                    <h4 class="fw-bold mb-0" style="color: var(--el-text, #102a56); font-size: 22px;">
                        ACCOUNT DETAILS
                    </h4>
                </div>

                {{-- Top Action Toolbar --}}
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <a href="{{ url('/accounts') }}" class="btn btn-light border d-inline-flex align-items-center gap-2 px-3 py-2" style="border-radius: 10px; font-weight: 600; font-size: 13.5px; background: #ffffff; box-shadow: 0 2px 6px rgba(15, 79, 191, 0.04);">
                        <i class="bi bi-arrow-left"></i>
                        <span>Back</span>
                    </a>

                    <a href="{{ url('/accounts_edit/' . $record->id) }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2" style="border-radius: 10px; font-weight: 600; font-size: 13.5px; box-shadow: 0 4px 14px rgba(15, 79, 191, 0.22);">
                        <i class="bi bi-pencil-square"></i>
                        <span>Edit Account</span>
                    </a>

                    <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center gap-2 px-3 py-2" data-bs-toggle="modal" data-bs-target="#deleteAccountModal" style="border-radius: 10px; font-weight: 600; font-size: 13.5px; background: #ffffff;">
                        <i class="bi bi-trash3"></i>
                        <span>Delete</span>
                    </button>
                </div>
            </div>

            {{-- Main Account View Card --}}
            <div class="account-view-card mb-4">

                {{-- Hero Banner --}}
                <div class="account-hero-banner d-flex align-items-center justify-content-between flex-wrap gap-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bank-badge-icon">
                            <i class="bi bi-bank"></i>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                <h3 class="fw-bold mb-0 text-dark">{{ $record->bank_name ?? 'Bank Account' }}</h3>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-pill small">
                                    {{ $record->account_type ?? 'Standard' }}
                                </span>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-pill small">
                                    <i class="bi bi-check-circle me-1"></i> Active
                                </span>
                            </div>
                            <div class="text-muted d-flex align-items-center gap-2 small">
                                <span><i class="bi bi-credit-card me-1"></i> {{ $record->account_number ?? '-' }}</span>
                                <button type="button" class="copy-btn" onclick="copyToClipboard('{{ $record->account_number }}', this)" title="Copy account number">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Highlight Balance Tile --}}
                    <div class="account-balance-card text-end flex-shrink-0">
                        <div class="small opacity-75 text-uppercase fw-semibold mb-1" style="letter-spacing: 0.5px;">Current Balance</div>
                        <div class="fs-3 fw-bold">
                            ₹ {{ isset($record->balance) ? number_format($record->balance, 2, '.', ',') : '0.00' }}
                        </div>
                    </div>
                </div>

                {{-- Detailed Information Grid --}}
                <div class="p-4">
                    <h6 class="fw-bold text-dark text-uppercase small mb-3" style="letter-spacing: 0.5px;">
                        <i class="bi bi-info-circle text-primary me-1"></i> Account Specifications
                    </h6>

                    <div class="row g-3 mb-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="account-info-tile">
                                <div class="account-info-label">
                                    <i class="bi bi-credit-card-2-front text-primary"></i> Account Number
                                </div>
                                <div class="account-info-value">
                                    {{ $record->account_number ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="account-info-tile">
                                <div class="account-info-label">
                                    <i class="bi bi-tag text-primary"></i> Account Type
                                </div>
                                <div class="account-info-value">
                                    {{ $record->account_type ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="account-info-tile">
                                <div class="account-info-label">
                                    <i class="bi bi-building text-primary"></i> Bank Name
                                </div>
                                <div class="account-info-value">
                                    {{ $record->bank_name ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="account-info-tile">
                                <div class="account-info-label">
                                    <i class="bi bi-geo-alt text-primary"></i> Branch
                                </div>
                                <div class="account-info-value">
                                    {{ $record->branch ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="account-info-tile">
                                <div class="account-info-label">
                                    <i class="bi bi-qr-code text-primary"></i> IFSC Code
                                </div>
                                <div class="account-info-value">
                                    <code class="bg-light px-2 py-0.5 rounded text-primary">{{ $record->ifsc_code ?? '-' }}</code>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="account-info-tile">
                                <div class="account-info-label">
                                    <i class="bi bi-cash-stack text-success"></i> Account Balance
                                </div>
                                <div class="account-info-value text-success">
                                    ₹ {{ isset($record->balance) ? number_format($record->balance, 2, '.', ',') : '0.00' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark text-uppercase small mb-3" style="letter-spacing: 0.5px;">
                        <i class="bi bi-clock-history text-primary me-1"></i> Audit Details
                    </h6>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="account-info-tile">
                                <div class="account-info-label">
                                    <i class="bi bi-calendar-plus text-primary"></i> Created At
                                </div>
                                <div class="account-info-value small fw-semibold text-secondary">
                                    {{ isset($record->created_at) ? date('d-m-Y H:i A', strtotime($record->created_at)) : '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="account-info-tile">
                                <div class="account-info-label">
                                    <i class="bi bi-calendar-check text-primary"></i> Last Updated At
                                </div>
                                <div class="account-info-value small fw-semibold text-secondary">
                                    {{ isset($record->updated_at) ? date('d-m-Y H:i A', strtotime($record->updated_at)) : '-' }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                <div class="modal-header bg-danger text-white p-3 border-0">
                    <h5 class="modal-title fw-bold d-flex align-items-center gap-2 fs-6" id="deleteAccountModalLabel">
                        <i class="bi bi-exclamation-octagon-fill"></i>
                        Confirm Account Deletion
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="alert alert-danger d-flex align-items-start gap-2 mb-3" style="border-radius: 10px;">
                        <i class="bi bi-exclamation-triangle-fill fs-5 flex-shrink-0 mt-1"></i>
                        <div class="small">
                            <strong>Warning:</strong> You are about to permanently delete this account:
                            <br><strong>{{ $record->account_number }}</strong> ({{ $record->bank_name }}).
                        </div>
                    </div>

                    <p class="text-secondary small mb-0">
                        This action cannot be undone. Please note that accounts with active transaction histories cannot be removed.
                    </p>
                </div>

                <div class="modal-footer bg-light px-4 py-3 border-top d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-light border px-3" data-bs-dismiss="modal" style="border-radius: 8px;">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger d-inline-flex align-items-center gap-2 px-3" id="confirm_delete_btn" style="border-radius: 8px; font-weight: 600;">
                        <i class="bi bi-trash3-fill"></i>
                        <span>Yes, Delete Account</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        function copyToClipboard(text, btn) {
            if (!text) return;
            navigator.clipboard.writeText(text).then(function() {
                var orig = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-check2 text-success"></i>';
                setTimeout(function() {
                    btn.innerHTML = orig;
                }, 1500);
            });
        }

        $(document).ready(function () {
            $('#confirm_delete_btn').on('click', function () {
                var btn = $(this);
                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1" role="status"></span> Deleting...');

                $.ajax({
                    url: "{{ url('/accounts_delete/' . $record->id) }}",
                    type: "GET",
                    success: function (res) {
                        $('#deleteAccountModal').modal('hide');
                        showToast('success', res.message || 'Account deleted successfully.', 'Success');
                        setTimeout(function () {
                            window.location.href = "{{ url('/accounts') }}";
                        }, 1000);
                    },
                    error: function (xhr) {
                        btn.prop('disabled', false).html('<i class="bi bi-trash3-fill"></i> <span>Yes, Delete Account</span>');
                        $('#deleteAccountModal').modal('hide');
                        console.log(xhr.responseText);
                        var errMsg = xhr.responseJSON?.message || 'Unable to delete account.';
                        showToast('error', errMsg, 'Error');
                    }
                });
            });
        });
    </script>
</x-app-layout>