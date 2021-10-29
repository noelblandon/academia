<div class=" col-xl-12">

               <!-- Nav tabs -->
               <ul class="nav nav-tabs md-tabs" role="tablist">
                    <li class="nav-item" >
                         <a class="nav-link" data-toggle="tab" href="#parcial1" role="tab" aria-selected="false" wire:click="parcial(1)">Primer parcial</a>
                         <div class="slide" ></div>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" data-toggle="tab" href="#parcial2" role="tab" aria-selected="false" wire:click="parcial(2)">Segundo Parcial</a>
                         <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" data-toggle="tab" href="#parcial3" role="tab" aria-selected="false" wire:click="parcial(3)">Tercer Parcial</a>
                         <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" data-toggle="tab" href="#parcial4" role="tab" aria-selected="false"wire:click="parcial(4)" >Cuarto Parcial</a>
                         <div class="slide"></div>
                    </li>
               </ul>
               <!-- Tab panes -->
               <div class="tab-content card-block">
                    <div class="tab-pane" id="parcial1" role="tabpanel">
                        @if($parcial1) 
                            <livewire:tutor.average-detail :grade="$grade" :seccion="$seccion" parcial="1" :wire:key="'parcial-1'" />
                        @endif        
                    </div>
                    <div class="tab-pane" id="parcial2" role="tabpanel">
                        @if($parcial2) 
                            <livewire:tutor.average-detail :grade="$grade" :seccion="$seccion" parcial="2" :wire:key="'parcial-2'" />
                        @endif        
                    </div>
                    <div class="tab-pane" id="parcial3" role="tabpanel">
                        @if($parcial3) 
                            <livewire:tutor.average-detail :grade="$grade" :seccion="$seccion" parcial="3" :wire:key="'parcial-3'" />
                        @endif        
                    </div>
                    <div class="tab-pane" id="parcial4" role="tabpanel">
                        @if($parcial4) 
                            <livewire:tutor.verage-detail :grade="$grade" :seccion="$seccion" parcial="4" :wire:key="'parcial-4'" />
                        @endif        
                    </div>
               </div>
</div>