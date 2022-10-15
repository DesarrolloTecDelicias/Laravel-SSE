<div class="flex space-x-1 justify-around">
    <a href="mailto:{{ $email }}?from={{ Auth::user()->email }}&subject={{ $subject }}&body={{ $body }}"
        class="btn btn-info rounded cursor-pointer">
        Mensaje
    </a>
</div>