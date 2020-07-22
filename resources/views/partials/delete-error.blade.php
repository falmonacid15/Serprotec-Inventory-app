@if(session('delete-error'))
    <div class="alert alert-danger">
        <strong>{{session('delete-error')}}</strong>
    </div>
@endif
