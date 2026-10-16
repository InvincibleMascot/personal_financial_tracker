<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="ltr"
      data-nav-layout="vertical"
      data-theme-mode="light"
      data-header-styles="light"
      data-menu-styles="light">

<head>
    {{-- =========================================================
        Meta Data
    ========================================================== --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'expense_ledger') }}</title>

    <meta name="description" content="expense_ledger - Personal finance and expense management">
    <meta name="author" content="expense_ledger">

    {{-- =========================================================
        Favicon
    ========================================================== --}}
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('assets/img/favicon-tab.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">

    {{-- =========================================================
        Google Fonts - Plus Jakarta Sans
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">

    {{-- =========================================================
        Bootstrap CSS - Local
    ========================================================== --}}
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap-icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    {{-- =========================================================
        Global Theme Styles
        Theme: Bootstrap Blue Finance UI
    ========================================================== --}}
    <style>
        :root {
            --el-font: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            --el-primary: #0f4fbf;
            --el-primary-dark: #0b3f99;
            --el-primary-soft: #eaf3ff;
            --el-primary-light: #dbeafe;

            --el-bg: #f4f8ff;
            --el-bg-soft: #eef6ff;
            --el-card: #ffffff;
            --el-border: #d7e3f5;

            --el-text: #102a56;
            --el-muted: #64748b;

            --el-success: #16a34a;
            --el-danger: #dc2626;
            --el-warning: #f59e0b;

            --el-sidebar-width: 230px;
            --el-sidebar-rail-width: 64px;
            --el-header-height: 68px;
            --el-radius: 16px;
        }

        html {
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
        }

        body {
            min-height: 100%;
            margin: 0;
            overflow-x: hidden;
            overflow-y: auto;
            font-family: var(--el-font);
            background:
                radial-gradient(circle at top right, rgba(15, 79, 191, 0.10), transparent 28rem),
                linear-gradient(135deg, #ffffff 0%, var(--el-bg) 45%, var(--el-bg-soft) 100%);
            color: var(--el-text);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        a {
            text-decoration: none;
        }

        .page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* =========================================================
            Vault Theme-Based Custom Scrollbars (Global & Responsive)
        ========================================================== */
        /* Firefox */
        html,
        body,
        * {
            scrollbar-width: thin;
            scrollbar-color: rgba(15, 79, 191, 0.35) transparent;
        }

        /* WebKit & Blink (Chrome, Edge, Safari, Brave) */
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(15, 79, 191, 0.30);
            border-radius: 999px;
            border: 2px solid transparent;
            background-clip: padding-box;
            transition: background 0.2s ease;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--el-primary, #0f4fbf);
            background-clip: padding-box;
        }

        ::-webkit-scrollbar-thumb:active {
            background: var(--el-primary-dark, #0b3f99);
            background-clip: padding-box;
        }

        ::-webkit-scrollbar-corner {
            background: transparent;
        }

        /* Responsive adjustments for Mobile / Touch screens */
        @media (max-width: 767.98px) {
            ::-webkit-scrollbar {
                width: 4px;
                height: 4px;
            }

            ::-webkit-scrollbar-thumb {
                background: rgba(15, 79, 191, 0.22);
            }
        }

        /* =========================================================
            Loader
        ========================================================== */
        #loader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(244, 248, 255, 0.96);
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }

        #loader.loaded {
            opacity: 0;
            visibility: hidden;
        }

        .el-loader-spinner {
            width: 42px;
            height: 42px;
            border: 4px solid var(--el-primary-light);
            border-top-color: var(--el-primary);
            border-radius: 50%;
            animation: elSpin 0.8s linear infinite;
        }

        @keyframes elSpin {
            to {
                transform: rotate(360deg);
            }
        }

        /* =========================================================
            Header
        ========================================================== */
        .app-header {
            position: fixed;
            top: 0;
            right: 0;
            left: var(--el-sidebar-width);
            height: var(--el-header-height);
            z-index: 1030;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(215, 227, 245, 0.90);
            transition: left 0.2s ease;
        }

        .main-header-container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 22px;
        }

        .header-content-left,
        .header-content-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .header-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--el-text);
        }

        .sidemenu-toggle {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: 1px solid var(--el-border);
            background: #ffffff;
            color: var(--el-primary);
            box-shadow: 0 4px 14px rgba(15, 79, 191, 0.08);
        }

        .sidemenu-toggle i {
            font-size: 21px;
        }

        .el-search-box {
            position: relative;
            width: min(1100px, 50vw);
        }

        .el-search-box input {
            width: 100%;
            height: 44px;
            border-radius: 12px;
            border: 1px solid var(--el-border);
            background: #ffffff;
            color: var(--el-text);
            font-size: 14px;
            font-weight: 500;
            padding: 0 40px 0 42px;
            outline: none;
            transition: all 0.15s ease;
            box-shadow: 0 2px 6px rgba(15, 79, 191, 0.04);
        }

        .el-search-box input:focus {
            border-color: var(--el-primary);
            box-shadow: 0 0 0 4px rgba(15, 79, 191, 0.12);
            background: #ffffff;
        }

        .el-search-box i.bi-search {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--el-muted);
            font-size: 16px;
            pointer-events: none;
        }

        .header-search-clear-btn {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #94a3b8;
            font-size: 16px;
            padding: 0;
            cursor: pointer;
            display: none;
            line-height: 1;
            z-index: 2;
        }

        .header-search-clear-btn:hover {
            color: #475569;
        }

        .el-icon-btn {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: 1px solid var(--el-border);
            background: #ffffff;
            color: var(--el-primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: background 0.15s ease, color 0.15s ease, border-color 0.15s ease;
        }

        .el-icon-btn i {
            font-size: 17px;
        }

        .el-icon-btn:hover {
            background: var(--el-primary-soft);
            border-color: #b8cff6;
            color: var(--el-primary-dark);
        }

        /* =========================================================
            Header Date & Time
        ========================================================== */
        .el-time-widget {
            display: flex;
            align-items: center;
        }

        .el-current-time-box {
            min-height: 40px;
            padding: 6px 14px;
            border: 1px solid var(--el-border);
            border-radius: 12px;
            background: #ffffff;
            color: var(--el-text);
            box-shadow: 0 4px 14px rgba(15, 79, 191, 0.06);
            display: flex;
            align-items: center;
            gap: 9px;
            white-space: nowrap;
        }

        .el-current-time-box::after {
            display: none;
        }

        .el-current-time-box i {
            color: var(--el-primary);
            font-size: 16px;
        }

        .el-current-time-text {
            font-size: 13px;
            font-weight: 700;
            color: var(--el-text);
        }

        .el-timezone-dropdown {
            width: 330px;
            border: 1px solid var(--el-border);
            border-radius: 16px;
            padding: 10px;
            box-shadow: 0 20px 45px rgba(15, 42, 86, 0.14);
        }

        .el-timezone-item {
            padding: 9px 10px;
            border-radius: 11px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        .el-timezone-item:hover {
            background: var(--el-primary-soft);
        }

        .el-timezone-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--el-text);
        }

        .el-timezone-value {
            font-size: 12px;
            font-weight: 600;
            color: var(--el-muted);
            white-space: nowrap;
        }

        @media (max-width: 1199.98px) {
            .el-time-widget {
                display: none;
            }
        }

        .el-profile-toggle {
            border: 1px solid var(--el-border);
            background: #ffffff;
            border-radius: 999px;
            padding: 4px 12px 4px 4px;
            color: var(--el-text);
            display: flex;
            align-items: center;
            gap: 9px;
            box-shadow: 0 4px 16px rgba(15, 79, 191, 0.06);
        }

        .el-profile-toggle::after {
            display: none;
        }

        .el-user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--el-primary), #4f8df7);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
            flex-shrink: 0;
        }

        .el-user-name {
            max-width: 150px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            font-size: 13px;
            font-weight: 600;
        }

        .el-header-dropdown {
            width: 250px;
            border: 1px solid var(--el-border);
            border-radius: 16px;
            box-shadow: 0 20px 45px rgba(15, 42, 86, 0.14);
            padding: 8px;
        }

        .el-header-dropdown .dropdown-item {
            border-radius: 10px;
            font-size: 13px;
            padding: 9px 11px;
            color: var(--el-text);
        }

        .el-header-dropdown .dropdown-item:hover {
            background: var(--el-primary-soft);
            color: var(--el-primary-dark);
        }

        /* =========================================================
            Main Content
        ========================================================== */
        .main-content.app-content {
            margin-left: var(--el-sidebar-width);
            padding-top: var(--el-header-height);
            flex: 1 0 auto;
            display: flex;
            flex-direction: column;
            min-height: 0;
            transition: margin-left 0.2s ease;
        }

        .el-content-container {
            padding: 22px 26px;
            flex: 1 0 auto;
            min-height: 0;
        }

        .el-page-title-block {
            margin-bottom: 22px;
        }

        .el-page-title {
            font-size: 24px;
            font-weight: 800;
            color: var(--el-text);
            margin: 0;
        }

        .el-page-subtitle {
            color: var(--el-muted);
            font-size: 13px;
            margin-top: 4px;
        }

        /* =========================================================
            Reusable Page UI Classes
        ========================================================== */
        .el-card {
            background: var(--el-card);
            border: 1px solid rgba(215, 227, 245, 0.92);
            border-radius: var(--el-radius);
            box-shadow: 0 14px 35px rgba(15, 79, 191, 0.07);
        }

        .el-card-header {
            padding: 18px 20px;
            border-bottom: 1px solid var(--el-border);
        }

        .el-card-body {
            padding: 20px;
        }

        .el-btn-primary,
        .btn-primary {
            background: var(--el-primary) !important;
            border-color: var(--el-primary) !important;
            color: #ffffff !important;
            border-radius: 11px;
            font-weight: 600;
            box-shadow: 0 8px 18px rgba(15, 79, 191, 0.20);
        }

        .el-btn-primary:hover,
        .btn-primary:hover {
            background: var(--el-primary-dark) !important;
            border-color: var(--el-primary-dark) !important;
        }

        .el-btn-light {
            background: #ffffff;
            border: 1px solid var(--el-border);
            color: var(--el-text);
            border-radius: 11px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-color: var(--el-border);
            border-radius: 11px;
            min-height: 40px;
            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--el-primary);
            box-shadow: 0 0 0 4px rgba(15, 79, 191, 0.10);
        }

        .table {
            color: var(--el-text);
            font-size: 13px;
        }

        .table thead th {
            color: var(--el-muted);
            font-weight: 700;
            font-size: 12px;
            border-bottom-color: var(--el-border);
            background: #f8fbff;
        }

        .table tbody td {
            border-bottom-color: #edf3fb;
            vertical-align: middle;
        }

        /* =========================================================
            Footer
        ========================================================== */
        .footer {
            flex-shrink: 0;
            margin-left: var(--el-sidebar-width);
            background: transparent;
            color: var(--el-muted);
            font-size: 13px;
            transition: margin-left 0.2s ease;
        }

        .footer a {
            color: var(--el-primary-dark);
            font-weight: 700;
        }

        /* =========================================================
            Overlay / Scroll To Top
        ========================================================== */
        .el-responsive-overlay {
            display: none;
        }

        .scrollToTop {
            position: fixed;
            right: 20px;
            bottom: 24px;
            width: 44px;
            height: 44px;
            display: none;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--el-primary, #0f4fbf) 0%, #2563eb 100%);
            color: #ffffff;
            border-radius: 50%;
            box-shadow: 0 6px 20px rgba(15, 79, 191, 0.35);
            cursor: pointer;
            z-index: 99999;
            transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
        }

        .scrollToTop:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(15, 79, 191, 0.45);
        }

        .scrollToTop .arrow {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            color: #ffffff;
        }

        .scrollToTop .arrow svg {
            width: 18px;
            height: 18px;
            stroke: #ffffff;
            display: block;
        }

        .scrollToTop .arrow i {
            font-size: 20px;
            color: #ffffff;
            line-height: 1;
            display: block;
        }

        .scrollToTop.show {
            display: flex;
        }

        @media (max-width: 767.98px) {
            .scrollToTop {
                right: 16px;
                bottom: 20px;
                width: 42px;
                height: 42px;
                box-shadow: 0 4px 14px rgba(15, 79, 191, 0.40);
            }

            .scrollToTop .arrow svg {
                width: 16px;
                height: 16px;
                stroke-width: 3;
            }

            .scrollToTop .arrow i {
                font-size: 18px;
            }
        }

        /* =========================================================
            Desktop Sidebar Toggle
        ========================================================== */
        html[data-toggled="close"] .app-sidebar {
            width: var(--el-sidebar-rail-width);
            transform: translateX(0);
        }

        html[data-toggled="close"] .app-header {
            left: var(--el-sidebar-rail-width);
        }

        html[data-toggled="close"] .main-content.app-content,
        html[data-toggled="close"] .footer {
            margin-left: var(--el-sidebar-rail-width);
        }

        /* =========================================================
            Responsive
        ========================================================== */
        @media (max-width: 991.98px) {
            .app-header {
                left: 0;
            }

            .main-content.app-content,
            .footer {
                margin-left: 0;
            }

            .el-search-box {
                display: none;
            }

            .el-user-name {
                display: none;
            }

            body.sidebar-open .app-sidebar {
                transform: translateX(0);
            }

            body.sidebar-open .el-responsive-overlay {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(15, 42, 86, 0.35);
                z-index: 1035;
            }
        }

        

        @media (max-width: 575.98px) {
            .el-content-container {
                padding: 16px;
            }

            .main-header-container {
                padding: 0 14px;
            }
        }

        /* =========================================================
            Vault Toast Notification System
        ========================================================== */
        .vault-toast-container {
            position: fixed;
            top: 22px;
            right: 22px;
            z-index: 10999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            pointer-events: none;
            max-width: 420px;
            width: calc(100% - 36px);
        }

        .vault-toast {
            pointer-events: auto;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 16px 40px rgba(15, 42, 86, 0.16), 0 2px 10px rgba(15, 42, 86, 0.08);
            border: 1px solid rgba(215, 227, 245, 0.95);
            display: flex;
            align-items: flex-start;
            padding: 14px 16px;
            gap: 12px;
            position: relative;
            overflow: hidden;
            animation: vaultToastSlideIn 0.32s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            transition: all 0.25s ease;
        }

        .vault-toast.vault-toast-hiding {
            animation: vaultToastSlideOut 0.25s ease forwards;
        }

        @keyframes vaultToastSlideIn {
            from {
                transform: translateX(115%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes vaultToastSlideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(115%);
                opacity: 0;
            }
        }

        .vault-toast-icon-box {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .vault-toast-content {
            flex: 1;
            min-width: 0;
        }

        .vault-toast-title {
            font-size: 13.5px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.25;
            margin-bottom: 3px;
            letter-spacing: -0.2px;
        }

        .vault-toast-message {
            font-size: 12.5px;
            color: #475569;
            line-height: 1.42;
            font-weight: 500;
            word-break: break-word;
        }

        .vault-toast-close {
            background: transparent;
            border: none;
            color: #94a3b8;
            padding: 0;
            width: 24px;
            height: 24px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 15px;
            transition: all 0.15s ease;
            flex-shrink: 0;
            margin-top: -2px;
            margin-right: -4px;
        }

        .vault-toast-close:hover {
            color: #334155;
            background: #f1f5f9;
        }

        .vault-toast-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            transform-origin: left;
            animation: vaultToastProgress linear forwards;
        }

        @keyframes vaultToastProgress {
            from { width: 100%; }
            to { width: 0%; }
        }

        /* Toast Themes */
        .vault-toast-error {
            border-left: 4px solid #ef4444;
        }
        .vault-toast-error .vault-toast-icon-box {
            background: #fef2f2;
            color: #ef4444;
        }
        .vault-toast-error .vault-toast-progress {
            background: #ef4444;
        }

        .vault-toast-success {
            border-left: 4px solid #10b981;
        }
        .vault-toast-success .vault-toast-icon-box {
            background: #ecfdf5;
            color: #10b981;
        }
        .vault-toast-success .vault-toast-progress {
            background: #10b981;
        }

        .vault-toast-warning {
            border-left: 4px solid #f59e0b;
        }
        .vault-toast-warning .vault-toast-icon-box {
            background: #fffbeb;
            color: #f59e0b;
        }
        .vault-toast-warning .vault-toast-progress {
            background: #f59e0b;
        }

        .vault-toast-info {
            border-left: 4px solid #0f4fbf;
        }
        .vault-toast-info .vault-toast-icon-box {
            background: #eff6ff;
            color: #0f4fbf;
        }
        .vault-toast-info .vault-toast-progress {
            background: #0f4fbf;
        }

        /* Globally suppress legacy inline alert containers */
        [id$="_alert"] {
            display: none !important;
        }
    </style>

    @yield('page_styles')
</head>

<body>
    @php
        $authUser = Auth::user();

        $userName = trim($authUser->name ?? '');

        if ($userName === '') {
            $userName = trim(($authUser->first_name ?? '') . ' ' . ($authUser->last_name ?? ''));
        }

        if ($userName === '') {
            $userName = 'User';
        }

        $userEmail = $authUser->email ?? '';
        $userInitial = strtoupper(substr($userName, 0, 1));

        $profileUrl = \Illuminate\Support\Facades\Route::has('profile.edit')
            ? route('profile.edit')
            : '#';
    @endphp

    {{-- =========================================================
        Loader
    ========================================================== --}}
    <div id="loader">
        <div class="el-loader-spinner"></div>
    </div>

    <div class="page">

        {{-- =========================================================
            Header
        ========================================================== --}}
        <header class="app-header">
            <div class="main-header-container container-fluid">

                {{-- Header Left --}}
                <div class="header-content-left">
                    <a aria-label="Toggle Sidebar"
                       class="sidemenu-toggle header-link"
                       id="sidebarToggle"
                       href="javascript:void(0);">
                        <i class="bi bi-list"></i>
                    </a>

                    @php
                        $headerSearchPlaceholder = 'Search Vault...';
                        if (request()->is('accounts*')) {
                            $headerSearchPlaceholder = 'Search accounts, banks, IFSC, branch...';
                        } elseif (request()->is('transactions*')) {
                            $headerSearchPlaceholder = 'Search transactions, category, method...';
                        } elseif (request()->is('income*')) {
                            $headerSearchPlaceholder = 'Search income, source, amount...';
                        } elseif (request()->is('savings*')) {
                            $headerSearchPlaceholder = 'Search savings goals, target, progress...';
                        } elseif (request()->is('users*')) {
                            $headerSearchPlaceholder = 'Search users, email, name, role...';
                        } elseif (request()->is('user-types*')) {
                            $headerSearchPlaceholder = 'Search user types, permissions...';
                        } elseif (request()->is('dashboard*')) {
                            $headerSearchPlaceholder = 'Quick search across Vault...';
                        }
                    @endphp

                    <div class="el-search-box">
                        <i class="bi bi-search"></i>
                        <input type="text"
                               id="header_search_input"
                               placeholder="{{ $headerSearchPlaceholder }}"
                               autocomplete="off">
                        <button type="button" id="header_search_clear" class="header-search-clear-btn" title="Clear search">
                            <i class="bi bi-x-circle-fill"></i>
                        </button>
                    </div>
                </div>

                {{-- Header Right --}}
                <div class="header-content-right">
                
                {{--Date & Time --}}
                <div class="el-time-widget">
                    <div class="dropdown">
                        <a href="javascript:void(0);"
                        class="el-current-time-box dropdown-toggle"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                        aria-expanded="false">

                            <i class="bi bi-clock-history"></i>

                            <span class="el-current-time-text" id="currentDateTime">
                                Loading time...
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end el-timezone-dropdown">
                            <div class="px-2 pb-2 border-bottom mb-2">
                                <p class="mb-0 fw-bold">World Time</p>
                            </div>

                            <div id="timezoneList"></div>
                        </div>
                    </div>
                </div>

                    {{-- Profile --}}
                    <div class="dropdown">
                        <a href="javascript:void(0);"
                           class="el-profile-toggle dropdown-toggle"
                           id="mainHeaderProfile"
                           data-bs-toggle="dropdown"
                           data-bs-auto-close="outside"
                           aria-expanded="false">
                            <span class="el-user-avatar">{{ $userInitial }}</span>
                            <span class="el-user-name">{{ $userName }}</span>
                            <i class="bi bi-chevron-down small text-muted"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end el-header-dropdown"
                             aria-labelledby="mainHeaderProfile">

                            <div class="px-2 py-3 border-bottom text-center">
                                <div class="el-user-avatar mx-auto mb-2">{{ $userInitial }}</div>
                                <p class="fw-bold mb-0">{{ $userName }}</p>
                                <span class="text-muted small">{{ $userEmail }}</span>
                            </div>

                            <div class="py-2">
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ $profileUrl }}">
                                    <i class="bi bi-person"></i>
                                    Profile
                                </a>

                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf

                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                       href="javascript:void(0);"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Sign Out
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        {{-- =========================================================
            Sidebar
        ========================================================== --}}
        @include('layouts.sidebar')

        {{-- =========================================================
            Main Content
        ========================================================== --}}
        <div class="main-content app-content">
            <div class="container-fluid el-content-container">

                @isset($header)
                    <div class="el-page-title-block">
                        {{ $header }}
                    </div>
                @endisset

                {{ $slot }}

            </div>
        </div>

        {{-- =========================================================
            Footer
        ========================================================== --}}
        <footer class="footer mt-auto py-3 text-center">
            <div class="container-fluid">
                <span>
                    Copyright © <span id="year"></span>
                    <a href="javascript:void(0);">THE VAULT</a>.
                    All rights reserved.
                </span>
            </div>
        </footer>

    </div>

    {{-- =========================================================
        Mobile Sidebar Overlay
    ========================================================== --}}
    <div id="responsive-overlay" class="el-responsive-overlay"></div>

    {{-- =========================================================
        Scroll To Top
    ========================================================== --}}
    <div class="scrollToTop" id="scrollToTop" role="button" aria-label="Scroll to top" title="Scroll to top">
        <span class="arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 15l-6-6-6 6"/>
            </svg>
        </span>
    </div>

    {{-- =========================================================
        Bootstrap JS - Local
    ========================================================== --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    @yield('page_scripts')

    {{-- =========================================================
        Global Scripts
    ========================================================== --}}
    <script>
        const CSRF_TOKEN = document.querySelector('meta[name="csrf_token"]').getAttribute('content');

        document.addEventListener('DOMContentLoaded', function () {
            const loader = document.getElementById('loader');
            const year = document.getElementById('year');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const responsiveOverlay = document.getElementById('responsive-overlay');
            const scrollToTop = document.getElementById('scrollToTop');

            if (loader) {
                setTimeout(function () {
                    loader.classList.add('loaded');
                }, 250);
            }

            if (year) {
                year.textContent = new Date().getFullYear();
            }

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function () {
                    if (window.innerWidth <= 991) {
                        document.body.classList.toggle('sidebar-open');
                    } else {
                        const html = document.documentElement;

                        if (html.getAttribute('data-toggled') === 'close') {
                            html.removeAttribute('data-toggled');
                        } else {
                            html.setAttribute('data-toggled', 'close');
                        }
                    }
                });
            }

            if (responsiveOverlay) {
                responsiveOverlay.addEventListener('click', function () {
                    document.body.classList.remove('sidebar-open');
                });
            }

            window.addEventListener('resize', function () {
                if (window.innerWidth > 991) {
                    document.body.classList.remove('sidebar-open');
                }
            });

            window.addEventListener('scroll', function () {
                if (!scrollToTop) {
                    return;
                }

                if (window.scrollY > 80) {
                    scrollToTop.classList.add('show');
                } else {
                    scrollToTop.classList.remove('show');
                }
            });

            /* =========================================================
                Server Synced Date & Time
            ========================================================== */
            const currentDateTime = document.getElementById('currentDateTime');
            const timezoneList = document.getElementById('timezoneList');

            const serverTimeUrl = "{{ route('server.time') }}";

            let serverBaseTime = null;
            let browserBaseTime = null;

            const timeZones = [
                {
                    label: 'Chennai',
                    timezone: 'Asia/Kolkata'
                },
                {
                    label: 'Muscat',
                    timezone: 'Asia/Muscat'
                },
                {
                    label: 'Berlin',
                    timezone: 'Europe/Berlin'
                },

                {
                    label: 'London',
                    timezone: 'Europe/London'
                },
                {
                    label: 'Paris',
                    timezone: 'Europe/Paris'
                },
            ];

            function getCurrentServerBasedDate() {
                if (!serverBaseTime || !browserBaseTime) {
                    return new Date();
                }

                const elapsedMilliseconds = Date.now() - browserBaseTime;

                return new Date(serverBaseTime.getTime() + elapsedMilliseconds);
            }

            function formatDateTime(date, timezone, showDate = true) {
                const options = {
                    timeZone: timezone,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: true
                };

                if (showDate) {
                    options.weekday = 'short';
                    options.day = '2-digit';
                    options.month = 'short';
                    options.year = 'numeric';
                }

                return new Intl.DateTimeFormat('en-IN', options).format(date);
            }

            function updateHeaderDateTime() {
                const currentServerDate = getCurrentServerBasedDate();

                if (currentDateTime) {
                    currentDateTime.textContent = formatDateTime(currentServerDate, 'Asia/Kolkata', true);
                }

                if (timezoneList) {
                    timezoneList.innerHTML = '';

                    timeZones.forEach(function (zone) {
                        const item = document.createElement('div');
                        item.className = 'el-timezone-item';

                        item.innerHTML = `
                            <div>
                                <div class="el-timezone-name">${zone.label}</div>
                                <div class="text-muted small">${zone.timezone}</div>
                            </div>
                            <div class="el-timezone-value">
                                ${formatDateTime(currentServerDate, zone.timezone, false)}
                            </div>
                        `;

                        timezoneList.appendChild(item);
                    });
                }
            }

            function syncServerTime() {
                fetch(serverTimeUrl, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        serverBaseTime = new Date(data.server_time);
                        browserBaseTime = Date.now();

                        updateHeaderDateTime();
                    })
                    .catch(function () {
                        if (currentDateTime) {
                            currentDateTime.textContent = 'Unable to sync time';
                        }
                    });
            }

            syncServerTime();

            setInterval(updateHeaderDateTime, 1000);

            // Resync with Laravel server every 60 seconds
            setInterval(syncServerTime, 60000);

            if (scrollToTop) {
                scrollToTop.addEventListener('click', function () {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }

            // =========================================================
            // Universal Header Search Controller (Works on all pages)
            // =========================================================
            const headerSearchInput = document.getElementById('header_search_input');
            const headerSearchClear = document.getElementById('header_search_clear');

            if (headerSearchInput) {
                let universalSearchDebounce;

                function executeUniversalSearch(query) {
                    // 1. Dispatch custom event for any page view to listen to
                    window.dispatchEvent(new CustomEvent('vault:search', {
                        detail: { query: query }
                    }));

                    // 2. If DataTables exists on this page, filter all active instances
                    if (window.jQuery && window.jQuery.fn && window.jQuery.fn.dataTable) {
                        try {
                            if (typeof window.jQuery.fn.dataTable.tables === 'function') {
                                const activeTables = window.jQuery.fn.dataTable.tables({ api: true });
                                if (activeTables && activeTables.length > 0) {
                                    activeTables.search(query).draw();
                                    return;
                                }
                            }
                        } catch (e) {
                            console.warn('DataTables search error:', e);
                        }

                        // Fallback to default DataTables filter box if present
                        const $defaultFilter = window.jQuery('.dataTables_filter input');
                        if ($defaultFilter.length) {
                            $defaultFilter.val(query).trigger('input').trigger('keyup');
                            return;
                        }
                    }

                    // 3. Fallback to any table or list search field on the page
                    const pageSearchField = document.querySelector('input[type="search"]:not(#header_search_input), .table-search-input, #table_search');
                    if (pageSearchField) {
                        pageSearchField.value = query;
                        pageSearchField.dispatchEvent(new Event('input', { bubbles: true }));
                        pageSearchField.dispatchEvent(new Event('keyup', { bubbles: true }));
                    }
                }

                headerSearchInput.addEventListener('input', function () {
                    const query = this.value;
                    if (headerSearchClear) {
                        headerSearchClear.style.display = query.length > 0 ? 'inline-flex' : 'none';
                    }

                    clearTimeout(universalSearchDebounce);
                    universalSearchDebounce = setTimeout(function () {
                        executeUniversalSearch(query);
                    }, 220);
                });

                if (headerSearchClear) {
                    headerSearchClear.addEventListener('click', function () {
                        headerSearchInput.value = '';
                        headerSearchInput.focus();
                        headerSearchClear.style.display = 'none';
                        executeUniversalSearch('');
                    });
                }

                headerSearchInput.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') {
                        headerSearchInput.value = '';
                        headerSearchInput.blur();
                        if (headerSearchClear) headerSearchClear.style.display = 'none';
                        executeUniversalSearch('');
                    }
                });
            }
        });

        /* =========================================================
            Global Vault Toast Helper API & Universal Validation Interceptors
        ========================================================== */
        var lastToastTime = 0;
        var lastToastMsg = '';

        window.showVaultToast = function (type, message, title, duration = 4200) {
            if (!message) return;

            var now = Date.now();
            if (message === lastToastMsg && (now - lastToastTime) < 800) {
                return;
            }
            lastToastMsg = message;
            lastToastTime = now;

            var container = document.getElementById('vaultToastContainer');
            if (!container) {
                container = document.createElement('div');
                container.id = 'vaultToastContainer';
                container.className = 'vault-toast-container';
                container.setAttribute('aria-live', 'polite');
                container.setAttribute('aria-atomic', 'true');
                document.body.appendChild(container);
            }

            var typeConfig = {
                error: {
                    cls: 'vault-toast-error',
                    icon: 'bi-exclamation-octagon-fill',
                    defaultTitle: 'Validation Error'
                },
                danger: {
                    cls: 'vault-toast-error',
                    icon: 'bi-exclamation-octagon-fill',
                    defaultTitle: 'Error'
                },
                success: {
                    cls: 'vault-toast-success',
                    icon: 'bi-check-circle-fill',
                    defaultTitle: 'Success'
                },
                warning: {
                    cls: 'vault-toast-warning',
                    icon: 'bi-exclamation-triangle-fill',
                    defaultTitle: 'Attention'
                },
                info: {
                    cls: 'vault-toast-info',
                    icon: 'bi-info-circle-fill',
                    defaultTitle: 'Information'
                }
            };

            var normalizedType = (type || 'info').toLowerCase();
            var config = typeConfig[normalizedType] || typeConfig.info;
            var finalTitle = title || config.defaultTitle;

            var toast = document.createElement('div');
            toast.className = 'vault-toast ' + config.cls;

            toast.innerHTML = `
                <div class="vault-toast-icon-box">
                    <i class="bi ${config.icon}"></i>
                </div>
                <div class="vault-toast-content">
                    <div class="vault-toast-title">${finalTitle}</div>
                    <div class="vault-toast-message">${message}</div>
                </div>
                <button type="button" class="vault-toast-close" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
                <div class="vault-toast-progress" style="animation-duration: ${duration}ms;"></div>
            `;

            container.appendChild(toast);

            function dismissToast() {
                if (toast.classList.contains('vault-toast-hiding')) return;
                toast.classList.add('vault-toast-hiding');
                setTimeout(function () {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 260);
            }

            var closeBtn = toast.querySelector('.vault-toast-close');
            if (closeBtn) {
                closeBtn.addEventListener('click', dismissToast);
            }

            var timer = setTimeout(dismissToast, duration);

            toast.addEventListener('mouseenter', function () {
                clearTimeout(timer);
                var progress = toast.querySelector('.vault-toast-progress');
                if (progress) progress.style.animationPlayState = 'paused';
            });

            toast.addEventListener('mouseleave', function () {
                var progress = toast.querySelector('.vault-toast-progress');
                if (progress) progress.style.animationPlayState = 'running';
                timer = setTimeout(dismissToast, 2200);
            });
        };

        // Aliases for developer convenience
        window.showToast = window.showVaultToast;

        // Auto-display Laravel session flash notifications if present
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function () {
                showVaultToast('success', {!! json_encode(session('success')) !!}, 'Success');
            });
        @endif
        @if(session('error'))
            document.addEventListener('DOMContentLoaded', function () {
                showVaultToast('error', {!! json_encode(session('error')) !!}, 'Error');
            });
        @endif
        @if(session('status'))
            document.addEventListener('DOMContentLoaded', function () {
                showVaultToast('info', {!! json_encode(session('status')) !!}, 'Update');
            });
        @endif
        @if($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                showVaultToast('error', {!! json_encode($errors->first()) !!}, 'Validation Error');
            });
        @endif

        // Universal Interceptors across all pages (AJAX validation and legacy alerts)
        document.addEventListener('DOMContentLoaded', function () {
            if (window.jQuery) {
                // 1. Intercept all jQuery AJAX 422 validation errors across all modules
                $(document).ajaxError(function (event, xhr, settings) {
                    if (xhr.status === 422) {
                        var msg = 'Please resolve the highlighted required fields.';
                        if (xhr.responseJSON) {
                            if (xhr.responseJSON.errors) {
                                var firstKey = Object.keys(xhr.responseJSON.errors)[0];
                                if (xhr.responseJSON.errors[firstKey] && xhr.responseJSON.errors[firstKey][0]) {
                                    msg = xhr.responseJSON.errors[firstKey][0];
                                }
                            } else if (xhr.responseJSON.message) {
                                msg = xhr.responseJSON.message;
                            }
                        }
                        window.showVaultToast('error', msg, 'Validation Error');
                    }
                    // Status 404, 500, etc. are intentionally excluded per requirements
                });

                // 2. Intercept any page script injecting HTML into legacy [id$="_alert"] containers
                const origHtml = jQuery.fn.html;
                jQuery.fn.html = function (val) {
                    if (typeof val === 'string' && val.indexOf('alert') !== -1) {
                        var id = this.attr('id') || '';
                        if (id.endsWith('_alert') || this.hasClass('alert-container')) {
                            var $temp = $('<div>').html(val);
                            var text = $temp.text().trim();
                            if (text) {
                                var isError = $temp.find('.alert-danger, .alert-warning').length > 0;
                                var isSuccess = $temp.find('.alert-success').length > 0;
                                if (isError) {
                                    window.showVaultToast('error', text, 'Validation Error');
                                } else if (isSuccess) {
                                    window.showVaultToast('success', text, 'Success');
                                }
                            }
                            return this; // Prevent showing the ugly inline banner
                        }
                    }
                    return origHtml.apply(this, arguments);
                };
            }
        });
    </script>

    <!-- Global Toast Container Element -->
    <div id="vaultToastContainer" class="vault-toast-container" aria-live="polite" aria-atomic="true"></div>
</body>
</html>