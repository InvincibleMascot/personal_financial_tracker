<x-app-layout>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        /* =========================================================
           ACCOUNTS MODULE: Edit Account Page Premium FinTech Styling
        ========================================================= */
        .accounts-form-card {
            background: #ffffff;
            border: 1px solid var(--el-border, #d7e3f5);
            border-radius: var(--el-radius, 16px);
            box-shadow: 0 10px 30px rgba(15, 79, 191, 0.05);
            overflow: hidden;
        }

        .accounts-form-header {
            padding: 20px 26px;
            background: linear-gradient(135deg, rgba(15, 79, 191, 0.06) 0%, rgba(37, 99, 235, 0.02) 100%);
            border-bottom: 1px solid var(--el-border, #d7e3f5);
        }

        .form-header-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0f4fbf 0%, #2563eb 100%);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 6px 16px rgba(15, 79, 191, 0.22);
            flex-shrink: 0;
        }

        .form-section-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--el-text, #102a56);
            letter-spacing: -0.3px;
        }

        .form-section-subtitle {
            font-size: 13px;
            color: #64748b;
            font-weight: 500;
        }

        .form-body-wrap {
            padding: 20px 24px;
        }

        .form-group-tile {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            padding: 16px 20px;
            margin-bottom: 16px;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .form-group-tile:focus-within {
            border-color: #93c5fd;
            box-shadow: 0 4px 18px rgba(15, 79, 191, 0.06);
        }

        .tile-legend {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #64748b;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tile-legend i {
            color: #0f4fbf;
            font-size: 15px;
        }

        .custom-form-label {
            font-size: 12.5px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .custom-form-control {
            height: 44px;
            border-radius: 11px;
            border: 1px solid #cbd5e1;
            font-size: 13.5px;
            font-weight: 600;
            color: #0f172a;
            padding: 9px 14px;
            transition: all 0.15s ease;
            background-color: #ffffff;
        }

        .custom-form-control:focus {
            border-color: #0f4fbf;
            box-shadow: 0 0 0 4px rgba(15, 79, 191, 0.10);
            background-color: #ffffff;
        }

        .input-icon-group {
            position: relative;
        }

        .input-icon-group i.input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 15px;
            pointer-events: none;
            z-index: 3;
        }

        .input-icon-group .custom-form-control {
            padding-left: 38px;
        }

        .currency-prefix-group {
            position: relative;
        }

        .currency-prefix-group .currency-symbol {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #0f4fbf;
            font-weight: 800;
            font-size: 15px;
            pointer-events: none;
            z-index: 3;
        }

        .currency-prefix-group .custom-form-control {
            padding-left: 34px;
            font-weight: 700;
            color: #0f172a;
        }

        .error-text {
            font-size: 12px;
            font-weight: 600;
            color: #dc2626;
            margin-top: 4px;
            display: block;
        }

        /* Select2 Theme Customization */
        .select2-container .select2-selection--single {
            height: 44px !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 11px !important;
            display: flex !important;
            align-items: center !important;
            padding: 0 12px !important;
            background-color: #ffffff !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #0f172a !important;
            font-weight: 600 !important;
            font-size: 13.5px !important;
            padding-left: 0 !important;
            line-height: 44px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px !important;
            right: 12px !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #0f4fbf !important;
            box-shadow: 0 0 0 4px rgba(15, 79, 191, 0.10) !important;
        }


        .btn-cancel {
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #475569;
            font-weight: 700;
            font-size: 13.5px;
            padding: 9px 20px;
            border-radius: 11px;
            transition: all 0.15s ease;
        }

        .btn-cancel:hover {
            background: #f1f5f9;
            color: #1e293b;
            border-color: #94a3b8;
        }

        .btn-save-account {
            background: #0f4fbf;
            border: 1px solid #0f4fbf;
            color: #ffffff;
            font-weight: 700;
            font-size: 13.5px;
            padding: 9px 24px;
            border-radius: 11px;
            box-shadow: 0 4px 14px rgba(15, 79, 191, 0.22);
            transition: all 0.15s ease;
        }

        .btn-save-account:hover {
            background: #0b3f99;
            border-color: #0b3f99;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(15, 79, 191, 0.30);
        }

        .btn-back-link {
            border: 1px solid var(--el-border, #d7e3f5);
            background: #ffffff;
            color: #334155;
            font-weight: 600;
            font-size: 13px;
            padding: 7px 14px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.15s ease;
        }

        .btn-back-link:hover {
            background: var(--el-primary-soft, #eaf3ff);
            color: var(--el-primary, #0f4fbf);
            border-color: #cbdcf7;
        }

        .account-chip-badge {
            background: #eff6ff;
            color: #0f4fbf;
            border: 1px solid #bfdbfe;
            border-radius: 999px;
            padding: 4px 12px;
            font-size: 11.5px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        /* Prevent unnecessary page scrolling on desktop */
        @media (min-width: 992px) {
            html,
            body {
                height: 100%;
                overflow: hidden !important;
            }

            html::-webkit-scrollbar,
            body::-webkit-scrollbar {
                display: none;
            }
        }

        /* Compact form spacing */
        .accounts-form-header {
            padding: 16px 24px;
        }

        .form-body-wrap {
            padding: 16px 24px;
        }

        .form-group-tile {
            padding: 14px 20px;
            margin-bottom: 12px;
        }

        .tile-legend {
            margin-bottom: 12px;
        }
    </style>

    <div class="row">
        <div class="col-xl-12">

            {{-- Top Breadcrumb & Actions --}}
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="font-size: 13px;">
                        <li class="breadcrumb-item"><a href="{{ url('/accounts') }}" class="text-decoration-none fw-semibold text-primary">Accounts</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/accounts_view/' . $record->id) }}" class="text-decoration-none fw-semibold text-primary">Account #{{ $record->id }}</a></li>
                        <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>

            {{-- Main Form Card --}}
            <div class="accounts-form-card mb-2">
                {{-- Card Header --}}
                <div class="accounts-form-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="form-header-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <h4 class="form-section-title mb-0">Edit Account Details</h4>
                                <span class="account-chip-badge">#{{ $record->id }}</span>
                            </div>
                            <div class="form-section-subtitle">
                                Modify banking information, ledger balance, and IFSC routing details
                            </div>
                        </div>
                    </div>

                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1 rounded-pill" style="font-size: 11.5px; font-weight: 700;">
                        <i class="bi bi-shield-check me-1"></i> Verified Account Record
                    </span>
                </div>

                {{-- Card Body / Form --}}
                <div class="form-body-wrap">
                    <form id="accounts_edit_form">
                        @csrf

                        <input type="hidden" name="account_id" id="account_id" value="{{ base64_encode($record->id) }}">

                        <!-- Section 1: Institution & Account Identification -->
                        <div class="form-group-tile">
                            <div class="tile-legend">
                                <i class="bi bi-building"></i>
                                <span>Institution & Account Identity</span>
                            </div>

                            <div class="row g-3">
                                <div class="col-lg-6 col-md-6">
                                    <label class="custom-form-label" for="bank_name">
                                        <span>Bank Name <span class="text-danger">*</span></span>
                                    </label>
                                    <div class="input-icon-group">
                                        <i class="bi bi-bank input-icon"></i>
                                        <input type="text"
                                               name="bank_name"
                                               id="bank_name"
                                               class="form-control custom-form-control"
                                               placeholder="e.g. State Bank of India, HDFC Bank"
                                               maxlength="100"
                                               value="{{ $record->bank_name ?? '' }}"
                                               autocomplete="off">
                                    </div>
                                    <span class="error-text bank_name_error"></span>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <label class="custom-form-label" for="account_number">
                                        <span>Account Number <span class="text-danger">*</span></span>
                                    </label>
                                    <div class="input-icon-group">
                                        <i class="bi bi-credit-card-2-front input-icon"></i>
                                        <input type="text"
                                               name="account_number"
                                               id="account_number"
                                               class="form-control custom-form-control"
                                               placeholder="e.g. 100234567890"
                                               maxlength="100"
                                               value="{{ $record->account_number ?? '' }}"
                                               autocomplete="off">
                                    </div>
                                    <span class="error-text account_number_error"></span>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <label class="custom-form-label" for="account_type_id">
                                        <span>Account Type <span class="text-danger">*</span></span>
                                    </label>
                                    <select name="account_type_id" id="account_type_id" class="form-control select2">
                                        <option value="" disabled>Select Account Type</option>
                                        @foreach($account_type as $type)
                                            <option value="{{ $type->id }}" {{ $record->account_type_id == $type->id ? 'selected' : '' }}>
                                                {{ $type->account_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="error-text account_type_id_error"></span>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <label class="custom-form-label" for="balance">
                                        <span>Current Ledger Balance <span class="text-danger">*</span></span>
                                    </label>
                                    <div class="currency-prefix-group">
                                        <span class="currency-symbol">₹</span>
                                        <input type="number"
                                               name="balance"
                                               id="balance"
                                               class="form-control custom-form-control"
                                               placeholder="0.00"
                                               min="0"
                                               step="0.01"
                                               value="{{ $record->balance ?? '' }}"
                                               autocomplete="off">
                                    </div>
                                    <span class="error-text balance_error"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Branch & Regional Coordinates -->
                        <div class="form-group-tile mb-0">
                            <div class="tile-legend">
                                <i class="bi bi-geo-alt"></i>
                                <span>Branch Details & Routing Codes</span>
                            </div>

                            <div class="row g-3">
                                <div class="col-lg-6 col-md-6">
                                    <label class="custom-form-label" for="branch">
                                        <span>Branch Name / Location <span class="text-danger">*</span></span>
                                    </label>
                                    <div class="input-icon-group">
                                        <i class="bi bi-geo-alt input-icon"></i>
                                        <input type="text"
                                               name="branch"
                                               id="branch"
                                               class="form-control custom-form-control"
                                               placeholder="e.g. Chinmaya Nagar Main Branch"
                                               maxlength="100"
                                               value="{{ $record->branch ?? '' }}"
                                               autocomplete="off">
                                    </div>
                                    <span class="error-text branch_error"></span>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <label class="custom-form-label" for="ifsc_code">
                                        <span>IFSC Code <span class="text-danger">*</span></span>
                                    </label>
                                    <div class="input-icon-group">
                                        <i class="bi bi-upc-scan input-icon"></i>
                                        <input type="text"
                                               name="ifsc_code"
                                               id="ifsc_code"
                                               class="form-control custom-form-control text-uppercase"
                                               placeholder="e.g. SBIN0007990"
                                               maxlength="100"
                                               value="{{ $record->ifsc_code ?? '' }}"
                                               style="letter-spacing: 0.5px; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, monospace;"
                                               autocomplete="off">
                                    </div>
                                    <span class="error-text ifsc_code_error"></span>
                                </div>
                            </div>
                        </div>
                     
                        <div class="d-flex align-items-center justify-content-end gap-2 mt-3 flex-wrap">
                            <a href="{{ url('/accounts_view/' . $record->id) }}" class="btn-cancel text-decoration-none d-inline-flex align-items-center gap-1.5">
                                <i class="bi bi-arrow-left"></i>
                                <span>Cancel</span>
                            </a>
                            <button type="submit" form="accounts_edit_form" id="accounts_submit_btn" class="btn btn-save-account d-inline-flex align-items-center gap-2">
                                <i class="bi bi-check-lg"></i>
                                <span>Update Account</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2({
                width: '100%',
                placeholder: 'Select Account Type',
                allowClear: false
            });

            function clearValidationErrors() {
                $('.error-text').text('');
                $('.form-control').removeClass('is-invalid');
                $('.select2-selection').removeClass('is-invalid').css('border-color', '');
            }

            function showValidationErrors(errors) {
                $.each(errors, function (key, value) {
                    $('.' + key + '_error').text(value[0]);
                    var $input = $('[name="' + key + '"]');
                    $input.addClass('is-invalid');
                    if (key === 'account_type_id') {
                        $input.next('.select2-container').find('.select2-selection').css('border-color', '#dc2626');
                    }
                });
            }

            // Auto uppercase on IFSC input
            $('#ifsc_code').on('input', function () {
                $(this).val($(this).val().toUpperCase());
            });

            $('#accounts_edit_form').on('submit', function (e) {
                e.preventDefault();

                clearValidationErrors();

                var $submitBtn = $('#accounts_submit_btn');
                $submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Updating...');

                $.ajax({
                    url: "{{ route('accounts_submit') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (res) {
                        showToast('success', res.message || 'Account updated successfully.', 'Success');

                        setTimeout(function () {
                            window.location.href = "{{ url('/accounts_view/' . $record->id) }}";
                        }, 900);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);

                        if (xhr.status === 422 && xhr.responseJSON?.errors) {
                            showValidationErrors(xhr.responseJSON.errors);
                        }
                    },
                    complete: function () {
                        $submitBtn.prop('disabled', false).html('<i class="bi bi-check-lg"></i><span>Update Account</span>');
                    }
                });
            });
        });
    </script>
</x-app-layout>