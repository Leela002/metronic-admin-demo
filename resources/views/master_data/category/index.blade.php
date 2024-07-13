<x-base-layout>
    <style>
   .btn-light-primary{
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
            color: #1d0557; /* Text color for th */
            padding: 1rem 2rem; /* Padding for th */
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
        .table > :not(:last-child) > :last-child > * {
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
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('Category') }}</h3>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ theme()->getPageUrl('create_category') }}" class="btn btn-primary align-self-center" style="padding: calc(0.775rem + 1px) calc(1.5rem + 1px) !important;">{{ __('Add Category') }}</a>
            </div>
        </div>

        <!--begin::Card-->
        <div class="card m-5 p-4">

            <div class="row mb-xl-3">
                <div class="d-flex align-items-center position-relative my-1 w-100">
                    <input type="text" class="form-control form-control-solid w-200px ps-13" placeholder="Search" id="mySearchInput" />
                </div>
            </div>

            <div class="table-responsive signing_fees">
                <table class="table dataTable " id="data-table">
                    <!-- begin::Table head -->
                    <thead>

                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                        <th class="min-w-175px text-center">Id</th>
                            <th class="min-w-175px text-center">Category Name</th>
                            <th class="min-w-175px text-center">Status</th>                         
                            <th class="min-w-175px text-center">Created&nbsp;At</th>
                            <th class="min-w-175px text-center">Updated&nbsp;At</th>
                            <th class="min-w-175px text-center">Created&nbsp;By</th>
                            <th class="min-w-175px text-center">Updated&nbsp;By</th>
                            <th class="min-w-175px text-center">Action</th>
                        </tr>
                    </thead>
                    <!-- end::Table head -->
                    <!-- begin::Table body -->
                    <tbody class="fixed">
                    @foreach($categories as $category)
                                        <tr>
                                        <td class="p-0 pb-3 w-50px text-center">{{$category->id}}</td>
                                            <td class="p-0 pb-3 w-50px text-center">{{$category->category_name }}</td>
                                            <td class="p-0 pb-3 w-50px text-center">{{$category->status }}</td>
                                            <td class="p-0 pb-3 w-50px text-center">{{$category->created_at}}</td>
                                            <td class="p-0 pb-3 w-50px text-center">{{$category->updated_at}}</td>
                                            <td class="p-0 pb-3 w-50px text-center">{{$category->created_by}}</td>
                                            @if ($category->updated_by == null)
                                                <td class="p-0 pb-3 w-50px text-center">-</td>
                                            @else
                                                <td class="p-0 pb-3 w-50px text-center">{{ $category->updated_by }}</td>
                                            @endif
                                            <td class="p-0 pb-3 w-50px text-center">
                                <div class="d-flex justify-content-around">
                                <a href="{{ route('edit_category', $category->id) }}" class="btn btn-light-primary font-weight-bold mr-2"> View </a>
                                <a href="javascript:void(0)" data-id="{{ $category->id }}"class="btn btn-light-danger font-weight-bold delete-btn">Delete</a>
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
        <!-- end::Card body -->
    </div>
    <!-- end::Card -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('mySearchInput').addEventListener('keyup', function() {
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

        $(document).ready(function() {
        $('.delete-btn').click(function() {
            var categoryId = $(this).data('id');
            var $row = $(this).closest('tr');

            if (confirm('Are you sure to delete this record?')) {
                $.ajax({
                    url: "{{ route('category.destroy', '') }}/" + categoryId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.success) {
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
    
</x-base-layout>