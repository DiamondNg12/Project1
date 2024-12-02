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
                            <h5 class="card-title">Danh sách lớp học phần</h5>
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
                                            <td>{{ $lop_hoc_phan->sv_toi_da }}</td>
                                            <td>{{ $lop_hoc_phan->giang_vien}}</td>
                                            <td>
                                            @php
                                                    $data_object = json_encode($lop_hoc_phan);
                                                @endphp
                                                <a href="#" data-object="{{ $data_object }}" class="btn btn-sm btn-primary edit-button" 
                                                role="button">Chỉnh sửa</a>
                                                <a href="#" data-id="{{ $lop_hoc_phan->id }}"
                                                    data-name="{{ $lop_hoc_phan->ten_lop_hoc_phan }}"
                                                    class="btn btn-sm btn-danger delete-btn" role="button">Xoá</a>
                                            </td>
                                               
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

    <div class="modal fade" id="createNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo lớp học phần mới</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lop-hoc-phan.store') }}" method="POST" id="form-create">
                        @csrf
                        <div class="mb-3">
                            <label for="ma_lop_hoc_phan" class="form-label">Mã lớp học phần</label>
                            <input type="text" class="form-control" id="ma_lop_hoc_phan" name="ma_lop_hoc_phan">
                        </div>
                        <div class="mb-3">
                            <label for="ten_lop_hoc_phan" class="form-label">Tên lớp học phần</label>
                            <input type="text" class="form-control" id="ten_lop_hoc_phan" name="ten_lop_hoc_phan">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc">
                        </div>
                        <div class="mb-3">
                            <label for="dia_diem_hoc" class="form-label">Địa điểm học</label>
                            <input type="text" class="form-control" id="dia_diem_hoc" name="dia_diem_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="hoc_ki" class="form-label">Học kì</label>
                            <input type="text" class="form-control" id="hoc_ki" name="hoc_ki">
                        </div>
                        <div class="mb-3">
                            <label for="dot_hoc" class="form-label">Đợt học</label>
                            <input type="text" class="form-control" id="dot_hoc" name="dot_hoc">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect1">Tên môn học</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="ma_mon_hoc_id">
                            <option selected="" disabled="">Chọn Tên môn học</option>
                            @foreach ($mon_hocs as $mon_hoc)
                            <option value="{{ $mon_hoc->id }}">{{ $mon_hoc->ten_mon_hoc }}</option>
                             @endforeach
                            </select>
                        </div> 
                        <div class="mb-3">
                            <label for="sv_toi_da" class="form-label">Sinh viên tối đa</label>
                            <input type="text" class="form-control" id="sv_toi_da" name="sv_toi_da">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect1">Giảng viên đứng lớp</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="giang_vien">
                            <option selected="" disabled="">Chọn giảng viên</option>
                            @foreach ($giang_vien as $user)
                                <option value="{{ $user->id }}">{{ $user->user_type }}</option>
                                 @endforeach    
                            </select>
                        </div> 
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Huỷ bỏ</button>
                    <button type="button" class="btn btn-primary" id="submit-btn">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa lớp học phần</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lop-hoc-phan.update', ['lop_hoc_phan' => 0]) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="ma_lop_hoc_phan" class="form-label">Mã lớp học phần</label>
                            <input type="text" class="form-control" id="ma_lop_hoc_phan" name="ma_lop_hoc_phan">
                        </div>
                        <div class="mb-3">
                            <label for="ten_lop_hoc_phan" class="form-label">Tên lớp học phần</label>
                            <input type="text" class="form-control" id="ten_lop_hoc_phan" name="ten_lop_hoc_phan">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc">
                        </div>
                        <div class="mb-3">
                            <label for="dia_diem_hoc" class="form-label">Địa điểm học</label>
                            <input type="text" class="form-control" id="dia_diem_hoc" name="dia_diem_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="hoc_ki" class="form-label">Học kì</label>
                            <input type="text" class="form-control" id="hoc_ki" name="hoc_ki">
                        </div>
                        <div class="mb-3">
                            <label for="dot_hoc" class="form-label">Đợt học</label>
                            <input type="text" class="form-control" id="dot_hoc" name="dot_hoc">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect1">Tên môn học</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="ma_mon_hoc_id">
                            <option selected="" disabled="">Chọn Tên môn học</option>
                            @foreach ($mon_hocs as $mon_hoc)
                            <option value="{{ $mon_hoc->id }}">{{ $mon_hoc->ten_mon_hoc }}</option>
                             @endforeach
                            </select>
                        </div> 
                        <div class="mb-3">
                            <label for="sv_toi_da" class="form-label">Sinh viên tối đa</label>
                            <input type="text" class="form-control" id="sv_toi_da" name="sv_toi_da">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect2">Giảng viên đứng lớp</label>
                            <select class="form-select" id="exampleFormControlSelect2" name="giang_vien">
                            <option selected="" disabled="">Chọn giảng viên</option>
                            @foreach ($giang_vien as $user)
                                <option value="{{ $user->id }}">{{ $user->user_type }}</option>
                                 @endforeach    
                            </select>
                        </div> 
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Huỷ
                        bỏ</button>
                    <button type="button" class="btn btn-primary" id="submit-update-btn">Chỉnh sửa</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xoá lớp học phần</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('lop-hoc-phan.destroy', ['lop_hoc_phan' => 0]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <h3 id="delete_title">Xác nhận xoá lớp học phần: </h3>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Huỷ</button>
                    <button type="button" id="delete-submit-btn" class="btn btn-primary">Xoá</button>
                </div>
            </div>
        </div>
    </div>


<script>
    var update_id = 0;
    var delete_id = 0;
    $('#create-new-btn').on('click', function() {
        $('#createNewModal').modal('show');
    });
    $('#submit-btn').on('click', function() {
        console.log('Button clicked');
        $('#form-create').submit();
    });
    $('.edit-button').on('click', function() {
            data = $(this).data('object');
            update_id = data.id;
            $('#editModal form').attr('action', '/lop-hoc-phan/' + update_id);
            $('#editModal #ma_lop_hoc_phan').val(data.ma_lop_hoc_phan);
            $('#editModal #ten_lop_hoc_phan').val(data.ten_lop_hoc_phan);
            $('#editModal #ngay_bat_dau').val(data.ngay_bat_dau);
            $('#editModal #ngay_ket_thuc').val(data.ngay_ket_thuc);  
            $('#editModal #dia_diem_hoc').val(data.dia_diem_hoc);
            $('#editModal #hoc_ki').val(data.hoc_ki);
            $('#editModal #dot_hoc').val(data.dot_hoc);
            $('#editModal #ma_mon_hoc_id').val(data.ma_mon_hoc_id);           
            $('#exampleFormControlSelect1 option[value="' + data.ma_mon_hoc_id + '"]').prop('selected', true);
            $('#editModal #sv_toi_da').val(data.sv_toi_da);
            $('#editModal #giang_vien').val(data.giang_vien);           
            $('#exampleFormControlSelect2 option[value="' + data.giang_vien + '"]').prop('selected', true);
            $('#editModal').modal('show');
        });
        $('#submit-update-btn').on('click', function() {
            $('#editModal form').submit();
        });
        $('.delete-btn').on('click', function() {
            delete_id = $(this).data('id');
            $('#delete_title').text('Xác nhận lớp học phần : ' + $(this).data('name'));
            $('#deleteModal form').attr('action', '/lop-hoc-phan/' + delete_id);
            $('#deleteModal').modal('show');
        });

        $('#delete-submit-btn').on('click', function() {
            $('#deleteModal form').submit();
        });
    $('.close-modal').on('click', function() {
        $('#createNewModal').modal('hide');
        $('#editModal').modal('hide');
        $('#deleteModal').modal('hide');
    });
</script>
</x-app-layout>
