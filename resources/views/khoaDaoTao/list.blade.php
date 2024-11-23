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
                                    <label for="baseInput" class="form-label">Mã khoa</label>
                                    <input type="text" name="input" class="form-control" id="baseInput">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput1" class="form-label">Tên khoa</label>
                                    <input type="text" name="input1" class="form-control" id="baseInput1">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput2" class="form-label">Ngày thành lập</label>
                                    <input type="text" name="input2" class="form-control" id="baseInput2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <button type="button" class="btn btn-primary">Tìm kiếm</button>
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
                            <h5 class="card-title">Danh sách khoa đào tạo</h5>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn btn-sm btn-primary" id="create-new-btn" role="button">Thêm Khoa Đào tạo</a>
                       </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã khoa đào tạo</th>
                                        <th>Tên khoa đào tạo</th>
                                        <th>Ngày thành lập</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                    @foreach ($khoa_dao_taos as $khoa_dao_tao)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $khoa_dao_tao->ma_khoa_dao_tao }}</td>
                                            <td>{{ $khoa_dao_tao->ten_khoa_dao_tao }}</td>
                                            <td>{{ \Carbon\Carbon::parse($khoa_dao_tao->ngay_thanh_lap)->format('d/m/Y') }}</td>
                                            <td>
                                                @if ($khoa_dao_tao->tinh_trang == 1)
                                                    <span class="badge bg-success">Đang hoạt động</span>
                                                @else
                                                    <span class="badge bg-danger">Ngưng hoạt động</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary" role="button">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger" role="button">Delete</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Khoa Đào Tạo mới</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('khoa-dao-tao.store') }}" method="POST" id="form-create">
                        @csrf
                        <div class="mb-3">
                            <label for="ma_khoa_dao_tao" class="form-label">Mã khoa đào tạo</label>
                            <input type="text" class="form-control" id="ma_khoa_dao_tao" name="ma_khoa_dao_tao">
                        </div>
                        <div class="mb-3">
                            <label for="ten_khoa_dao_tao" class="form-label">Tên khoa đào tạo</label>
                            <input type="text" class="form-control" id="ten_khoa_dao_tao" name="ten_khoa_dao_tao">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_thanh_lap" class="form-label">Ngày thành lập</label>
                            <input type="date" class="form-control" id="ngay_thanh_lap" name="ngay_thanh_lap">
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
