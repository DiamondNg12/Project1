    <div class="mb-3 ms-3">
        <label for="lop_hoc_phan_selector" class="form-label">Lớp học phần</label>
        <select class="form-select" id="lop_hoc_phan_selector" name="lop_hoc_phan_id">
            <option selected="" disabled="">Chọn Lớp học phần</option>
            @foreach ($lop_hoc_phans as $lop_hoc_phan)
                <option value="{{ $lop_hoc_phan->id }}">
                    {{ $lop_hoc_phan->ten_lop_hoc_phan }}</option>
            @endforeach
        </select>
    </div>
