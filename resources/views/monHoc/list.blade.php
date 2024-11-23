<x-app-layout>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Bộ lọc</h5>
                        </div>
                        <!-- {{-- <div class="card-action">
                             <a href="http://localhost/users/create" class="btn btn-sm btn-primary" role="button">Add User</a>
                        </div> --}} -->
                    </div>
                    <div class="card-body px-0">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput" class="form-label">Tên môn học</label>
                                    <input type="text" name="input" class="form-control" id="baseInput">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput1" class="form-label">Tên khoa đào tạo</label>
                                    <input type="text" name="input1" class="form-control" id="baseInput1">
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
                                                <a href="" class="btn btn-sm btn-primary" role="button">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger" role="button">Delete</a>
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
                            <select class="form-select" id="exampleFormControlSelect1">
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

    <script>
        $('#create-new-btn').on('click', function() {
            $('#createNewModal').modal('show');
        });

        $('#submit-btn').on('click', function() {
            $('#form-create').submit();
        });

        $('.close-modal').on('click', function() {
            $('#createNewModal').modal('hide');
        });
    </script>
</x-app-layout>
