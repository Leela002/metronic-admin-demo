<x-base-layout>
    <style>
        .error {
            color: #f00 !important;
        }
    </style>
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('danger'))
            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
        <div class="card-header">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('Add Parameter') }}</h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body pt-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <div class="card-body p-9">
                                <form name="create_employee" action="{{ route('add_role') }}" method="POST">
                                    @csrf
                                    <!--begin::Item-->
                                    <div class="py-2">
                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-7">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->

                                                <!--First Name-->
                                                <label class="required fs-6 fw-semibold mb-2">Role</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="name" value="{{ old('first_name') }}" />
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                            <label>
                                                <h5>Assign Permission</h5>
                                            </label>
                                            <hr>
                                            <div class="col-lg-12">
                                                @foreach ($permission_groups as $group => $permissions)
                                                    <div class="col-lg-12">
                                                        <div class="row kt-checkbox-inline">
                                                            <div class="col-md-4">
                                                                <label>
                                                                    <h6>{{$group}}</h6>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @foreach ($permissions as $permission)
                                                                    <label
                                                                        class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                                        {{Form::checkbox('permissions[]', $permission->id) }}
                                                                        {{Form::label($permission->tag, ucfirst($permission->tag)) }}<br>
                                                                        <span></span>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <!--end::Input group-->

                            </div>
                            <!--end::Item-->
                            <!--begin::Action buttons-->
                            <div class="d-flex justify-content-end align-items-center mt-12">
                                <!--begin::Button-->
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                    <span class="indicator-label">submit</span>
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
    </div>
</x-base-layout>