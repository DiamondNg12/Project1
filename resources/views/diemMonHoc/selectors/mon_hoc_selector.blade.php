    <div class="mb-3 ms-3">
        <label for="mon_hoc_selector" class="form-label">Môn học</label>
        <select class="form-select" id="mon_hoc_selector" name="mon_hoc_id">
            <option selected="" disabled="">Chọn Môn học</option>
            @foreach ($mon_hocs as $mon_hoc)
                <option value="{{ $mon_hoc->id }}">
                    {{ $mon_hoc->ten_mon_hoc }}</option>
            @endforeach
        </select>
    </div>
