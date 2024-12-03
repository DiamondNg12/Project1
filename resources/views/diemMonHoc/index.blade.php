<x-app-layout>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Chọn lớp học phần</h5>
                        </div>
                    </div>
                    <div class="card-body px-5">
                        <form action="{{ route('diem-mon-hoc.index') }}" method="get">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="mb-3 ms-3">
                                        <label for="khoa_dao_tao_selector" class="form-label">Khoa đào tạo</label>
                                        <select class="form-select" id="khoa_dao_tao_selector" name="khoa_dao_tao_id">
                                            <option selected="" disabled="">Chọn Khoa đào tạo</option>
                                            @foreach ($khoa_dao_taos as $khoa_dao_tao)
                                                <option value="{{ $khoa_dao_tao->id }}">
                                                    {{ $khoa_dao_tao->ten_khoa_dao_tao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" id="mon_hoc_input">
                                    <div class="mb-3 ms-3">
                                        <label for="mon_hoc_selector" class="form-label">Môn học</label>
                                        <select class="form-select" id="mon_hoc_selector" name="mon_hoc_id">
                                            <option selected="" disabled="">Chọn Môn học</option>
                                            @if ($mon_hoc_id !== 0)
                                                @foreach ($mon_hocs as $mon_hoc)
                                                    <option value="{{ $mon_hoc->id }}">
                                                        {{ $mon_hoc->ten_mon_hoc }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" id="lop_hoc_phan_input">
                                    <div class="mb-3 ms-3">
                                        <label for="lop_hoc_phan_selector" class="form-label">Lớp học phần</label>
                                        <select class="form-select" id="lop_hoc_phan_selector" name="lop_hoc_phan_id"
                                            required>
                                            <option selected="" disabled="">Chọn Lớp học phần</option>
                                            @if ($lop_hoc_phan_id !== 0)
                                                @foreach ($lop_hoc_phans as $lop_hoc_phan)
                                                    <option value="{{ $lop_hoc_phan->id }}">
                                                        {{ $lop_hoc_phan->ten_lop_hoc_phan }}</option>
                                                @endforeach

                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center mb-2">
                                    <button type="submit" id="search-button" class="btn btn-primary">Tìm
                                        kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($lop_hoc_phan_id !== 0)
            <div class="row" id="dataTableDomRow">
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
                            <form method="POST" action="{{ route('diem-mon-hoc.store') }}">
                                @csrf
                                <div class="table-responsive" id="dataTableContainer">
                                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                                        <thead>
                                            <tr>
                                                <th>Stt</th>
                                                <th>Họ tên</th>
                                                <th>Mã sinh viên</th>
                                                <th>Điểm quá trình</th>
                                                <th>Điểm thi</th>
                                                <th>Điểm tổng kết</th>
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
                                                    <td>
                                                        <input type="number" class="form-control w-75"
                                                            name="diems[{{ $single_register->id }}][qua_trinh]"
                                                            value="{{ $single_register->diemMonHoc ? $single_register->diemMonHoc->diem_qua_trinh : '' }}"
                                                            min="0" max="10" step="0.1">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control w-75"
                                                            name="diems[{{ $single_register->id }}][thi]"
                                                            value="{{ $single_register->diemMonHoc ? $single_register->diemMonHoc->diem_thi : '' }}"
                                                            min="0" max="10" step="0.1">
                                                    </td>
                                                    <td>
                                                        {{ $single_register->diemMonHoc ? $single_register->diemMonHoc->diem_tong_ket : '' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center mb-2">
                                        <button type="submit" id="search-button" class="btn btn-primary">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
        $(document).ready(function() {
            let lop_hoc_phan_id = {{ $lop_hoc_phan_id }};
            let khoa_dao_tao_id = {{ $khoa_dao_tao_id }};
            let mon_hoc_id = {{ $mon_hoc_id }};
            if (lop_hoc_phan_id !== 0) {
                console.log(lop_hoc_phan_id);

                $('#khoa_dao_tao_id').val(khoa_dao_tao_id);
                $('#khoa_dao_tao_selector option[value="' + khoa_dao_tao_id + '"]').prop('selected', true);
                $('#mon_hoc_id').val(mon_hoc_id);
                $('#mon_hoc_selector option[value="' + mon_hoc_id + '"]').prop('selected', true);
                $('#lop_hoc_phan_id').val(lop_hoc_phan_id);
                $('#lop_hoc_phan_selector option[value="' + lop_hoc_phan_id + '"]').prop('selected', true);
            }
        });
        $(document).on('change', '#khoa_dao_tao_selector', function() {
            let value = $(this).val();
            if (!value) {
                return;
            }
            $.ajax({
                url: '{{ route('getMonHocByKhoaDaoTao') }}', // URL to send the request
                type: 'GET',
                data: {
                    khoa_dao_tao_id: value
                },
                success: function(response) {
                    $('#mon_hoc_input').html(response);
                },
                error: function(xhr, status, error) {
                    $('#mon_hoc_input').html(`
                                <div class="mb-3 ms-3">
                                    <label for="mon_hoc_selector" class="form-label">Môn học</label>
                                    <select class="form-select" id="mon_hoc_selector" name="mon_hoc_id">
                                        <option selected="" disabled="">Chọn Môn học</option>

                                    </select>
                                </div>`);
                }
            });
        });
        $(document).on('change', '#mon_hoc_selector', function() {
            let value = $(this).val();
            if (!value) {
                return;
            }
            $.ajax({
                url: '{{ route('getLopHocPhanByMonHoc') }}', // URL to send the request
                type: 'GET',
                data: {
                    mon_hoc_id: value
                },
                success: function(response) {
                    $('#lop_hoc_phan_input').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);

                    $('#lop_hoc_phan_input').html(`
                                <div class="mb-3 ms-3">
                                    <label for="lop_hoc_phan_selector" class="form-label">Lớp học phần</label>
                                    <select class="form-select" id="lop_hoc_phan_selector" name="lop_hoc_phan_id">
                                        <option selected="" disabled="">Chọn Lớp học phần</option>

                                    </select>
                                </div>`);
                }
            });

        });

        $('.exampleModalBtn').on('click', function() {
            $('#exampleModal').modal('show');
        });

        $('.close-modal').on('click', function() {
            $('#exampleModal').modal('hide');
        });
    </script>
</x-app-layout>
