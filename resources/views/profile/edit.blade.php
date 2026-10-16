<x-app-layout>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        .profile-hero-card {
            background: #ffffff;
            border: 1px solid var(--el-border, #d7e3f5);
            border-radius: var(--el-radius, 16px);
            box-shadow: 0 10px 30px rgba(15, 79, 191, 0.06);
            overflow: hidden;
        }

        .profile-hero-banner {
            height: 90px;
            background: linear-gradient(135deg, var(--el-primary, #0f4fbf) 0%, #2563eb 50%, #60a5fa 100%);
            position: relative;
        }

        .profile-avatar-wrap {
            margin-top: -45px;
            display: inline-block;
            position: relative;
        }

        .profile-avatar-circle {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            background: linear-gradient(135deg, #0b3f99 0%, #3b82f6 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(15, 79, 191, 0.22);
        }

        .profile-nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            color: var(--el-text, #102a56);
            font-size: 13px;
            font-weight: 600;
            transition: all 0.15s ease;
            text-decoration: none;
        }

        .profile-nav-link:hover,
        .profile-nav-link.active {
            background-color: var(--el-primary-soft, #eaf3ff);
            color: var(--el-primary, #0f4fbf);
        }

        .el-card {
            border: 1px solid var(--el-border, #d7e3f5) !important;
            border-radius: var(--el-radius, 16px) !important;
            box-shadow: 0 10px 30px rgba(15, 79, 191, 0.05) !important;
        }

        .input-group-text {
            border-color: var(--el-border, #d7e3f5);
        }

        .form-control:focus {
            border-color: var(--el-primary, #0f4fbf);
            box-shadow: 0 0 0 3px rgba(15, 79, 191, 0.12);
        }

        .toggle-password-btn {
            border-color: var(--el-border, #d7e3f5);
            background: #ffffff;
            color: var(--el-muted, #64748b);
        }

        .toggle-password-btn:hover {
            background: var(--el-primary-soft, #eaf3ff);
            color: var(--el-primary, #0f4fbf);
            border-color: var(--el-border, #d7e3f5);
        }
    </style>

    <div class="container-fluid p-0">

        {{-- Page Header --}}
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <h4 class="fw-bold mb-1" style="color: var(--el-text, #102a56); font-size: 22px;">
                    Profile Settings
                </h4>
                <p class="text-muted small mb-0">
                    Manage your personal account details, security credentials, and authentication preferences.
                </p>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-light border d-inline-flex align-items-center gap-2 px-3 py-2" style="border-radius: 10px; font-size: 13px; font-weight: 600;">
                    <i class="bi bi-grid-1x2"></i>
                    <span>Dashboard</span>
                </a>
            </div>
        </div>

        @php
            $initial = strtoupper(substr($user->name ?? 'User', 0, 1));
            $roleName = ucwords(str_replace('_', ' ', $user->userType()));
        @endphp

        <div class="row g-4">
            {{-- Left Column: User Summary Card --}}
            <div class="col-lg-4 col-xl-4">
                <div class="profile-hero-card mb-4">
                    <div class="profile-hero-banner"></div>

                    <div class="px-4 pb-4 text-center">
                        <div class="profile-avatar-wrap mb-2">
                            <div class="profile-avatar-circle">
                                {{ $initial }}
                            </div>
                        </div>

                        <h5 class="fw-bold text-dark mb-1">{{ $user->name }}</h5>
                        <p class="text-muted small mb-2">{{ $user->email }}</p>

                        <div class="mb-3">
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1.5 rounded-pill small">
                                <i class="bi bi-shield-check me-1"></i> {{ $roleName }}
                            </span>
                        </div>

                        <hr class="text-muted opacity-25 my-3">

                        {{-- Metadata List --}}
                        <div class="text-start">
                            <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light-subtle">
                                <span class="text-muted small d-flex align-items-center gap-2">
                                    <i class="bi bi-hash text-primary"></i> Account ID
                                </span>
                                <span class="fw-semibold small text-dark">#{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light-subtle">
                                <span class="text-muted small d-flex align-items-center gap-2">
                                    <i class="bi bi-calendar-check text-primary"></i> Member Since
                                </span>
                                <span class="fw-semibold small text-dark">
                                    {{ $user->created_at ? $user->created_at->format('M d, Y') : 'Active' }}
                                </span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between py-2">
                                <span class="text-muted small d-flex align-items-center gap-2">
                                    <i class="bi bi-patch-check text-primary"></i> Account Status
                                </span>
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">
                                    <i class="bi bi-dot"></i> Active
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quick Security Checklist Card --}}
                <div class="card el-card border-0 shadow-sm">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h6 class="fw-bold mb-0 text-dark d-flex align-items-center gap-2" style="font-size: 14px;">
                            <i class="bi bi-shield-lock text-primary"></i> Security Overview
                        </h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="d-flex align-items-start gap-2 mb-3">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <div>
                                <p class="fw-semibold small mb-0 text-dark">Session Active</p>
                                <span class="text-muted" style="font-size: 11px;">Protected with secure token authentication</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-2 mb-3">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <div>
                                <p class="fw-semibold small mb-0 text-dark">Password Protection</p>
                                <span class="text-muted" style="font-size: 11px;">Encrypted using modern Bcrypt hash algorithm</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-info-circle-fill text-primary mt-1"></i>
                            <div>
                                <p class="fw-semibold small mb-0 text-dark">Database Storage</p>
                                <span class="text-muted" style="font-size: 11px;">Synchronized with PostgreSQL Vault database</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Forms --}}
            <div class="col-lg-8 col-xl-8">
                {{-- Form 1: Personal Information --}}
                @include('profile.partials.update-profile-information-form')

                {{-- Form 2: Password & Authentication --}}
                @include('profile.partials.update-password-form')

                {{-- Form 3: Delete Account (Danger Zone) --}}
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    {{-- Interactive Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Password Visibility Toggle
            const toggleButtons = document.querySelectorAll('.toggle-password-btn');

            toggleButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const targetInput = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    if (targetInput) {
                        if (targetInput.type === 'password') {
                            targetInput.type = 'text';
                            if (icon) {
                                icon.classList.remove('bi-eye');
                                icon.classList.add('bi-eye-slash');
                            }
                        } else {
                            targetInput.type = 'password';
                            if (icon) {
                                icon.classList.remove('bi-eye-slash');
                                icon.classList.add('bi-eye');
                            }
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>
