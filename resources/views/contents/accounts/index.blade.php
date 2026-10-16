<x-app-layout>
    <link href="{{ asset('assets/css/dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dataTable.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        /* =========================================================
           ACCOUNTS PAGE: Ultra-Premium FinTech Theme Scoped Styles
           Restoring the beloved previous card UI with bold typography
        ========================================================= */

        /* ---------------------------------------------------------
           1. Header Card (Balanced, No Free Space)
        --------------------------------------------------------- */
        .accounts-header-card {
            background: #ffffff;
            border: 1px solid var(--el-border, #d7e3f5);
            border-radius: var(--el-radius, 16px);
            box-shadow: 0 8px 24px rgba(15, 79, 191, 0.05);
            padding: 18px 24px;
            margin-bottom: 22px;
        }

        .accounts-header-title {
            font-size: 23px;
            font-weight: 800;
            color: var(--el-text, #102a56);
            letter-spacing: -0.3px;
            line-height: 1.2;
        }

        .accounts-header-subtitle {
            font-size: 13.5px;
            color: #64748b;
            font-weight: 500;
        }

        .accounts-status-badge {
            background: #f0fdf4 !important;
            color: #15803d !important;
            border: 1px solid #bbf7d0 !important;
            border-radius: 999px;
            padding: 5px 12px;
            font-size: 11.5px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-pulse-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #16a34a;
            display: inline-block;
            box-shadow: 0 0 0 0 rgba(22, 163, 74, 0.7);
            animation: pulseGreenDot 2s infinite;
        }

        @keyframes pulseGreenDot {
            0% { box-shadow: 0 0 0 0 rgba(22, 163, 74, 0.7); }
            70% { box-shadow: 0 0 0 6px rgba(22, 163, 74, 0); }
            100% { box-shadow: 0 0 0 0 rgba(22, 163, 74, 0); }
        }

        .accounts-header-net-pill {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 9px 18px;
        }

        .header-net-label {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #475569;
        }

        .header-net-value {
            font-size: 21px;
            font-weight: 800;
            color: #0f172a;
            white-space: nowrap !important;
            letter-spacing: -0.3px;
        }

        /* ---------------------------------------------------------
           2. Symmetrical 4-Card Summary Grid (Previous Beloved UI)
        --------------------------------------------------------- */
        .accounts-summary-row {
            margin-bottom: 22px;
        }

        .summary-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            padding: 20px 22px;
            min-height: 126px;
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.95);
            box-shadow: 0 10px 28px rgba(15, 23, 42, 0.05);
            display: flex;
            align-items: center;
            gap: 16px;
            transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
            height: 100%;
        }

        .summary-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 38px rgba(15, 79, 191, 0.10);
            border-color: #cbdcf7;
        }

        .summary-card::before {
            content: "";
            position: absolute;
            right: -25px;
            top: -25px;
            width: 105px;
            height: 105px;
            border-radius: 50%;
            opacity: 0.12;
            pointer-events: none;
        }

        .summary-icon {
            width: 50px;
            height: 50px;
            min-width: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff !important;
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.15);
            flex-shrink: 0;
        }

        .summary-icon i {
            color: #ffffff !important;
            font-size: 23px;
            line-height: 1;
        }

        .summary-content {
            position: relative;
            z-index: 2;
            min-width: 0;
            flex: 1;
        }

        .summary-label {
            font-size: 12.5px;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Strict single line for currency and amount with increased font size */
        .summary-value {
            font-size: 27px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.15;
            margin-bottom: 4px;
            white-space: nowrap !important;
            display: inline-flex;
            align-items: baseline;
            gap: 3px;
            letter-spacing: -0.4px;
        }

        .summary-sub {
            font-size: 12px;
            color: #94a3b8;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Vibrant Icon & Aura Themes */
        .summary-card-bank .summary-icon {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
        }
        .summary-card-bank::before {
            background: #2563eb;
        }

        .summary-card-available .summary-icon {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
        }
        .summary-card-available::before {
            background: #7c3aed;
        }

        .summary-card-cash .summary-icon {
            background: linear-gradient(135deg, #10b981, #059669);
        }
        .summary-card-cash::before {
            background: #10b981;
        }

        .summary-card-spent .summary-icon {
            background: linear-gradient(135deg, #0284c7, #0369a1);
        }
        .summary-card-spent::before {
            background: #0284c7;
        }

        /* ---------------------------------------------------------
           3. Accounts Table Card: Seamless Header Connection
        --------------------------------------------------------- */
        .accounts-table-card {
            border: 1px solid var(--el-border, #d7e3f5) !important;
            border-radius: 16px !important;
            background: #ffffff !important;
            box-shadow: 0 4px 20px rgba(15, 79, 191, 0.04) !important;
            overflow: hidden !important;
        }

        /* Table Toolbar */
        .accounts-table-toolbar {
            background: #ffffff;
            border-bottom: 1px solid #edf2f7 !important;
            padding: 16px 22px;
        }

        .table-toolbar-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: #eff6ff;
            color: var(--el-primary, #0f4fbf);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .table-toolbar-title {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.2px;
        }

        .table-toolbar-count-badge {
            font-size: 11.5px;
            font-weight: 700;
            border-radius: 6px;
            padding: 4px 9px;
            background: #eff6ff !important;
            color: var(--el-primary, #0f4fbf) !important;
            border: 1px solid #bfdbfe !important;
        }

        .accounts-add-btn {
            border-radius: 10px;
            font-weight: 700;
            font-size: 13.5px;
            padding: 8px 18px;
            box-shadow: 0 4px 14px rgba(15, 79, 191, 0.18);
            transition: all 0.15s ease;
        }

        .accounts-add-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(15, 79, 191, 0.25);
        }

        /* Table Wrapper & Zero Gap - Theme Scrollbars */
        .accounts-table-wrap {
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            overflow-x: auto;
            overflow-y: hidden;
            scrollbar-width: thin;
            scrollbar-color: rgba(15, 79, 191, 0.35) transparent;
            -webkit-overflow-scrolling: touch;
        }

        .accounts-table-wrap::-webkit-scrollbar {
            height: 6px;
            width: 6px;
        }

        .accounts-table-wrap::-webkit-scrollbar-track {
            background: transparent;
        }

        .accounts-table-wrap::-webkit-scrollbar-thumb {
            background: rgba(15, 79, 191, 0.28);
            border-radius: 999px;
            border: 1px solid transparent;
            background-clip: padding-box;
            transition: background 0.15s ease;
        }

        .accounts-table-wrap::-webkit-scrollbar-thumb:hover {
            background: var(--el-primary, #0f4fbf);
            background-clip: padding-box;
        }

        #accounts_table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin: 0 !important;
            border-top: none !important;
            border-bottom: none !important;
            table-layout: auto !important;
        }

        #accounts_table thead {
            border-top: none !important;
        }

        #accounts_table thead th {
            background: #f8fafc !important;
            color: #475569 !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.6px !important;
            padding: 12px 14px !important;
            border-top: none !important;
            border-bottom: 1px solid #edf2f7 !important;
            white-space: nowrap !important;
            vertical-align: middle !important;
        }

        #accounts_table thead th:first-child {
            padding-left: 20px !important;
        }

        #accounts_table thead th:last-child {
            padding-right: 20px !important;
        }

        #accounts_table tbody td {
            padding: 13px 14px !important;
            vertical-align: middle !important;
            font-size: 13px !important;
            border-bottom: 1px solid #f1f5f9 !important;
            color: #1e293b !important;
            background: #ffffff;
            transition: background-color 0.15s ease;
        }

        #accounts_table tbody td:first-child {
            padding-left: 20px !important;
        }

        #accounts_table tbody td:last-child {
            padding-right: 20px !important;
        }

        #accounts_table tbody tr {
            cursor: pointer !important;
            transition: all 0.15s ease;
        }

        #accounts_table tbody tr:hover td {
            background-color: #f8fbff !important;
        }

        #accounts_table tbody tr:hover td:first-child {
            box-shadow: inset 3px 0 0 var(--el-primary, #0f4fbf);
        }

        #accounts_table tbody tr:last-child td {
            border-bottom: none !important;
        }

        /* ---------------------------------------------------------
           4. Refined Cell Components
        --------------------------------------------------------- */
        .acc-id-chip {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 3px 9px;
            border-radius: 999px;
            background-color: #eff6ff;
            color: var(--el-primary, #0f4fbf);
            border: 1px solid #bfdbfe;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.3px;
            transition: all 0.15s ease;
        }

        #accounts_table tbody tr:hover .acc-id-chip {
            background-color: var(--el-primary, #0f4fbf);
            color: #ffffff;
            border-color: var(--el-primary, #0f4fbf);
            box-shadow: 0 2px 8px rgba(15, 79, 191, 0.25);
        }

        .acc-number-text {
            font-weight: 700;
            color: #0f172a;
            font-size: 13px;
            transition: color 0.15s ease;
        }

        #accounts_table tbody tr:hover .acc-number-text {
            color: var(--el-primary, #0f4fbf);
            text-decoration: underline !important;
        }

        .acc-type-pill {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 999px;
            background: #f8fafc;
            color: #475569;
            border: 1px solid #e2e8f0;
            font-size: 11.5px;
            font-weight: 600;
        }

        .acc-type-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #10b981;
            display: inline-block;
        }

        .ifsc-code-badge {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-size: 11px;
            font-weight: 600;
            color: #334155;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            padding: 3px 7px;
            border-radius: 6px;
            letter-spacing: 0.4px;
        }

        .acc-balance-badge {
            font-weight: 800;
            font-size: 13.5px;
            color: #0f172a;
            letter-spacing: -0.2px;
            white-space: nowrap !important;
        }

        /* ---------------------------------------------------------
           5. Modern Pagination Controls
        --------------------------------------------------------- */
        .accounts-table-footer {
            background: #ffffff;
            padding: 14px 22px !important;
            border-top: 1px solid #edf2f7 !important;
        }

        .accounts-table-card .dataTables_info {
            color: #64748b !important;
            font-size: 12.5px !important;
            font-weight: 500 !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .accounts-table-card .dataTables_info b,
        .accounts-table-card .dataTables_info strong {
            color: #0f172a !important;
            font-weight: 700 !important;
        }

        .accounts-table-card .dataTables_paginate {
            margin: 0 !important;
            padding: 0 !important;
        }

        .accounts-table-card .dataTables_paginate .pagination {
            margin: 0 !important;
            padding: 0 !important;
            display: flex !important;
            align-items: center !important;
            gap: 5px !important;
            list-style: none !important;
        }

        .accounts-table-card .dataTables_wrapper .dataTables_paginate .paginate_button,
        .accounts-table-card .dataTables_paginate .paginate_button {
            border: none !important;
            background: none !important;
            padding: 0 !important;
            margin: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            display: inline-flex !important;
        }

        .accounts-table-card .pagination .page-item .page-link {
            border: 1px solid #e2e8f0 !important;
            background-color: #ffffff !important;
            color: #334155 !important;
            border-radius: 8px !important;
            padding: 6px 12px !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            min-width: 34px !important;
            height: 34px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04) !important;
            transition: all 0.15s ease !important;
            text-decoration: none !important;
            outline: none !important;
        }

        .accounts-table-card .pagination .page-item .page-link:hover {
            background-color: var(--el-primary-soft, #eaf3ff) !important;
            border-color: #cbdcf7 !important;
            color: var(--el-primary, #0f4fbf) !important;
            transform: translateY(-1px);
        }

        .accounts-table-card .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--el-primary, #0f4fbf) 0%, #2563eb 100%) !important;
            border-color: var(--el-primary, #0f4fbf) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 10px rgba(15, 79, 191, 0.25) !important;
            font-weight: 700 !important;
        }

        .accounts-table-card .pagination .page-item.disabled .page-link {
            background-color: #f8fafc !important;
            border-color: #edf2f7 !important;
            color: #94a3b8 !important;
            opacity: 0.65 !important;
            cursor: not-allowed !important;
            transform: none !important;
            box-shadow: none !important;
        }

        /* =========================================================
           6. Ultra-Modern Mobile FinTech Card Layout (< 768px)
           Replaces horizontal table scrolling with sleek native cards
        ========================================================== */
        @media (max-width: 767.98px) {
            /* Hide desktop table header */
            .dataTables_scrollHead,
            #accounts_table thead {
                display: none !important;
            }

            /* Container & wrapper adjustments */
            .accounts-table-card {
                padding: 16px 12px !important;
                border-radius: 16px !important;
            }

            .accounts-table-toolbar {
                margin-bottom: 14px !important;
                padding-bottom: 12px !important;
                border-bottom: 1px solid #f1f5f9;
            }

            /* Eliminate table horizontal scrollbar on mobile */
            .accounts-table-wrap,
            .dataTables_scrollBody {
                overflow-x: hidden !important;
                width: 100% !important;
                border: none !important;
                padding: 0 !important;
            }

            /* Table and tbody behave as card container */
            #accounts_table {
                display: block !important;
                width: 100% !important;
                border-collapse: separate !important;
                border: none !important;
                margin: 0 !important;
            }

            #accounts_table tbody {
                display: flex !important;
                flex-direction: column !important;
                gap: 12px !important;
                width: 100% !important;
            }

            /* Each table row is a full-width block */
            #accounts_table tbody tr {
                display: block !important;
                width: 100% !important;
                background: transparent !important;
                border: none !important;
                padding: 0 !important;
                margin: 0 !important;
                box-shadow: none !important;
            }

            #accounts_table tbody tr:hover td {
                background-color: transparent !important;
            }

            #accounts_table tbody tr:hover td:first-child {
                box-shadow: none !important;
            }

            /* First cell occupies 100% width and contains the mobile card */
            #accounts_table tbody td:first-child {
                display: block !important;
                width: 100% !important;
                padding: 0 !important;
                border: none !important;
                background: transparent !important;
            }

            /* Hide all other columns on mobile */
            #accounts_table tbody td:not(:first-child) {
                display: none !important;
            }

            /* Empty state full width */
            #accounts_table tbody td.dataTables_empty {
                display: block !important;
                width: 100% !important;
                background: #ffffff !important;
                border-radius: 14px !important;
                border: 1px dashed #cbd5e1 !important;
                padding: 24px 16px !important;
            }

            /* -----------------------------------------------------
               Mobile Card Design
            ----------------------------------------------------- */
            .mobile-account-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 14px;
                padding: 14px;
                box-shadow: 0 2px 8px rgba(15, 79, 191, 0.04), 0 1px 2px rgba(0, 0, 0, 0.02);
                transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease;
                position: relative;
                overflow: hidden;
            }

            .mobile-account-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 4px;
                height: 100%;
                background: linear-gradient(180deg, var(--el-primary, #0f4fbf) 0%, #3b82f6 100%);
                border-radius: 4px 0 0 4px;
            }

            #accounts_table tbody tr:active .mobile-account-card {
                transform: scale(0.99);
                background-color: #f8fbff;
                border-color: #bfdbfe;
            }

            /* Top Section: Avatar, Bank Name, Number, Pills */
            .mobile-card-top {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 8px;
                margin-bottom: 12px;
            }

            .mobile-bank-identity {
                display: flex;
                align-items: center;
                gap: 10px;
                min-width: 0;
            }

            .mobile-bank-avatar {
                width: 38px;
                height: 38px;
                border-radius: 10px;
                background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
                color: var(--el-primary, #0f4fbf);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 17px;
                flex-shrink: 0;
                border: 1px solid #bfdbfe;
            }

            .mobile-bank-details {
                min-width: 0;
            }

            .mobile-bank-name {
                font-weight: 700;
                font-size: 14px;
                color: #0f172a;
                line-height: 1.25;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .mobile-acc-number {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
                font-size: 11.5px;
                font-weight: 600;
                color: #64748b;
                letter-spacing: 0.3px;
                margin-top: 2px;
            }

            .mobile-card-pills {
                display: flex;
                align-items: center;
                gap: 6px;
                flex-shrink: 0;
            }

            .mobile-card-pills .acc-id-chip {
                padding: 2px 7px;
                font-size: 10.5px;
            }

            .mobile-card-pills .acc-type-pill {
                padding: 2px 8px;
                font-size: 11px;
            }

            /* Middle Section: Balance */
            .mobile-card-balance-box {
                background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
                border: 1px solid #e2e8f0;
                border-radius: 10px;
                padding: 10px 12px;
                margin-bottom: 12px;
            }

            .mobile-balance-meta {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 8px;
            }

            .mobile-balance-label {
                font-size: 11px;
                font-weight: 600;
                color: #64748b;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .mobile-balance-value {
                font-size: 16px;
                font-weight: 800;
                color: #0f172a;
                letter-spacing: -0.3px;
            }

            /* Bottom Section: Branch, IFSC, Chevron */
            .mobile-card-bottom {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 8px;
            }

            .mobile-meta-tag {
                display: flex;
                align-items: center;
                gap: 5px;
                font-size: 11.5px;
                color: #64748b;
                min-width: 0;
            }

            .mobile-meta-tag i {
                font-size: 12px;
                color: #94a3b8;
                flex-shrink: 0;
            }

            .mobile-meta-tag span {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 140px;
            }

            .mobile-meta-right {
                display: flex;
                align-items: center;
                gap: 8px;
                flex-shrink: 0;
            }

            .mobile-meta-right .ifsc-code-badge {
                font-size: 10.5px;
                padding: 2px 6px;
            }

            .mobile-arrow-btn {
                width: 24px;
                height: 24px;
                border-radius: 50%;
                background: #eff6ff;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--el-primary, #0f4fbf);
                font-size: 12px;
                border: 1px solid #bfdbfe;
                transition: all 0.15s ease;
            }

            /* Footer & Pagination adjustments */
            .accounts-table-footer {
                flex-direction: column !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 12px !important;
                padding: 16px 4px 4px 4px !important;
            }

            .accounts-table-footer .dataTables_info {
                text-align: center !important;
                font-size: 12px !important;
            }

            .accounts-table-footer .dataTables_paginate {
                display: flex !important;
                justify-content: center !important;
                width: 100% !important;
            }
        }
    </style>

    <div class="row">
        <div class="col-xl-12">

            {{-- 1. Balanced Header Card (No Free Space) --}}
            <div class="accounts-header-card d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="avatar-sm bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-wallet2 fs-5"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h4 class="accounts-header-title mb-0">ACCOUNTS</h4>
                            <span class="badge accounts-status-badge">
                                <span class="status-pulse-dot"></span>
                                <span>{{ number_format($accountsCount) }} Active Accounts</span>
                            </span>
                        </div>
                        <div class="accounts-header-subtitle">
                            Real-time tracking of linked banks, IFSC codes, branches, and ledger balances
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3 ms-auto">
                    <div class="accounts-header-net-pill d-none d-sm-flex align-items-center gap-3">
                        <div class="text-end">
                            <div class="header-net-label">Total Vault Balance</div>
                            <div class="header-net-value">₹&nbsp;{{ number_format($totalAccountsBalance) }}</div>
                        </div>
                        <div class="avatar-sm rounded-circle d-flex align-items-center justify-content-center bg-primary-subtle text-primary" style="width: 40px; height: 40px;">
                            <i class="bi bi-wallet2 fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. Balanced 4-Card Summary Grid (Previous Beloved UI Style, Single Line Amount) --}}
            <div class="row g-3 accounts-summary-row">
                <!-- Card 1: Total Liquid Balance -->
                <div class="col-xl-3 col-md-6">
                    <div class="summary-card summary-card-available">
                        <div class="summary-icon">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <div class="summary-content">
                            <div class="summary-label">Total Liquid Balance</div>
                            <div class="summary-value" id="summary_accounts_balance">
                                ₹&nbsp;{{ number_format($totalAccountsBalance) }}
                            </div>
                            <div class="summary-sub">Aggregated across all linked accounts</div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Number of Accounts -->
                <div class="col-xl-3 col-md-6">
                    <div class="summary-card summary-card-bank">
                        <div class="summary-icon">
                            <i class="bi bi-bank"></i>
                        </div>
                        <div class="summary-content">
                            <div class="summary-label">Linked Bank Accounts</div>
                            <div class="summary-value" id="summary_accounts_count">
                                {{ number_format($accountsCount) }}
                            </div>
                            <div class="summary-sub">Verified accounts in Vault directory</div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Connected Banks -->
                <div class="col-xl-3 col-md-6">
                    <div class="summary-card summary-card-cash">
                        <div class="summary-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <div class="summary-content">
                            <div class="summary-label">Connected Banks</div>
                            <div class="summary-value">
                                {{ number_format($distinctBanksCount) }}
                            </div>
                            <div class="summary-sub">Unique banking institutions</div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Average Account Balance -->
                <div class="col-xl-3 col-md-6">
                    <div class="summary-card summary-card-spent">
                        <div class="summary-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div class="summary-content">
                            <div class="summary-label">Avg Account Balance</div>
                            <div class="summary-value">
                                ₹&nbsp;{{ number_format($avgAccountBalance) }}
                            </div>
                            <div class="summary-sub">Average liquidity per account</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. Accounts Data Table Card --}}
            <div class="accounts-table-card">
                {{-- Table Toolbar --}}
                <div class="accounts-table-toolbar d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="table-toolbar-icon">
                            <i class="bi bi-bank"></i>
                        </div>
                        <h5 class="table-toolbar-title mb-0">Bank Accounts Directory</h5>
                        <span class="badge table-toolbar-count-badge ms-1">
                            {{ number_format($accountsCount) }} total
                        </span>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ url('/accounts_add') }}" class="btn btn-primary accounts-add-btn d-inline-flex align-items-center gap-2">
                            <i class="bi bi-plus-lg"></i>
                            <span>ADD ACCOUNT</span>
                        </a>
                    </div>
                </div>

                {{-- Table Container --}}
                <div class="accounts-table-wrap">
                    <table id="accounts_table" class="table align-middle w-100 accounts-table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ACCOUNT NUMBER</th>
                                <th>ACCOUNT TYPE</th>
                                <th>BANK NAME</th>
                                <th>BRANCH</th>
                                <th>IFSC CODE</th>
                                <th>BALANCE</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <script>
    $(document).ready(function () {
        var accountsTable;

        function safeText(value) {
            if (value === null || value === undefined || value === '') {
                return '-';
            }
            return $('<div>').text(value).html();
        }

        function formatMoney(value) {
            if (value === null || value === undefined || value === '') {
                return '-';
            }
            value = parseFloat(value || 0);
            return '₹ ' + value.toLocaleString('en-IN', { minimumFractionDigits: 0, maximumFractionDigits: 2 });
        }

        // Initialize DataTable with 100 records by default
        accountsTable = $('#accounts_table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            scrollX: false,
            pageLength: 100,
            lengthMenu: [25, 50, 100, 250, 500],
            order: [[0, 'asc']],
            dom: '<"accounts-table-wrap"t><"accounts-table-footer d-flex align-items-center justify-content-between flex-wrap gap-3"ip>',
            ajax: {
                url: "{{ route('accounts_list_table') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                error: function (xhr) {
                    console.error('Accounts table load error:', xhr.responseText);
                }
            },
            language: {
                info: "Showing <b>_START_</b> to <b>_END_</b> of <b>_TOTAL_</b> accounts",
                infoEmpty: "Showing 0 to 0 of 0 accounts",
                infoFiltered: "(filtered from _MAX_ total accounts)",
                zeroRecords: `
                    <div class="text-center py-5">
                        <div class="avatar-lg bg-light text-muted rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 54px; height: 54px; font-size: 24px;">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">No Accounts Found</h6>
                        <p class="text-muted small mb-0">Try changing your search terms or adding a new bank account.</p>
                    </div>
                `,
                paginate: {
                    previous: '<i class="bi bi-chevron-left me-1"></i> Previous',
                    next: 'Next <i class="bi bi-chevron-right ms-1"></i>'
                },
                processing: `
                    <div class="accounts-loader p-3 text-center">
                        <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;"></div>
                        <div class="accounts-loader-title mt-2 fw-bold text-dark" style="font-size: 13px;">Loading Accounts...</div>
                    </div>
                `
            },
            columns: [
                {
                    data: 'id',
                    name: 'id',
                    render: function (data, type, row) {
                        if (type !== 'display') {
                            return data;
                        }
                        var desktopChip = `<span class="d-none d-md-inline-flex acc-id-chip" title="Click to view details">#${data}</span>`;
                        var mobileCard = `
                            <div class="d-md-none mobile-account-card">
                                <div class="mobile-card-top">
                                    <div class="mobile-bank-identity">
                                        <div class="mobile-bank-avatar">
                                            <i class="bi bi-bank2"></i>
                                        </div>
                                        <div class="mobile-bank-details">
                                            <div class="mobile-bank-name">${safeText(row.bank_name)}</div>
                                            <div class="mobile-acc-number">${safeText(row.account_number)}</div>
                                        </div>
                                    </div>
                                    <div class="mobile-card-pills">
                                        <span class="acc-type-pill"><span class="acc-type-dot"></span>${safeText(row.account_type)}</span>
                                        <span class="acc-id-chip">#${data}</span>
                                    </div>
                                </div>

                                <div class="mobile-card-balance-box">
                                    <div class="mobile-balance-meta">
                                        <span class="mobile-balance-label">Current Balance</span>
                                        <span class="mobile-balance-value">${formatMoney(row.balance)}</span>
                                    </div>
                                </div>

                                <div class="mobile-card-bottom">
                                    <div class="mobile-meta-tag">
                                        <i class="bi bi-geo-alt"></i>
                                        <span>${safeText(row.branch)}</span>
                                    </div>
                                    <div class="mobile-meta-right">
                                        <span class="ifsc-code-badge">${safeText(row.ifsc_code)}</span>
                                        <div class="mobile-arrow-btn">
                                            <i class="bi bi-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        return desktopChip + mobileCard;
                    }
                },
                {
                    data: 'account_number',
                    name: 'account_number',
                    render: function (data, type, row) {
                        return `<span class="acc-number-text" title="Click to view details">${safeText(data)}</span>`;
                    }
                },
                {
                    data: 'account_type',
                    name: 'account_type',
                    render: function (data) {
                        return `<span class="acc-type-pill"><span class="acc-type-dot"></span>${safeText(data)}</span>`;
                    }
                },
                {
                    data: 'bank_name',
                    name: 'bank_name',
                    render: function (data) {
                        return `<span class="fw-bold text-dark">${safeText(data)}</span>`;
                    }
                },
                {
                    data: 'branch',
                    name: 'branch',
                    render: function (data) {
                        return `<span class="text-secondary small d-inline-flex align-items-center gap-1"><i class="bi bi-geo-alt text-muted" style="font-size: 12px;"></i> ${safeText(data)}</span>`;
                    }
                },
                {
                    data: 'ifsc_code',
                    name: 'ifsc_code',
                    render: function (data) {
                        return `<span class="ifsc-code-badge">${safeText(data)}</span>`;
                    }
                },
                {
                    data: 'balance',
                    name: 'balance',
                    render: function (data) {
                        return `<span class="acc-balance-badge">${formatMoney(data)}</span>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function (data) {
                        if (!data || data === '-') return '-';
                        var parts = data.split(' ');
                        return `<div><span class="text-dark fw-semibold small">${parts[0] || data}</span>${parts[1] ? `<div class="text-muted" style="font-size: 11px;">${parts[1]}</div>` : ''}</div>`;
                    }
                },
                {
                    data: 'updated_at',
                    name: 'updated_at',
                    render: function (data) {
                        if (!data || data === '-') return '-';
                        var parts = data.split(' ');
                        return `<div><span class="text-dark fw-semibold small">${parts[0] || data}</span>${parts[1] ? `<div class="text-muted" style="font-size: 11px;">${parts[1]}</div>` : ''}</div>`;
                    }
                }
            ]
        });

        // Sync with Header Search Input & Custom Search Event
        var $headerSearch = $('#header_search_input');
        var $headerClear = $('#header_search_clear');

        // Listen for universal search dispatched from app.blade.php
        window.addEventListener('vault:search', function (e) {
            if (accountsTable && e.detail && typeof e.detail.query !== 'undefined') {
                accountsTable.search(e.detail.query).draw();
            }
        });

        // Initialize with existing input query if present on load
        if ($headerSearch.length && $headerSearch.val()) {
            if ($headerClear.length) $headerClear.show();
            accountsTable.search($headerSearch.val()).draw();
        }

        // Clicking anywhere on the row opens the view blade
        $('#accounts_table tbody').on('click', 'tr', function (e) {
            if ($(e.target).closest('a, button, input').length === 0) {
                var data = accountsTable.row(this).data();
                if (data && data.id) {
                    window.location.href = "{{ url('/accounts_view') }}/" + data.id;
                }
            }
        });

        function adjustAccountsTable() {
            if ($.fn.DataTable.isDataTable('#accounts_table')) {
                accountsTable.columns.adjust();
            }
        }

        setTimeout(adjustAccountsTable, 200);
        setTimeout(adjustAccountsTable, 600);

        $(window).on('resize', function () {
            setTimeout(adjustAccountsTable, 250);
        });

        $(document).on('click', '.sidemenu-toggle, .app-sidebar__toggle, .sidebar-toggle, [data-bs-toggle="sidebar"], [data-toggle="sidebar"]', function () {
            setTimeout(adjustAccountsTable, 250);
            setTimeout(adjustAccountsTable, 600);
        });

        if (window.ResizeObserver) {
            var tableWrap = document.querySelector('.accounts-table-wrap');
            if (tableWrap) {
                var resizeObserver = new ResizeObserver(function () {
                    adjustAccountsTable();
                });
                resizeObserver.observe(tableWrap);
            }
        }
    });
    </script>
</x-app-layout>