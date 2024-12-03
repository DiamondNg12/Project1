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
                                    <label for="baseInput" class="form-label">Mã lớp học</label>
                                    <input type="text" name="input" class="form-control" id="baseInput">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput1" class="form-label">Tên lớp học</label>
                                    <input type="text" name="input1" class="form-control" id="baseInput1">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput4" class="form-label">Khoa</label>
                                    <input type="text" name="input4" class="form-control" id="baseInput4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput4" class="form-label">Khoá</label>
                                    <input type="text" name="input4" class="form-control" id="baseInput4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput10" class="form-label">Cố vấn học tập</label>
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
                            <h5 class="card-title">Danh sách lớp cơ sở</h5>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn btn-sm btn-primary" id="create-new-btn" role="button">Thêm lớp học</a>
                       </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã lớp học</th>
                                        <th>Tên lớp học</th>
                                        <th>Khoa</th> 
                                        <th>Khoá</th> 
                                        <th>Cố vấn học tập</th> 
                                        <th>Thao tác</th>
                                        
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                @foreach ($lop_hoc_co_sos as $lop_hoc_co_so)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $lop_hoc_co_so->ma_lop_hoc }}</td>
                                            <td>{{ $lop_hoc_co_so->ten_lop_hoc }}</td>
                                            <td>{{ $lop_hoc_co_so->khoaDaoTao->ten_khoa_dao_tao }}</td>
                                            <td>{{ $lop_hoc_co_so->khoaHoc->ten_khoa_hoc }}</td>
                                            <td>{{ $lop_hoc_co_so->co_van_hoc_tap }}</td>
                                           <td>
                                            @php
                                                    $data_object = json_encode($lop_hoc_co_so);
                                                @endphp
                                                <a href="#" data-object="{{ $data_object }}" class="btn btn-sm btn-primary edit-button" 
                                                role="button">Chỉnh sửa</a>
                                                <a href="#" data-id="{{ $lop_hoc_co_so->id }}"
                                                    data-name="{{ $lop_hoc_co_so->ten_lop_hoc }}"
                                                    class="btn btn-sm btn-danger delete-btn" role="button">Xoá</a>
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
    </div>

    <div class="modal fade" id="createNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo lớp học mới</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lop-hoc-co-so.store') }}" method="POST" id="form-create">
                        @csrf
                        <div class="mb-3">
                            <label for="ma_lop_hoc" class="form-label">Mã lớp học</label>
                            <input type="text" class="form-control" id="ma_lop_hoc" name="ma_lop_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="ten_lop_hoc" class="form-label">Tên lớp học</label>
                            <input type="text" class="form-control" id="ten_lop_hoc" name="ten_lop_hoc">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect2">Khoa</label>
                            <select class="form-select" id="exampleFormControlSelect2" name="ma_khoa_dao_tao_id">
                            <option selected="" disabled="">Chọn Khoa</option>
                            @foreach ($khoa_dao_taos as $khoa_dao_tao)
                            <option value="{{ $khoa_dao_tao->id }}">{{ $khoa_dao_tao->ten_khoa_dao_tao }}</option>
                             @endforeach
                            </select>
                        </div> 
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect2">Khóa</label>
                            <select class="form-select" id="exampleFormControlSelect2" name="ma_khoa_hoc_id">
                            <option selected="" disabled="">Chọn khóa học</option>
                            @foreach ($khoa_hocs as $khoa_hoc)
                            <option value="{{ $khoa_hoc->id }}">{{ $khoa_hoc->ten_khoa_hoc }}</option>
                             @endforeach
                            </select>
                        </div> 
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect3">Cố vấn học tập</label>
                            <select class="form-select" id="exampleFormControlSelect3" name="co_van_hoc_tap">
                            <option selected="" disabled="">Chọn cố vấn</option>
                            @foreach ($co_van_hoc_tap as $user)
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
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa lớp học</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lop-hoc-co-so.update', ['lop_hoc_co_so' => 0]) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="ma_lop_hoc" class="form-label">Mã lớp học</label>
                            <input type="text" class="form-control" id="ma_lop_hoc" name="ma_lop_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="ten_lop_hoc" class="form-label">Tên lớp học</label>
                            <input type="text" class="form-control" id="ten_lop_hoc" name="ten_lop_hoc">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect2">Cố vấn học tập</label>
                            <select class="form-select" id="exampleFormControlSelect2" name="co_van_hoc_tap">
                            <option selected="" disabled="">Chọn cố vấn</option>
                            @foreach ($co_van_hoc_tap as $user)
                                <option value="{{ $user->id }}">{{ $user->user_type }}</option>
                                 @endforeach    
                            </select>
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect1">Tên khoa đào tạo</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="ma_khoa_dao_tao_id">
                            <option selected="" disabled="">Chọn Tên khoa</option>
                            @foreach ($khoa_dao_taos as $khoa_dao_tao)
                            <option value="{{ $khoa_dao_tao->id }}">{{ $khoa_dao_tao->ten_khoa_dao_tao }}</option>
                             @endforeach
                            </select>
                        </div> 

                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect1">Tên khoá học</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="ma_khoa_hoc_id">
                            <option selected="" disabled="">Chọn khoá học</option>
                            @foreach ($khoa_hocs as $khoa_hoc)
                            <option value="{{ $khoa_hoc->id }}">{{ $khoa_hoc->ten_khoa_hoc }}</option>
                             @endforeach
                            </select>
                        </div> 
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
                    <h5 class="modal-title" id="deleteModalLabel">Xoá lớp học </h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('lop-hoc-co-so.destroy', ['lop_hoc_co_so' => 0]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <h3 id="delete_title">Xác nhận xoá lớp học: </h3>
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
            $('#editModal form').attr('action', '/lop-hoc-co-so/' + update_id);
            $('#editModal #ma_lop_hoc').val(data.ma_lop_hoc);
            $('#editModal #ten_lop_hoc').val(data.ten_lop_hoc);
            $('#editModal #co_van_hoc_tap').val(data.co_van_hoc_tap);    
            $('#exampleFormControlSelect2 option[value="' + data.co_van_hoc_tap + '"]').prop('selected', true);       
            $('#editModal #ma_khoa_dao_tao_id').val(data.ma_khoa_dao_tao_id);           
            $('#exampleFormControlSelect1 option[value="' + data.ma_khoa_dao_tao_id + '"]').prop('selected', true);
            $('#editModal #ma_khoa_hoc_id').val(data.ma_khoa_hoc_id);           
            $('#exampleFormControlSelect1 option[value="' + data.ma_khoa_hoc_id + '"]').prop('selected', true);
            $('#editModal').modal('show');
        });
        $('#submit-update-btn').on('click', function() {
            $('#editModal form').submit();
        });
        $('.delete-btn').on('click', function() {
            delete_id = $(this).data('id');
            $('#delete_title').text('Xác nhận xoá lớp học : ' + $(this).data('name'));
            $('#deleteModal form').attr('action', '/lop-hoc-co-so/' + delete_id);
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
