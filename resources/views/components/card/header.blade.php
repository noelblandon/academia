<div class="card-header">
        <h5 class="{{ $attributes->get('title-class') }}">{{ $attributes->get('title') }}</h5>
        <span class="{{ $attributes->get('description-class') }}">{{ $attributes->get('description') }}</span>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                <li><i class="fa fa-window-maximize full-card"></i></li>
                <li><i class="fa fa-minus minimize-card"></i></li>
                <li><i class="fa fa-refresh reload-card"></i></li>
                <!--li><i class="fa fa-trash close-card"></i></li-->
            </ul>
        </div>
    </div>