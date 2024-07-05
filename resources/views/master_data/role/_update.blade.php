<x-base-layout>
<style>
    .error
    {
        color:#f00!important;
    }
</style>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>        
    @endif
    @if (Session::has('danger'))
    <div class="alert alert-danger">{{ Session::get('danger') }}</div>
    @endif
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{ __('Update User') }} - {{ $role->name }}</h3>
        </div>
        <!--end::Card title-->
    </div>

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-6">
            <div class="row">
                <!-- <div class="col-md-2"></div> -->
                        <div class="col-md-12">
                            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                                <!--begin::Card body-->
                                <div class="card-body p-9">
                                <form name="create_employee" action="{{ url('update_role', $role->id) }}" method="POST"> 
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
                                                    <input class="form-control form-control-solid" placeholder="" name="name" value="{{ old('first_name') }}" />
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                              
                                    </div>
                                 
                                </div>
                                <!--end::Input group-->
                                     
                                </div>
                                <!--end::Input group-->
                                       
                                        
                                        <div class="col-md-12">
                                            <div class="float-end mt-3">
                                                <!-- <button type="button" class="btn btn-sm btn-light me-3">Reset</button> -->
                                                <button type="submit"  class="btn btn-sm btn-primary me-3">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>    
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                <!-- <div class="col-md-2"></div> -->
                </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    </div>
</x-base-layout>
