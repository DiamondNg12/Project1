<x-app-layout>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Bảng điểm</h5>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Lớp học phần</th>
                                        <th>Môn học</th>
                                        <th>Điểm quá trình</th>
                                        <th>Điểm thi</th>
                                        <th>Điểm tổng kết</th>
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                    @foreach ($ket_qua_dang_kis as $ket_qua_dang_ki)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{$ket_qua_dang_ki->lopHocPhan->ten_lop_hoc_phan}}</td>
                                            <td>{{$ket_qua_dang_ki->lopHocPhan->monHoc->ten_mon_hoc}}</td>
                                            <td>{{$ket_qua_dang_ki->diemMonHoc->diem_qua_trinh}}</td>
                                            <td>{{$ket_qua_dang_ki->diemMonHoc->diem_thi}}</td>
                                            <td>{{$ket_qua_dang_ki->diemMonHoc->diem_tong_ket}}</td>
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
</x-app-layout>
