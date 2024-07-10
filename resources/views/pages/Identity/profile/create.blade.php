<x-base-layout>
    <style>
        .nav-link.active.tab-completed {
            background-color: green !important;
            color: white !important;
        }

        /* Custom style to add a dropdown arrow */
        .custom-select-with-arrow {
            position: relative;
        }

        .custom-select-with-arrow::after {
            content: '\25BC';
            /* Unicode character for downward arrow */
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #555;
        }

        .custom-select-with-arrow select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 30px;
            /* Add space for the arrow */
        }
    </style>

    <!-- Main content -->
    <div class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row mb-5">
                                <!-- Tablist -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="personal-details-tab" data-bs-toggle="tab"
                                            href="#personal-details" role="tab" aria-controls="personal-details"
                                            aria-selected="true">Personal Details</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tab content -->
                            <div class="tab-content" id="myTabContent">

                                <!-- Personal Details Tab -->
                                <div class="tab-pane fade show active" id="personal-details" role="tabpanel"
                                    aria-labelledby="personal-details-tab">
                                    <form class="form" action="{{ route('profile.store') }}" method="POST"
                                        id="kt_client_form">
                                        @csrf
                                        <div class="py-2">
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-7">
                                                <div class="col-md-4 fv-row mb-3">
                                                    <!--First Name-->
                                                    <label class="required fs-6 fw-semibold mb-2"> First Name</label>
                                                    <input class="form-control form-control-solid" placeholder=""
                                                        name="first_name" value="{{ old('first_name') }}" />
                                                    @error('first_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 fv-row mb-3">
                                                    <!--Last Name-->
                                                    <label class="required fs-6 fw-semibold mb-2"> Last Name </label>
                                                    <input class="form-control form-control-solid" placeholder=""
                                                        name="last_name" value="{{ old('last_name') }}" />
                                                    @error('last_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 fv-row mb-3">
                                                    <!-- Contact -->
                                                    <label class="required fs-6 fw-semibold mb-2"> Contact </label>
                                                    <input class="form-control form-control-solid" placeholder=""
                                                        name="contact" value="{{ old('contact') }}" />
                                                    @error('contact')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-7">
                                                <!-- Email -->
                                                <div class="col-md-4 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">Email </label>
                                                    <input class="form-control form-control-solid" placeholder=""
                                                        name="email" value="{{ old('email') }}" />
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <!-- Permanent Address -->
                                                </div>
                                                <!--Gender-->
                                                <div class="col-md-4 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">Gender</label>
                                                    <div class="custom-select-with-arrow">
                                                        <select class="form-control form-control-solid" name="gender">
                                                            <option value="">Select Gender</option>
                                                            @foreach (['male', 'female', 'other'] as $gender)
                                                                <option value="{{ $gender }}"
                                                                    {{ old('gender') == $gender ? 'selected' : '' }}>
                                                                    {{ ucfirst($gender) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('gender')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!--Blood Group-->
                                                <div class="col-md-4 fv-row mb-3">
                                                    <label class="required fs-6 fw-semibold mb-2">Blood Group</label>
                                                    <div class="custom-select-with-arrow">
                                                        <select class="form-control form-control-solid"
                                                            name="blood_group">
                                                            <option value="">Select Blood Group</option>
                                                            @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bloodGroup)
                                                                <option value="{{ $bloodGroup }}"
                                                                    {{ old('blood_group') == $bloodGroup ? 'selected' : '' }}>
                                                                    {{ $bloodGroup }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('blood_group')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row g-9 mb-7">

                                                <!--Date of Birth-->
                                                <div class="col-md-4 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">Date Of Birth</label>
                                                    <input type="date" class="form-control form-control-solid" name="dob" value="{{ old('dob') }}" id="dob" />
                                                    @error('dob')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--begin::Action buttons-->
                                        <div class="d-flex justify-content-end align-items-center mt-12">
                                            <!--begin::Button-->
                                            <a href="{{ route('profile.index') }}"
                                                class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                                <span class="indicator-label">Save profile Details</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--begin::Action buttons-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('dob').setAttribute('max', today);
        });
    </script>

</x-base-layout>
