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
            <h3 class="fw-bolder m-0">{{ __('Update User') }} - {{ $userData->first_name }}</h3>
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
                                <form name="create_employee" action="{{ url('update_user', $userData->id) }}" method="POST"> 
                                    @csrf   
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="py-2" for="first_name">First Name*</label>
                                                <input type="text" class="form-control" id="first_name" aria-describedby="name" value="{{ $userData->first_name }}" name="first_name" placeholder="First Name">
                                                @error('first_name')
                                                    <span class="text-danger">please enter first name</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="py-2" for="last_name">Last Name*</label>
                                                <input type="text" class="form-control" id="last_name" aria-describedby="name" name="last_name" value="{{ $userData->last_name }}" placeholder="Last Name">
                                                @error('last_name')
                                                    <span class="error">Please enter last name</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="py-2" for="email">Email*</label>
                                                <input type="text" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email" value="{{ $userData->email }}" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="py-2" for="password">Password</label>
                                                <input type="password" class="form-control" id="password" aria-describedby="password" name="password" autocomplete="off">
                                                @error('password')
                                                    <span class="error">Please enter user password</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="py-2" for="role_id">User Role*</label>
                                            <select class="form-select" id="role_id" aria-label="Default select example" name="role_id">
                                                <!-- <option selected>-None-</option> -->
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ ($role->id==$userData->role_id)?'selected':'' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <span class="error">Please select user role</span>
                                            @enderror
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="py-2" for="email">Email*</label>
                                                <input type="text" class="form-control" id="email" aria-describedby="email" placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="py-2" for="phone">Phone*</label>
                                                <input type="text" class="form-control" id="name" aria-describedby="phone" placeholder="Enter phone">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="py-2" for="service">Service you need*</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>-None-</option>
                                                <option value="1">PEO</option>
                                                <option value="2">EOR</option>
                                                <option value="3">Subsidiary Formation</option>
                                                <option value="3">Guide Me</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="py-2" for="help">How can we help?*</label> 
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>    
                                        </div> -->
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
