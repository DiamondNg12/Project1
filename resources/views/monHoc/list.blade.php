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
                    <div class="card-body px-4">
                    <form method="GET" action="{{ route('mon-hoc.index') }}">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="ten_mon_hoc" class="form-control" placeholder="Tên môn học"
                                    value="{{ request('ten_mon_hoc') }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="ten_khoa_dao_tao" class="form-control" placeholder="Tên khoa đào tạo"
                                    value="{{ request('ten_khoa_dao_tao') }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>

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
                                        <th>ID</th>
                                        <th>Mã môn học</th>
                                        <th>Tên môn học</th>
                                        <th>Số tín chỉ</th>
                                        <th>Khoa đào tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                    @foreach ($mon_hocs as $mon_hoc)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $mon_hoc->ma_mon_hoc }}</td>
                                            <td>{{ $mon_hoc->ten_mon_hoc }}</td>
                                            <td>{{ $mon_hoc->so_tin_chi }}</td>
                                            <td>{{$mon_hoc->khoaDaoTao->ten_khoa_dao_tao}}</td>
                                            <td>
                                            @php
                                                    $data_object = json_encode($mon_hoc);
                                                @endphp
                                                <a href="#" data-object="{{ $data_object }}" class="btn btn-sm btn-primary edit-button" 
                                                role="button">Chỉnh sửa</a>
                                            
                                                <a href="#" data-id="{{ $mon_hoc->id }}"
                                                    data-name="{{ $mon_hoc->ten_mon_hoc }}"
                                                    class="btn btn-sm btn-danger delete-btn" role="button">Xoá</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã môn học</th>
                                        <th>Tên môn học</th>
                                        <th>Số tín chỉ</th>
                                        <th>Mã khoa đào tạo</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tạo môn học mới</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mon-hoc.store') }}" method="POST" id="form-create">
                        @csrf
                        <div class="mb-3">
                            <label for="ma_mon_hoc" class="form-label">Mã môn học</label>
                            <input type="text" class="form-control" id="ma_mon_hoc" name="ma_mon_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="ten_mon_hoc" class="form-label">Tên môn học</label>
                            <input type="text" class="form-control" id="ten_mon_hoc" name="ten_mon_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="so_tin_chi" class="form-label">Số tín chỉ</label>
                            <input type="text" class="form-control" id="so_tin_chi" name="so_tin_chi">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect1">Khoa đào tạo</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="ma_khoa_dao_tao_id">
                            <option selected="" disabled="">Chọn khoa đào tạo</option>
                            @foreach($khoa_dao_taos  as $khoa_dao_tao)
                            <option value="{{ $khoa_dao_tao->id }}">{{ $khoa_dao_tao->ten_khoa_dao_tao }}</option>
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
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa môn học</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mon-hoc.update', ['mon_hoc' => 0]) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="ma_mon-hoc" class="form-label">Mã môn học</label>
                            <input type="text" class="form-control" id="ma_mon_hoc" name="ma_mon_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="ten_mon_hoc" class="form-label">Tên môn học</label>
                            <input type="text" class="form-control" id="ten_mon_hoc"
                                name="ten_mon_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="so_tin_chi" class="form-label">Số tín chỉ</label>
                            <input type="text" class="form-control" id="so_tin_chi" name="so_tin_chi">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect1">Khoa đào tạo</label>
                            <select class="form-select" id="exampleFormControlSelect1"  name="ma_khoa_dao_tao_id">
                                <option selected="" disabled="">Chọn khoa đào tạo</option>
                                @foreach($khoa_dao_taos  as $khoa_dao_tao)
                                    <option value="{{ $khoa_dao_tao->id }}">{{ $khoa_dao_tao->ten_khoa_dao_tao }}</option>
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
                    <h5 class="modal-title" id="deleteModalLabel">Xoá môn học</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('mon-hoc.destroy', ['mon_hoc' => 0]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <h3 id="delete_title">Xác nhận xoá môn học: </h3>
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
        $('.edit-button').on('click', function() {
            data = $(this).data('object');
            update_id = data.id;
            $('#editModal form').attr('action', '/mon-hoc/' + update_id);
            $('#editModal #ma_mon_hoc').val(data.ma_mon_hoc);
            $('#editModal #ten_mon_hoc').val(data.ten_mon_hoc);
            $('#editModal #so_tin_chi').val(data.so_tin_chi);
            $('#editModal #ma_khoa_dao_tao_id').val(data.ma_khoa_dao_tao_id);            
            $('#exampleFormControlSelect1 option[value="' + data.ma_khoa_dao_tao_id + '"]').prop('selected', true);
            $('#editModal').modal('show');
        });
        $('#submit-update-btn').on('click', function() {
            $('#editModal form').submit();
        });

        $('#submit-btn').on('click', function() {
            console.log('Button clicked');
            $('#form-create').submit();
        });
        $('.delete-btn').on('click', function() {
            delete_id = $(this).data('id');
            $('#delete_title').text('Xác nhận xoá môn học: ' + $(this).data('name'));
            $('#deleteModal form').attr('action', '/mon-hoc/' + delete_id);
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
