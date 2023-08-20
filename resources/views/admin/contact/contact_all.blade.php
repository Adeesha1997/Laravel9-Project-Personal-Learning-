@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-flud">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Contact Message All</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Contact Message All</h4><br>

                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                            role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 104px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">Serial Number
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 165px;"
                                                        aria-label="Position: activate to sort column ascending">Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 165px;"
                                                        aria-label="Position: activate to sort column ascending">Email
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 165px;"
                                                        aria-label="Position: activate to sort column ascending">Subject
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 165px;"
                                                        aria-label="Position: activate to sort column ascending">Phone
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1" style="width: 165px;"
                                                    aria-label="Position: activate to sort column ascending">Date
                                                </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 71px;"
                                                        aria-label="Office: activate to sort column ascending">Action</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php($i = 1)
                                                @foreach ($contacts as $item)
                                                    <tr class="odd">
                                                        <td class="sorting_1 dtr-control">{{ $i++ }}</td>
                                                        <td class="sorting_1 dtr-control">{{ $item->name }}</td>
                                                        <td class="sorting_1 dtr-control">{{ $item->email }}</td>
                                                        <td class="sorting_1 dtr-control">{{ $item->subject }}</td>
                                                        <td class="sorting_1 dtr-control">{{$item->phone }}</td>
                                                        <td class="sorting_1 dtr-control">{{$item->created_at }}</td>
                                                        <td>

                                                            <a href="{{ route('delete.message', $item->id) }}"
                                                                class="btn btn-danger sm" title="Delete Data"
                                                                id="delete"><i class="fas fa-trash-alt"></i></a>

                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
@endsection
