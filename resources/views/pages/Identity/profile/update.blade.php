<x-base-layout>
    <style>
        .error {
            color: #f00 !important;
        }

        td,
        th {
            border: none !important;
            text-align: initial !important;
            font-weight: normal !important;
        }

        thead {
            background: transparent !important;
        }

        .btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon) {
            border: 0;
            padding: calc(0.775rem + 1px) calc(1.5rem + 1px);
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
                                <!-- Aligning to the right -->
                                <h3>Add Employee Profile</h3>
                                <hr class="w-100">
                            </div>
                            <form class="form" action="{{ route('profile.update', $identity->id) }}" method="POST"
                                id="kt_client_form">
                                @csrf
                                <!--begin::Item-->
                                <div class="py-2">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">Employee Id <span
                                                    class="text-muted fs-6">(use this format e.g L12345 )</span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="" name="emp_id"
                                                value="{{ $identity->emp_id }}" readonly />
                                            @error('emp_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-md-3 fv-row mb-3">
                                            <!--First Name-->
                                            <label class="required fs-6 fw-semibold mb-2"> First Name</label>
                                            <input class="form-control form-control-solid" placeholder=""
                                                name="first_name" value="{{ old('first_name', $identity->first_name) }}" />
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 fv-row mb-3">
                                            <label class="required fs-6 fw-semibold mb-2"> Last Name </label>
                                            <input class="form-control form-control-solid" placeholder=""
                                                name="last_name" value="{{ old('last_name', $identity->last_name) }}" />
                                            @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->

                                        <div class="col-md-6 fv-row mb-3">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">Permanent Address</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder=""
                                                name="per_address" value="{{ old('per_address', $identity->per_address) }}" />
                                            @error('per_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                    </div>

                                    <div class="row g-9 mb-7">
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Gender</label>
                                            <div class="form-control form-control-solid">
                                                @foreach (['male', 'female', 'other'] as $gender)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="gender" id="gender_{{ $gender }}"
                                                            value="{{ $gender }}"
                                                            {{ old('gender', $identity->gender) == $gender ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="gender_{{ $gender }}">{{ ucfirst($gender) }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        
                                        <div class="col-md-6 fv-row mb-3">
                                            <label class="required fs-6 fw-semibold mb-2">Blood Group</label>
                                            <div class="form-control form-control-solid">
                                                @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bloodGroup)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="blood_group" id="blood_group_{{ $bloodGroup }}"
                                                            value="{{ $bloodGroup }}"
                                                            {{ old('blood_group', $identity->blood_group) == $bloodGroup ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="blood_group_{{ $bloodGroup }}">{{ $bloodGroup }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @error('blood_group')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">Date Of Birth</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" class="form-control form-control-solid" placeholder=""
                                                name="dob" value="{{ old('dob', $identity->dob) }}" />
                                            @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!--Add email and contact fields similar to others-->
                                        <div class="col-md-6 fv-row mb-3">
                                            <label class="required fs-6 fw-semibold mb-2">Email</label>
                                            <input class="form-control form-control-solid" placeholder="" name="email"
                                                value="{{ old('email', $identity->email) }}" />
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 fv-row mb-3">
                                            <label class="required fs-6 fw-semibold mb-2">Contact Number</label>
                                            <input class="form-control form-control-solid" placeholder=""
                                                name="contact" value="{{ old('contact', $identity->contact) }}" />
                                            @error('contact')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <!--end::Input group-->

                                </div>
                                <!--end::Item-->
                                <!--begin::Action buttons-->
                                <div class="d-flex justify-content-end align-items-center mt-12">
                                    <!--begin::Button-->
                                    <a href="{{ route('profile.index') }}"
                                        class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                        <span class="indicator-label">Update Profile</span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--begin::Action buttons-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</x-base-layout>
