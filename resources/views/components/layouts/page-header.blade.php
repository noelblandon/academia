<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ $title }}</h5>
                    <p class="m-b-0">{{ $subtitle }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"> <i class="fa fa-home"></i> </a>
                    </li>
                    {{ $slot }}
                    
                </ul>
            </div>
        </div>
    </div>
</div>