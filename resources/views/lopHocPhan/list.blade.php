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
                                    <label for="baseInput" class="form-label">Mã lớp học phần</label>
                                    <input type="text" name="input" class="form-control" id="baseInput">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput1" class="form-label">Tên lớp học phần</label>
                                    <input type="text" name="input1" class="form-control" id="baseInput1">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput4" class="form-label">Địa điểm học</label>
                                    <input type="text" name="input4" class="form-control" id="baseInput4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput5" class="form-label">Học kì</label>
                                    <input type="text" name="input5" class="form-control" id="baseInput5">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput6" class="form-label">Đợt học</label>
                                    <input type="text" name="input6" class="form-control" id="baseInput6">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput7" class="form-label">Tên môn học</label>
                                    <input type="text" name="input7" class="form-control" id="baseInput7">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput8" class="form-label">Khoá học</label>
                                    <input type="text" name="input8" class="form-control" id="baseInput8">
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput10" class="form-label">Giảng viên đứng lớp</label>
                                    <input type="text" name="input10" class="form-control" id="baseInput10">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <button type="button" class="btn btn-primary">Tìm kiếm</button>
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
                            <h5 class="card-title">Danh sách môn học</h5>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn btn-sm btn-primary" id="create-new-btn" role="button">Thêm môn học</a>
                       </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã lớp học phần</th>
                                        <th>Tên lớp học phần</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Địa điểm học</th>
                                        <th>Học kì</th>
                                        <th>Đợt học</th>
                                        <th>Tên môn học</th>
                                        <th>Khoá học</th>  
                                        <th>Sinh viên tối đa</th> 
                                        <th>Giảng viên đứng lớp</th> 
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                @foreach ($lop_hoc_phans as $lop_hoc_phan)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $lop_hoc_phan->ma_lop_hoc_phan }}</td>
                                            <td>{{ $lop_hoc_phan->ten_lop_hoc_phan }}</td>
                                            <td>{{ $lop_hoc_phan->ngay_bat_dau }}</td>
                                            <td>{{ $lop_hoc_phan->ngay_ket_thuc }}</td>
                                            <td>{{ $lop_hoc_phan->dia_diem_hoc }}</td>
                                            <td>{{ $lop_hoc_phan->hoc_ki }}</td>
                                            <td>{{ $lop_hoc_phan->dot_hoc }}</td>
                                            <td>{{ $lop_hoc_phan->monHoc->ten_mon_hoc }}</td>
                                            <td>{{ $lop_hoc_phan->khoaHoc->ten_khoa_hoc }}</td>
                                            <td>{{ $lop_hoc_phan->sv_toi_da }}</td>
                                            <td>{{ $lop_hoc_phan->giang_vien }}</td>
                                            <td>
                                            @php
                                                    $data_object = json_encode($lop_hoc_phan);
                                                @endphp
                                                <a href="#" data-object="{{ $data_object }}" class="btn btn-sm btn-primary edit-button" 
                                                role="button">Chỉnh sửa</a>
                                            
                                               
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

   

<script>
    $('#create-new-btn').on('click', function() {
        $('#createNewModal').modal('show');
    });
    $('#submit-btn').on('click', function() {
        console.log('Button clicked');
        $('#form-create').submit();
    });
    $('.close-modal').on('click', function() {
        $('#createNewModal').modal('hide');
        $('#editModal').modal('hide');
        $('#deleteModal').modal('hide');
    });
</script>
</x-app-layout>
