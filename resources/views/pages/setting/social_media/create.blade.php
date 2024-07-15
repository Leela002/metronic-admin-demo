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
                <h3 class="fw-bolder m-0">{{ __('Add Social Media') }}</h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body pt-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <div class="card-body p-9">
                                <form name="create_employee" action="{{ route('social_media.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="py-2">
                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2"> Name</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="name" value="{{ old('name') }}" />
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">URL</label>
                                                <input class="form-control form-control-solid" placeholder="" name="url"
                                                    value="{{ old('url') }}" />
                                                @error('url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row">
                                                <div class="custom-file">
                                                    <label class="required fs-6 fw-semibold mb-2">Upload Icon</label>
                                                    <input type="file" accept="image/*"
                                                        class="form-control form-control-solid custom-file-input"
                                                        name="icon" placeholder="" id="customFile"
                                                        value="{{ old('icon') }}" />
                                                    @error('icon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>



                                        <div class="d-flex justify-content-end align-items-center mt-12">
                                            <a href="{{ route('social_media.index') }}"
                                                class="btn btn-secondary me-5 px-4 m-2">Cancel</a>
                                            <button type="submit" class="btn btn-primary" id="kt_client_submit">
                                                <span class="indicator-label">Submit</span>
                                            </button>
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