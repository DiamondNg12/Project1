    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h5 class="card-title">Danh sách sinh viên</h5>
                </div>
                {{-- <div class="card-action">
                    <a href="http://localhost/users/create" class="btn btn-sm btn-primary" role="button">Add
                        User</a>
                </div> --}}
            </div>
            <div class="card-body px-0">
                <div class="table-responsive" id="dataTableContainer">
                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Họ tên</th>
                                <th>Mã sinh viên</th>
                            </tr>
                        </thead>
                        @php
                            $key = 1;
                        @endphp
                        <tbody>
                            @foreach ($registered_list as $single_register)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $single_register->student->ho_ten }}</td>
                                    <td>{{ $single_register->student->ma_student }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
