
<div class="row p-4">
    <div class="row p-4">
            <div class="col-12 d-flex justify-content-center mb-4 p-4">
                <div class="row pb-4">
                    <div class="d-flex align-items-center flex-column" style="height: 150px;font-family: Noto Serif;width:1350px;">
                        <div class="p-2 h6" style="color:#C59A8E;font-style:italic;">Área privada</div>
                        <div class="h2" style="font-family: 'Montserrat',sans-serif;padding-bottom:50px;">DIRECTORIO DE ASOCIADOS</div>
                    </div>
                </div>                            
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2"></div>
                <div class="col">
                    <div class="p-2 h6 ml-1" style="color:#C59A8E;font-style:italic;font-family: Noto Serif;">Búsqueda</div>
                    <div class="h4" style="font-family: 'Montserrat',sans-serif;padding-bottom:50px;">BUSCA A OTROS ASOCIADOS</div>
                </div>
            </div>
            <div class="row d-flex justify-content-center pb-4">
                <div class="col-2" style="font-family: Noto Serif;">
                    <label>Nombre de la floristería</label>
                    <input type="text" wire:model.defer="shop_name" class="florist-name w-100" style="height:60px;color:#847A7A;border:1px solid #f5f1ef;outline: none;color:#444;">
                </div>
                <div class="col-2" style="font-family: Noto Serif;">
                    <label>Codigo Postal</label>
                    <select wire:model.defer="shop_postal_code" aria-label="multiple select example" class="w-100" style="height:60px;color:#847A7A;border:1px solid #f5f1ef;color:#444;">  
                        <option value="">Todo</option>  
                            @foreach($codes as $code)
                                <option value="{{$code['postal_code']}}" >{{ $code['postal_code'] }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="col-2" style="font-family: Noto Serif;">
                    <label>Provincia</label>
                        <select wire:model.defer="shop_province" class="w-100" style="height:60px;color:#847A7A;border:1px solid #f5f1ef;color:#444;">  
                            <option value="">Todo</option>  
                                @foreach($provinces as $provin)
                                    <option value="{{$provin['province']}}" >{{ $provin['province'] }}</option>
                                @endforeach
                        </select>
                </div>
                <div class="col-2" style="font-family: Noto Serif;">
                    <label>Ciudad</label>
                        <select wire:model.defer="shop_city" class="w-100" style="height:60px;color:#847A7A;border:1px solid #f5f1ef;color:#444;">  
                            <option value="">Todo</option>  
                                @foreach($cities as $city)
                                    <option value="{{$city['city']}}" >{{ $city['city'] }}</option>
                                @endforeach
                        </select>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-2"></div>
                <div class="col-2 d-block">
                    <button class="w-25 mr-2 py-2 rounded-0 bg-dark" wire:click="searchShops" style="color:white;">Buscar</button>
                    <div wire:click="cleanSearch" class="mt-2" style="cursor:pointer;">x Limpiar filtros</div>
                </div>
            </div>                            
            <div class="row mt-5">
                <div class="col-2"></div>
                @if(count($shops)>0)
                    @foreach($shops as $shop)
                        <div class="card m-2 mb-3 rounded-0 florista-card" style="width: 24rem;border-color:rgba( 153, 93, 45, 1 );">
                            <div class="card-body">
                                <div class="mb-2">
                                <a href="#" wire:click="$set('selectedShop', {{$shop}})" class="card-link" style="font-style:italic;text-decoration:none;color:#995d2d;">Editar</a>
                                </div>
                                <h5 class="card-title mt-5 mb-5 text-uppercase fw-bold" style="font-size:20px;font-family:'Montserrat', sans-serif;font-weight:800px;">{{$shop->title}}</h5>
                                <hr>
                                <div class="fw-bold mb-4">
                                    <span class="fw-bold">Empresa: </span>{{$shop->contact_name}}
                                </div>
                                <div class="fw-bold mb-4">
                                    <span class="fw-bold">Direccion: </span>{{$shop->direction}}
                                </div>
                                <div class="fw-bold mb-4">
                                    <span class="fw-bold">Nº Asociado: </span>{{$shop->user_asociado}}
                                </div>
                                <div class="mb-4">
                                    <span class="fw-bold">Teléfono: </span>
                                    <span class="fw-bold"><a href="tel:{{$shop->phone_number}}" style="text-decoration:none;color:#995d2d;">{{$shop->phone_number}}</a></span>
                                </div>
                                <div class="mb-4">
                                    <span class="fw-bold">Email: </span>
                                    <span class="fw-bold">
                                        <a href="mailto:{{$shop->email}}" style="text-decoration:none;color:#995d2d;">{{$shop->email}}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                <div class="d-flex justify-content-center pagination pagination-sm float-right mt-3 mb-3">{{$shops->links()}}</div>
                @endif
            </div>
    </div>
</div>
