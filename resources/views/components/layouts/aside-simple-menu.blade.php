<div class="pcoded-navigation-label">{{ $name }}</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="{{ $class }}" >
        <a href="{{ $url }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-home"></i><b>{{ strtoupper($name[0]) }}</b></span>
            <span class="pcoded-mtext">{{ $name }}</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>