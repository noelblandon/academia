

<div class="container mx-auto h-full flex flex-1 justify-center items-center">
  <div class="w-full max-w-lg">
    <div class="leading-loose mt-10">
   

    @if($errors->has('username'))    
        <x-alert type="block" :msg="$errors->first('username')" />
    @elseif($errors->has('password'))
        <x-alert type="block" :msg="$errors->first('password')" />
    @elseif($errors->has('error'))
        <x-alert type="block" :msg="$errors->first('error')" />
    @endif
   
      <div class=" px-12 sm:px-24 md:px-24 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl bg-gray-50 py-10 rounded-lg shadow-2xl " style="background-color: rgba(255,255,255,0.5);">
                    <h2 class="text-center text-4xl  font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold text-red-900">Log in</h2>
                    <div class="mt-12">
                        <form wire:submit.prevent="login" method="POST" name="login">
                            <div>
                                <div class="text-sm font-bold  tracking-wide text-lg text-red-900">Nombre de Usuario</div>
                                <input class="w-full text-lg py-2 border-b border-red-900 focus:outline-none focus:border-indigo-500 bg-transparent text-red-900 placeholder-red-900" type="text" name="username" wire:model.lazy="username" placeholder="nombre de usuario">
                            </div>
                            <div class="mt-8">
                                    <div class="text-sm font-bold  tracking-wide text-lg text-red-900">
                                        Contraseña
                                    </div>
                                <input class="w-full text-lg py-2 border-b border-red-900 focus:outline-none focus:border-indigo-500 bg-transparent text-red-900 placeholder-red-900" type="password" name="password" wire:model.lazy="password" placeholder="Ingrese su contraseña">
                            </div>
                    
                  
                            <div class="mt-10 mb-8">
                                <button class="bg-red-700 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-red-500"
                                type="submit">
                                    Iniciar Sesión
                                </button>
                            </div>                       
                            
                            


                        </form>                       
                    </div>
                </div>
            </div>
            


   
    </div>
  </div>
</div>