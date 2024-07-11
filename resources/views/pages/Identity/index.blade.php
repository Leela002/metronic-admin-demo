<x-base-layout>
    <style>
        .btn-light-primary {
            margin-left: 20px;
        }

        .btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon) {
            margin-right: 20px !important;
        }

        .dataTable tbody tr td {
            padding: 0;
            text-align: center !important;
        }

        .pb-3 {
            padding-top: 0.75rem !important;
        }

        .min-w-175px {
            min-width: 100px !important;
        }

        table.dataTable>thead>tr>th:not(.sorting_disabled) {
            padding-right: 0;
            padding-left: 0;
            color: gray;
            /* Text color for th */
            padding: 1rem 2rem;
            /* Padding for th */
        }

        div.dataTables_wrapper div.dt-buttons {
            float: right;
        }

        .btn.btn-secondary {
            background-color: white !important;
        }

        .btn.btn-secondary:hover:not(.btn-active) {
            color: #ffffff;
            background-color: #1c0e40 !important;
        }

        ul.pagination {
            float: right;
        }

        .excel-btn {
            float: inline-end;
            margin: -28px !important;
        }

        /* Add border to td */
        table.dataTable th,
        table.dataTable td {
            border: 1px solid #EBEDF3;
        }

        .table> :not(:last-child)> :last-child>* {
            border-bottom-color: #EBEDF3;
        }
    </style>

    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            <script>
                setTimeout(function() {
                    document.querySelector('.alert').remove();
                }, 3000); // Remove the alert after 3 seconds
            </script>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('Customer') }}</h3>
            </div>
            <!--end::Card title-->

            <!--begin::Action-->
            <a href="{{ route('profile.create') }}" class="btn btn-primary align-self-center"
                style="padding: calc(0.775rem + 1px) calc(1.5rem + 1px) !important;">{{ __('Add Customer') }}</a>
            <!--end::Action -->
        </div>

        <!--begin::Card-->
        <div class="card m-5 p-4">
            <div class="card-body ">

            </div>
            <div class="table-responsive signing_fees">
                <table class="table dataTable" id="data-table">
                    <!-- begin::Table head -->
                    <thead>
                        <tr class="fs-7 fw-bold text-gray-400">
                            <th class="p-2 min-w-175px text-center">Id</th>
                            <th class="p-2 min-w-175px text-center">Name</th>
                            <th class="p-2 min-w-175px text-center">Email</th>
                            <th class="p-2 min-w-175px text-center">Mobile</th>
                            <th class="p-2 min-w-175px text-center">Gender</th>
                            <th class="p-2 min-w-175px text-center">Blood&nbsp;Group</th>
                            <th class="p-2 min-w-175px text-center">DOB</th>
                            <th class="p-2 min-w-175px text-center">Created at</th>
                            <th class="p-2 min-w-175px text-center">Updated at</th>
                            <th class="p-2 min-w-175px text-center">Created by</th>
                            <th class="p-2 min-w-175px text-center">Updated by</th>
                            <th class="p-2 min-w-175px text-center">Action</th>
                        </tr>
                    </thead>
                    <!-- end::Table head -->
                    <!-- begin::Table body -->
                    <tbody >
                        @foreach ($identities as $identity)
                            <tr>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->id }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->first_name }}
                                    {{ $identity->last_name }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->email }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->contact }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->gender }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->blood_group }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->dob }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->created_at }}</td>
                                @if ($identity->updated_at == $identity->created_at)
                                    <td class="p-2 pb-3 w-50px text-center">Not updated</td>
                                @else
                                    <td class="p-2 pb-3 w-50px text-center">{{ $identity->updated_at }}</td>
                                @endif
                                <td class="p-2 pb-3 w-50px text-center">{{ $identity->created_by }}</td>
                                @if ($identity->updated_by == null)
                                    <td class="p-2 pb-3 w-50px text-center">Not updated</td>
                                @else
                                    <td class="p-2 pb-3 w-50px text-center">{{ $identity->updated_by }}</td>
                                @endif
                                <td class="p-2 pb-3 w-50px text-center">
                                    <div class="d-flex justify-content-around">
                                        <a href="{{ route('profile.edit', $identity->id) }}"
                                            class="btn btn-light-primary font-weight-bold">
                                            View
                                        </a>
                                        <a href="javascript:void(0)" data-id="{{ $identity->id }}" class="btn btn-light-danger font-weight-bold delete-btn">Delete</a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <!-- end::Table body -->
                </table>
            </div>
        </div>
        <!-- end::Card body -->
    </div>
    <!-- end::Card -->
    </div>

</x-base-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var identityId = $(this).data('id');
            var $row = $(this).closest('tr');

            if(confirm('Are you sure to delete this record?')) {
                $.ajax({
                    url: "{{ route('profile.destroy', '') }}/" + identityId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if(response.success) {
                            $row.remove();
                            alert('Record deleted successfully.');
                        } else {
                            alert('Failed to delete the record.');
                        }
                    },
                    error: function(response) {
                        alert('Failed to delete the record.');
                    }
                });
            }
        });
    });
</script>
