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
                <h3 class="fw-bolder m-0">{{ __('Update Parameter') }}</h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body pt-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <div class="card-body p-9">
                                <form name="create_employee" action="{{ url('update_parameter', $identity->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="py-2">
                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Parameter Name</label>
                                                <input class="form-control form-control-solid" name="parameter_name" value="{{ old('parameter_name', $identity->parameter_name) }}" />
                                                @error('parameter_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Help Text</label>
                                                <input class="form-control form-control-solid" name="help_text" value="{{ old('help_text', $identity->help_text) }}" />
                                                @error('help_text')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Slug</label>
                                                <input class="form-control form-control-solid" name="slug" value="{{ old('slug', $identity->slug) }}" />
                                                @error('slug')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Type</label>
                                                <select class="form-select form-select-solid" name="type">
                                                    <option value="0" {{ old('type', $identity->type) == 0 ? 'selected' : '' }}>Text</option>
                                                    <option value="1" {{ old('type', $identity->type) == 1 ? 'selected' : '' }}>Boolean</option>
                                                </select>
                                                @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Value</label>
                                                <small>(For Boolean type enter 0 or 1)</small>
                                                <input class="form-control form-control-solid" name="value" value="{{ old('value', $identity->value) }}" />
                                                @error('value')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-12">
                                            <!--begin::Button-->
                                            <a href="{{ route('parameter.index') }}" class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                                <span class="indicator-label">Update</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
