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
            color: #1d0557;
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
                setTimeout(function () {
                    document.querySelector('.alert').remove();
                }, 3000); // Remove the alert after 3 seconds
            </script>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('Social Media') }}</h3>
            </div>



            <!--begin::Action-->

        </div>

        <!--begin::Card-->
        <div class="card m-5 p-4">

            <div class="row mb-5 mb-xl-10">
                <div class="d-flex align-items-center position-relative my-1 w-100">
                    <input type="text" data-kt-fundcategories-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search" id="mySearchInput" />
                    <a href="{{ theme()->getPageUrl('social_media.create') }}" class="btn btn-primary ms-auto"
                        style="padding: calc(0.775rem + 1px) calc(1.5rem + 1px) !important;">{{ __('Add Social Media') }}</a>
                </div>
            </div>

            <div class="table-responsive signing_fees">
                <table class="table dataTable " id="data-table">
                    <!-- begin::Table head -->
                    <thead>

                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                            <th class="min-w-175px text-center">Id</th>
                            <th class="min-w-175px text-center"> Name</th>
                            <th class="min-w-175px text-center">url</th>
                            <th class="min-w-175px text-center">Created&nbsp;At</th>
                            <th class="min-w-175px text-center">Updated&nbsp;At</th>
                            <th class="min-w-175px text-center">Action</th>
                        </tr>
                    </thead>
                    <!-- end::Table head -->
                    <!-- begin::Table body -->
                    <tbody>
                        @foreach ($socials as $social)
                            <tr>
                                <td class="p-2 pb-3 w-50px text-center">{{$social->id }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $social->name }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{$social->url }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $social->created_at }}</td>
                                <td class="p-2 pb-3 w-50px text-center">{{ $social->updated_at }}</td>
                                <td class="p-2 pb-3 text-center">
                                    <div class="d-flex justify-content-evenly gap-5">
                                        <a href="{{ route('social_media.edit', $social->id) }}"
                                            class="btn btn-light-primary font-weight-bold">
                                            View
                                        </a>
                                        <form action="{{ route('social_media.destroy', $social->id) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-light-danger font-weight-bold delete-btn">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!-- end::Table body -->
                </table>
            </div>

            <div class="row mt-5">
                <div class="col d-flex justify-content-start">
                    <form id="rowsPerPageForm" action="{{ route('social_media.index') }}" method="GET">
                        <select name="per_page" id="per_page" class="form-select"
                            onchange="document.getElementById('rowsPerPageForm').submit()">

                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="30" {{ $perPage == 30 ? 'selected' : '' }}>30</option>
                            <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </form>
                </div>
                <div class="col d-flex justify-content-end">
                    {{  $socials->appends(['per_page' => $perPage])->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
        <!-- end::Card body -->

    </div>
    <!-- end::Card -->
    </div>

    <script>
        document.getElementById('mySearchInput').addEventListener('keyup', function () {
            var searchValue = this.value.toLowerCase();
            var table = document.getElementById('data-table');
            var rows = table.getElementsByTagName('tr');

            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var rowText = '';
                for (var j = 0; j < cells.length; j++) {
                    rowText += cells[j].textContent.toLowerCase();
                }
                if (rowText.includes(searchValue)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    </script>

</x-base-layout>