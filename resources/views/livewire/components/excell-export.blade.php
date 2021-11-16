<div>
    <div wire:loading wire:targer="getExcell" style="position:absolute;">
            <x-loading />     
    </div>

    <button  class="btn btn-success mt-1 mr-4" wire:click="getExcell" wire:loading.attr="disabled">Exportar A Excell</button>
</div>
