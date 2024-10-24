{{ Form::open(['url' => route('permission.store'),'method' => 'post']) }}
@php
    // dd(route('permission.store'))
@endphp
    <div class="form-group">
        <label class="form-label">Permission title</label>
        <input type="text" class="form-control mb-2" name="title" required placeholder="Permission title">
        <input type="text" class="form-control mb-2" name="name" required placeholder="Route name">
    </div>
    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
{{ Form::close() }}
