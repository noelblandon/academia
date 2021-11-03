@section('title', $title )
@section('page-header')
     <x-layouts.page-header 
          title="Calificaciones" 
          :subtitle="$title">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-capitalize">{{ $title }}</a>
                    </li>
     </x-layouts.page-header>
@endsection
@section('page-body')
<x-card.card>
    <x-card.header :title="$title " 
                    description=" " title-class="text-capitalize">

<div class="dropdown open">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background:white;">
     <span class="glyphicon glyphicon-th-list"></span> Exportar 
   
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li>
        <!--a href="#" onclick="$('#promedio').tableExport({type:'json',escape:'false'});"> <img src="images/json.jpg" width="24px"> JSON</a></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src="images/json.jpg" width="24px">JSON (ignoreColumn)</a></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'json',escape:'true'});"> <img src="images/json.jpg" width="24px"> JSON (with Escape)</a></li-->
        <!--li class="divider"></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'xml',escape:'false'});"> <img src="images/xml.png" width="24px"> XML</a></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'sql'});"> <img src="images/sql.png" width="24px"> SQL</a></li-->
        <!--li class="divider"></li-->
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'csv',escape:'false'});">&nbsp;CSV</a></li>
        <li><a href="#" onclick="$('#promedio').tableExport({type:'txt',escape:'false'});">&nbsp;TXT</a></li-->
        <li class="divider"></li>				
        
        <li><a href="#" onclick="$('#promedio').tableExport({type:'excel',escape:'false'});">&nbsp;Excel</a></li>
        <li><a href="#" onclick="$('#promedio').tableExport({type:'doc',escape:'false'});">&nbsp;Word</a></li>
        <li><a href="#" onclick="$('#promedio').tableExport({type:'powerpoint',escape:'false'});">&nbsp;PowerPoint</a></li>
        <li class="divider"></li>
        <!--li><a href="#" onclick="$('#promedio').tableExport({type:'png',escape:'false'});"> <img src="images/png.png" width="24px"> PNG</a></li-->
        <li><a href="#" onclick="generate();">&nbsp;PDF</a></li>
        
  </ul>
</div>

    </x-card.header>               
    <x-card.body>

    <livewire:tutor.average-detail :grade="$grade" :seccion="$seccion" :parcial="$parcial" :wire:key="'promedio-parciales'" />

    </x-card.body>  
</x-card.card>

@endsection

@push('js')
<script type="text/javascript" src="{{ asset('assets/js/table-export/tableExport.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/table-export/jquery.base64.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/table-export/html2canvas.js') }}"></script>
<!--script type="text/javascript" src="{{ asset('assets/js/table-export/jspdf/libs/sprintf.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/table-export/jspdf/jspdf.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/table-export/jspdf/libs/base64.js') }}"></script-->
<script src="{{ asset('assets/js/pdfjs/jspdf.min.js') }}"></script>  
<script src="{{ asset('assets/js/pdfjs/jspdf.plugin.autotable.min.js') }}"></script>  
<script >
  function generate() {  
   /* var doc = new jsPDF('p', 'pt', 'letter');  
    var htmlstring = '';  
    var tempVarToCheckPageHeight = 0;  
    var pageHeight = 0;  
    pageHeight = doc.internal.pageSize.height;  
    specialElementHandlers = {  
        // element with id of "bypass" - jQuery style selector  
        '#bypassme': function(element, renderer) {  
            // true = "handled elsewhere, bypass text extraction"  
            return true  
        }  
    };  
    margins = {  
        top: 150,  
        bottom: 60,  
        left: 40,  
        right: 40,  
        width: 600  
    };  
    var y = 20;  
    doc.setLineWidth(2);  
    doc.text(200, y = y + 30, "TOTAL MARKS OF STUDENTS");  
    doc.autoTable({  
        html: '#promedio',  
        startY: 70,  
        theme: 'grid',  
        columnStyles: {  
            0: {  
                cellWidth: 180,  
            },  
            1: {  
                cellWidth: 180,  
            },  
            2: {  
                cellWidth: 180,  
            }  
        },  
        styles: {  
            minCellHeight: 40  
        }  
    })  
    doc.save('Marks_Of_Students.pdf');  */
    var doc = new jsPDF()
    doc.autoTable({ html: '#promedio' })
    doc.save('table.pdf')
}  
</script>

@endpush

