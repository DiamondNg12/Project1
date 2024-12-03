<x-app-layout>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Bộ lọc</h5>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput" class="form-label">Input</label>
                                    <input type="text" name="input" class="form-control" id="baseInput">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput1" class="form-label">Input1</label>
                                    <input type="text" name="input1" class="form-control" id="baseInput1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <button type="button" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Danh sách lớp học phần</h5>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Mã lớp</th>
                                        <th>Tên lớp</th>
                                        <th>Môn học</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Phòng học</th>
                                        <th>Giảng viên</th>
                                        <th>Đã đăng kí</th>
                                        <th>Tối đa</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $row->ma_lop_hoc_phan }}</td>
                                            <td>{{ $row->ten_lop_hoc_phan }}</td>
                                            <td>{{ $row->monHoc->ten_mon_hoc }}</td>
                                            <td>{{ $row->ngay_bat_dau }}
                                            </td>
                                            <td>{{ $row->ngay_ket_thuc }}
                                            </td>
                                            <td>{{ $row->dia_diem_hoc }}</td>
                                            <td>{{ $row->giangVien->ho_ten }}</td>
                                            <td>{{ $row->numberStudentRegisterd }}</td>
                                            <td>{{ $row->sv_toi_da }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary register_button" role="button">Đăng kí</a>
                                                {{-- <a href="#" class="btn btn-sm btn-danger exampleModalBtn"
                                                    role="button">Delete</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="confirmLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmLabel">Modal title</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('.register_button').on('click', function() {
            console.log('click');
            event.preventDefault()
            $('#confirm_modal').modal('show');
        });

        $('.close-modal').on('click', function() {
            $('#confirm_modal').modal('hide');
        });
    </script>
</x-app-layout>
