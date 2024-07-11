<x-base-layout>
    <style>
        /* .btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon){
            margin-right: 15px !important;
        } */
        .dataTable tbody tr td {
            padding: 0;
        }

        .card .card-header {
            min-height: 55px !important;
        }
    </style>
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('danger'))
            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0 mb-3">
                <div class="float-end mt-3 d-flex align-items-center">

                    <h3 class="fw-bolder m-0 ms-5">{{ __('Users') }}</h3>
                </div>
            </div>
            <!--end::Card title-->

            <!--begin::Action-->
            <a href="{{ theme()->getPageUrl('create_user') }}" class="btn btn-primary align-self-center"
                style="padding: calc(0.775rem + 1px) calc(1.5rem + 1px) !important;">{{ __('Add User') }}</a>
            <!--end::Action -->
        </div>
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="table-responsive signing_fees">
                    <table class="table dataTable " id="data-table">
                        <!-- begin::Table head -->
                        <thead>

                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                <th class="min-w-175px text-center">Id</th>
                                <th class="min-w-175px text-center"> First&nbsp;Name</th>
                                <th class="min-w-175px text-center">Last&nbsp;Name</th>
                                <th class="min-w-175px text-center">Email</th>
                                <th class="min-w-175px text-center">Role</th>
                                <th class="min-w-175px text-center">Created&nbsp;at</th>
                                <!-- <th class="min-w-175px text-center">Updated&nbsp;at</th> -->
                                <th class="min-w-175px text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- end::Table head -->
                        <!-- begin::Table body -->
                        <tbody class="fixed">
                            @foreach($users as $user)
                                <tr>
                                    <td class="p-0 pb-3 w-50px text-center">{{$user->id}}</td>
                                    <td class="p-0 pb-3 w-50px text-center">{{$user->first_name }}</td>
                                    <td class="p-0 pb-3 w-50px text-center">{{$user->last_name }}</td>
                                    <td class="p-0 pb-3 w-50px text-center">{{$user->email}}</td>
                                    <td class="p-0 pb-3 w-50px text-center">{{$user->role_id}}</td>
                                    <td class="p-0 pb-3 w-50px text-center">{{$user->created_at}}</td>
                                    <td class="p-0 pb-3 w-50px text-center">
                                        <div class="d-flex justify-content-around">
                                            <a href="{{ route('edit_user', $user->id) }}"
                                                class="btn btn-light-primary font-weight-bold mr-2"> View </a>

                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light-danger font-weight-bold mr-2"
                                                    onclick="return confirm('Are you sure to delete this record?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!-- end::Table body -->
                    </table>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
</x-base-layout>