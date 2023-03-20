@if(auth()->user()->hasRole('Client'))
    <div class="row p-4">
        @if($selectedShop == null && $selectedShopDirecto == null)
            <div class="col-12 justify-content-center mb-4 p-4">
                <div class="row pb-4">
                    <div class="d-flex align-items-center flex-column" style="height: 150px;font-family: Noto Serif;">
                            <div class="p-2 h6" style="color:#C59A8E;font-style:italic;">Bienvenido</div>
                            <div class="h2" style="font-family: 'Montserrat',sans-serif;">ÁREA PRIVADA</div>
                            <div class="p-2 ml-4" style="font-family: 'Montserrat',sans-serif;">La Asociación Española de Floristas desarrolla su actividad con el fin de ofrecer un conjunto de servicios de calidad a sus asociados. <br>Su objetivo es que para
                            los asociados sea rentable estar aliados.</div>
                    </div>
                </div>                            
            </div>
            <h6 class="ml-3 pl-3"style="color:rgba( 153, 93, 45, 1 );font-family: Noto Serif; font-style:italic;">Gestiona</h6>
            <h4 class="ml-3 pl-4 mt-2"style="font-family: 'Montserrat',sans-serif;">TU FLORISTERÍA</h4>
            <div class="mt-1">
                @if(count($shops)>0)
                    <div class="d-flex mt-3">
                        @foreach($shops as $shop)
                        <div class="card m-3 rounded-0 florista-card" style="width: 26rem;border-color:rgba( 153, 93, 45, 1 );">
                            <div class="card-body">
                                <div class="mb-2">
                                    @if($shop->is_direct_florist == true)
                                        <a href="#" wire:click="$set('selectedShop', {{$shop}})" class="card-link" style="font-style:italic;text-decoration:none;color:#995d2d;">Editar</a>
                                        <a href="#" wire:click="$set('selectedShopDirecto', {{$shop}})" class="card-link" style="float:right;font-style:italic;text-decoration:none;color:#995d2d;">Ver</a>
                                    @else
                                        <a href="#" wire:click="$set('selectedShop', {{$shop}})" class="card-link" style="float:right;font-style:italic;text-decoration:none;color:#995d2d;">Editar</a>
                                    @endif
                                </div>
                                <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/fransen-et-lafite-floristeria-1651218569.jpg" class="card-img-top" alt="...">
                                <h5 class="card-title mt-2 d-flex justify-content-center text-uppercase" style="font-family:'Montserrat',sans-serif;">{{$shop->title}}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                <div class="alert alert-info mt-3 d-flex justify-content-center align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="mr-2 bi bi-exclamation-octagon" viewBox="0 0 16 16" style="color:red;">
                    <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                    <span class="fw-bolder">Aún no han agregado tu floristería, por favor, contacte con el administrador.
                    Disculpa las molestias.</span>
                </div>
                @endif
            </div>
        @elseif($selectedShop != null)
            <div class="col-12" style="width:100%;">
                <div class="row">
                    <div class="pb-4 fw-bold" style="margin-bottom:50px;font-family:'Montserrat',sans-serif;">
                        <div class="pb-2 h6" style="color:#C59A8E;font-style:italic;font-family:Noto Serif;">Editar</div>
                        <div class="mb-4 h4">EDITE SU FLORISTERÍA</div>
                        <!-- <span style="float:right;">
                            <svg wire:click="$set('selectedShop', null)" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16" style="cursor:pointer;color:dark;">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                            </svg>
                        </span> -->
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Nombre de floristería</label>
                            <input class="form-control rounded-0 mb-2" wire:model.lazy="shop_title">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Empresa</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_contact_name">
                        </div>
                    </div>
                    @if($selectedShop['is_direct_florist'])
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Logo</label>
                            <input class="form-control rounded-0 mb-2" wire:model.lazy="shop_logo">
                        </div>
                        <div class="col-6">
                            <label class="mb-2">Imagen Principal</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_img_principal">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">URL</label>
                            <input class="form-control rounded-0 mb-2" wire:model.lazy="shop_url">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Nº Whatsapp</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_whatsap_phone">
                        </div>
                    </div>
                    @endif
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Dirección</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_direction">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Ciudad</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_city">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Provincia</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_province">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Codigo Postal</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_code">
                        </div>
                    </div>
                    <div class="row mb-4 pb-1">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Email</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_email">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Nº Teléfono</label>
                            <input class="form-control " wire:model.defer="shop_phone">
                        </div>
                    </div>
                    <div class="row {{$selectedShop['is_direct_florist'] ? 'mb-4' : 'mb-2'}}">
                        <div class="col-12 custom-form">
                            <label class="mb-2">Dirección completa (para google maps)</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_direction_maps">
                        </div>
                    </div>
                    @if($selectedShop['is_direct_florist'])
                        <div class="row mb-2">
                            <div class="col-12 custom-form">
                                <label class="mb-2">Descripción</label>
                                <input class="form-control rounded-0 mb-2" wire:model.defer="shop_description">
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12 ">
                            <a href="#" wire:click="" onclick="initMap()">Usar mi ubicación</a>
                            <div id="map" style="height:400px;display:none;"></div>
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <button class="w-50 mr-2 py-3" wire:click="saveInfo" style="background-color:#AC4073;color:white;">Guardar</button>
                        <button class="w-50 py-3" wire:click="$set('selectedShop', null)" style="border:1px solid #000;">Cancelar</button>
                    </div>
                </div>
            <div>
        @else
            @if($productToCreate == false)
                <div class="card mb-3 ml-4 border-0" style="width:98%;background-color:#fff8e7;padding:0;justify-content:center;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="https://s3.eu-west-1.amazonaws.com/deiland.plaza/wp-content/uploads/2020/10/20201021_114910.jpg" class=" img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <img src="https://aefi.es/wp-content/uploads/2020/12/fortalecer-trans.svg" class="m-2 mb-4" style="width:150px;">
                                    <svg wire:click="$set('selectedShopDirecto', null)" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16" style="cursor:pointer;color:dark;">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                                    </svg>
                                </div>
                                <span class=""style="color:rgba( 153, 93, 45, 1 );font-style:italic;font-family:Noto Serif;font-size:18px;">Bienvenidos a la floristeria</span>
                                <h3 class="card-title mb-3 mt-3" style="font-weight:700px;font-size:35px;letter-spacing:2px;text-transform:uppercase;">{{$selectedShopDirecto['title']}}</h3>
                                <span class="mb-1"style="color:rgba( 153, 93, 45, 1 );font-style:italic;font-family:Noto Serif;font-size:18px;">Dirección</span>
                                <div class="card-text fw-bold">{{$selectedShopDirecto['direction']}}</div>
                                <div class="mb-3">
                                    <span class="fw-bold">CP</span>
                                    <span class="card-text fw-bold">{{$selectedShopDirecto['postal_code']}}</span>
                                </div>
                                <span class="fw-bold">Teléfono</span>
                                <span class="card-text"style="color:#CD853F;">{{$selectedShopDirecto['phone_number']}}</span>
                                <p class="card-text fw-bold"><a href="#" style="color:rgba( 153, 93, 45, 1 );">{{$selectedShopDirecto['url_web']}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col">
                        <p style="font-style:italic;text-decoration:none;color:#CD853F;">Una buena selección de</p>
                        <h4 style="letter-spacing:2px;">NUESTROS PRODUCTOS</h4>
                    </div>
                    <div class="col mt-4 p-4 w-50" style="">
                        <div class="col d-flex justify-content-end mt-4">
                            <button class="d-flex align-items-center justify-content-center btn-new" wire:click="$set('productToCreate', true)" style="color:#995d2d;font-style:italic;font-family:Noto Serif;font-size:24px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mr-1 bi bi-plus-circle" viewBox="0 0 16 16" style="color:#995d2whi;float:right;">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>Nuevo producto
                            </button>
                        </div>
                        <div class="row d-flex justify-content-end mt-2">
                            <div class="col-4"></div>
                            <div class="mb-4 col-8">
                                <label class="mb-2">Categoría</label>
                                <select wire:model="selectedCategory" aria-label="multiple select example" class="w-75 form-control">  
                                <option value="">Todo</option>  
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" >{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div lass="row">
                    @if(count($products)>0)
                        <div class="d-flex mt-3">
                                @foreach($products as $product)
                                <div class="card m-1 mb-3 rounded-0 florista-card" style="width: 27rem;border-color:rgba( 153, 93, 45, 1 );">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <!-- <a href="#" wire:click="" class="card-link">Editar</a>
                                            <a href="#" wire:click="" class="card-link" style="float:right;">Ver</a> -->
                                        </div>
                                        <img src="https://www.cuerpomente.com/medio/2021/11/17/maceta-con-orquidea-en-un-alfeizar_9512f96a_1200x1200.jpg" class="card-img-top" alt="...">
                                        <h5 class="card-title mt-2 d-flex justify-content-center text-uppercase">{{$product->title}}</h5>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    @else
                        <div class="alert alert-info mt-3 d-flex justify-content-center align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="mr-2 bi bi-exclamation-octagon" viewBox="0 0 16 16" style="color:red;">
                            <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            <span class="fw-bolder">Aún no hay productos agregados. Lo sentimos.</span>
                        </div>
                    @endif
                </div>
            @else
            <div class="col-12" style="width:100%;">
                <div class="row">
                    <p style="font-style:italic;color:#CD853F;">Agregar</p>
                    <h4 class="pb-4">AGREGAR NUEVO PRODUCTO</h4>
                    <div class="row">
                        <div class="row mt-4">
                            <div class="col-6">
                                <label>Nombre de producto</label>
                                <input wire:model="shop_product_name" class="form-control form-control-sm">
                            </div>
                            <div class="col-6">
                                <label>URL de producto</label>
                                <input wire:model="shop_product_url" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                                <div class="col-6">
                                    <label>Imagen de producto</label>
                                    <input wire:model="shop_img_product" type="file" class="form-control form-control-sm">
                                </div>
                                <div class="col-6">
                                    <label>Categoria(s) de producto</label>
                                    <div class="d-block mt-1 pb-3 pl-3">
                                    @foreach($categories as $category)
                                        <div class="">
                                            <input type="checkbox" class="mr-1 form-check-input" value="{{$category->id}}" wire:model.defer="categories_checked" style="cursor:pointer;">{{$category->name}}
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="d-flex mt-2">
                            <button class="w-50 mr-2 py-3" wire:click="saveNewProduct" style="background-color:#AC4073;color:white;">Guardar</button>
                            <button class="w-50 py-3" wire:click="$set('productToCreate', false)" style="border:1px solid #000;">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endif

        <script>
        var map;
        var infowindow;
        function initMap() {
            document.getElementById("map").style.display= "block";
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var myLatlng = new google.maps.LatLng(lat, lng);
                map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatlng,
                    zoom: 14
                });
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Mi ubicación'
                });
                infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(marker.title);
                    infowindow.open(map, marker);
                });
            });
        }
        </script>
    </div>
@else
    <div class="row p-4">
        <div class="d-flex align-items-center flex-column" style="height: 150px;font-family: Noto Serif;">
            <div class="p-2 h6" style="color:#C59A8E;font-style:italic;">Bienvenido</div>
                <div class="h2" style="font-family: 'Montserrat',sans-serif;">ÁREA PRIVADA</div>
                <div class="p-2 ml-4" style="font-family: 'Montserrat',sans-serif;">Gestiona las tiendas de los floristas</div>
        </div>
    <div>
    <div class="row" style="">
        <div class="d-flex p-5 pb-1">
            <div class="card m-3 rounded-0 florista-card" style="width: 26rem;border-color:rgba( 153, 93, 45, 1 );cursor:pointer;" wire:click="changeSection('entidades')">
                <div class="card-body">
                    <div class="mb-2">

                    </div>
                    <div class="d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </div>
                    <h5 class="card-title mt-4 d-flex justify-content-center text-uppercase" style="font-family:'Montserrat',sans-serif;">Entidades</h5>
                </div>
            </div>
            <div class="card m-3 rounded-0 florista-card" style="width: 26rem;border-color:rgba( 153, 93, 45, 1 );cursor:pointer;" wire:click="changeSection('productos')">
                <div class="card-body">
                    <div class="mb-2">
                        
                    </div>
                    <div class="d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                        <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                        </svg>
                    </div>
                    <h5 class="card-title mt-4 d-flex justify-content-center text-uppercase" style="font-family:'Montserrat',sans-serif;">Categorias Producto</h5>
                </div>
            </div>
            <div class="card m-3 rounded-0 florista-card" style="width: 26rem;border-color:rgba( 153, 93, 45, 1 );cursor:pointer;" wire:click="changeSection('descuentos')">
                <div class="card-body">
                    <div class="mb-3">
                        
                    </div>
                    <div class="d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                        <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>
                        <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>
                        </svg>
                        </div>
                    <h5 class="card-title mt-4 d-flex justify-content-center text-uppercase" style="font-family:'Montserrat',sans-serif;">Descuentos</h5>
                </div>
            </div>
        </div>
        @if($shops_admin)
        <div class="p-4 pb-1 d-flex justify-content-start align-items-center">
            <h5 class="d-flex align-items-center mr-2">Entidades</h5>
            @if(!$selectedShopAdmin)
            <div class="ml-4">
                <button class="btn btn-outline-dark px-2 d-flex justify-content-center align-items-center" wire:click="$set('inputsToCreateShop', true)">Crear <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg></button>
            </div>
            @endif
        </div>
        <div class="d-flex mt-3" style="">
            @if(!$inputsToCreateShop && !$selectedShopAdmin)
            <div class="">
                @foreach($shopsAdmin as $shop)
                <div class="card m-3 rounded-0 florista-card-admin" style="width: 20rem;border-color:rgba( 153, 93, 45, 1 );">
                    <div class="card-body">
                        <div class="mb-2">
                            @if(!$confirmDelete)
                                <a href="#" wire:click.prevent="$set('selectedShopAdmin', {{$shop}})" class="card-link" style="font-style:italic;text-decoration:none;color:#995d2d;">Editar</a>
                                <a href="#" wire:click.prevent="$set('confirmDelete', {{$shop->id}})" class="card-link-delete mb-1" style="float:right;font-style:italic;text-decoration:none;color:#995d2d;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            @else
                                @if($confirmDelete == $shop->id)
                                    <a href="#" wire:click.prevent="deleteShop({{$shop}})" class="card-link-confirm-delete mb-1 ml-4" style="float:right;font-style:italic;text-decoration:none;color:rgb(224,0,0);">
                                        Confirmar
                                    </a>
                                    <a href="#" wire:click.prevent="$set('confirmDelete', null)" class="card-link-confirm-delete mb-1" style="float:right;font-style:italic;text-decoration:none;color:#995d2d;">
                                        Descartar
                                    </a>
                                @else
                                    <a href="#" wire:click="$set('selectedShopAdmin', {{$shop}})" class="card-link" style="font-style:italic;text-decoration:none;color:#995d2d;">Editar</a>
                                    <a href="#" wire:click="$set('confirmDelete', {{$shop->id}})" class="card-link-delete mb-1" style="float:right;font-style:italic;text-decoration:none;color:#995d2d;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                @endif
                            @endif
                        </div>
                        <img src="{{ asset($shop->logo) }}" class="card-img-top" alt="...">
                        <h5 class="card-title mt-2 d-flex justify-content-center text-uppercase" style="font-family:'Montserrat',sans-serif;">{{$shop->title}}</h5>
                    </div>
                </div>
                @endforeach
                <div class="mt-3">{{$shopsAdmin->links()}}</div>
            </div>
            @else
            <div class="p-5 pt-1" style="width:1350px;">
                    <div class="pb-1" style="margin-bottom:40px;font-family:'Montserrat',sans-serif;">
                        @if($inputsToCreateShop)
                            <div class="h6" style="color:#C59A8E;font-style:italic;font-family:Noto Serif;">Crear</div>
                        @else
                            <div class="pb-2 h6" style="color:#C59A8E;font-style:italic;font-family:Noto Serif;">Editar</div>
                            <div class="h4">Edita la entidad {{$selectedShopAdmin['title']}}</div>
                        @endif
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 d-flex align-items-center">
                                <input type="checkbox" wire:model="is_direct_florist"style="outline:none;">
                                <div class="ml-2">Florista Directo</div>
                        </div>
                        <div class="col-6 custom-form">
                            <label>Numero Asociado</label>
                            <input type="" class="form-control rounded-0"wire:model="num_asociado">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Nombre de floristería</label>
                            <input class="form-control rounded-0 mb-2" wire:model.lazy="shop_title">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Empresa</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_contact_name">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="mb-2">Logo</label>
                            <input type="file" class="rounded-0 mb-2" wire:model.defer="shop_logo">
                        </div>
                        <div class="col-6">
                            <label class="mb-2">Imagen Principal</label>
                            <input type="file" class="rounded-0 mb-2" wire:model.defer="shop_img_principal">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">URL</label>
                            <input class="form-control rounded-0 mb-2" wire:model.lazy="shop_url">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Nº Whatsapp</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_whatsap_phone">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Dirección</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_direction">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Ciudad</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_city">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Provincia</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_province">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Codigo Postal</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_code">
                        </div>
                    </div>
                    <div class="row mb-4 pb-1">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Email</label>
                            <input class="form-control rounded-0 mb-2" wire:model.defer="shop_email">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Nº Teléfono</label>
                            <input class="form-control " wire:model.defer="shop_phone">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 custom-form">
                            <label class="mb-2">Descripción</label>
                            <textarea class="form-control rounded-0 mb-2" wire:model.defer="shop_description"></textarea>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        @if($inputsToCreateShop)
                        <button class="w-50 mr-2 py-3" wire:click="createShop" style="background-color:#AC4073;color:white;">Guardar</button>
                        <button class="w-50 py-3" wire:click="$set('inputsToCreateShop', false)" style="border:1px solid #000;">Cancelar</button>
                        @else
                        <button class="w-50 mr-2 py-3" wire:click="updateShopAdmin({{$selectedShopAdmin['id']}})" style="background-color:#AC4073;color:white;">Guardar</button>
                        <button class="w-50 py-3" wire:click="$set('selectedShopAdmin', null)" style="border:1px solid #000;">Cancelar</button>
                        @endif
                    </div>
                </div>
            <div>
            @endif
        </div>
        @elseif($products_admin)
            @if(!$inputsToCreateCategory)
                <div class="p-4 pb-1 d-flex justify-content-start align-items-center mb-5">
                    <h5 class="d-flex align-items-center mr-2">Categorias</h5>
                    <div class="ml-4">
                        <button class="btn btn-outline-dark px-2 d-flex justify-content-center align-items-center" wire:click="$set('inputsToCreateCategory', true)">Crear <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg></button>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-column" style="">
                @foreach($ctgries as $cat)
                    <div class="card rounded-0 pr-4 pl-4 m-1 w-75 d-flex justify-content-center category-card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            @if(!$selectedCatAdmin)
                                <div class="">{{$cat->name}}</div>
                            @else
                                <div class="d-flex justify-content-start">
                                    <input class="p-1" wire:model.defer="edit_cat_name">
                                    <button class="btn btn-outline-dark ml-2 py-1"wire:click="updateCategoryAdmin({{$cat->id}})">Guardar</button>
                                </div>
                            @endif
                            @if(!$confirmDeleteCat)
                                <div class="d-flex">
                                    <a href="#" wire:click.prevent="$set('selectedCatAdmin', {{$cat}})" class="card-link ml-4 mr-3" style="font-style:italic;text-decoration:none;color:#995d2d;">Editar</a>
                                    <a href="#" wire:click.prevent="$set('confirmDeleteCat', {{$cat->id}})" class="card-link-delete mb-1" style="float:right;font-style:italic;text-decoration:none;color:#995d2d;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                </div>
                            @else
                                @if($confirmDeleteCat == $cat->id)
                                <div class="d-flex">
                                    <a href="#" wire:click.prevent="$set('confirmDeleteCat', null)" class="card-link-confirm-delete mb-1 mr-3" style="font-style:italic;text-decoration:none;color:#995d2d;">
                                        Descartar
                                    </a>
                                    <a href="#" wire:click.prevent="deleteCat({{$cat->id}})" class="card-link-confirm-delete mb-1" style="font-style:italic;text-decoration:none;color:rgb(224,0,0);">
                                        Confirmar
                                    </a>
                                </div>
                                @else
                                <div class="d-flex">
                                    <a href="#" wire:click="$set('selectedCatAdmin', {{$cat}})" class="card-link mr-3" style="font-style:italic;text-decoration:none;color:#995d2d;">Editar</a>
                                    <a href="#" wire:click.prevent="$set('confirmDeleteCat', {{$cat->id}})" class="card-link-delete mb-1" style="float:right;font-style:italic;text-decoration:none;color:#995d2d;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
                    <div class="mt-3">{{$ctgries->links()}}</div>
                <div>
            @else
            <div class="p-5 pt-1" style="width:1350px;">
                <div class="pb-1" style="margin-bottom:40px;font-family:'Montserrat',sans-serif;font-style:italic;text-decoration:none;color:#995d2d;">
                    Crear
                </div>
                <div class="row mb-4 pb-1 d-flex align-items-center">
                    <div class="col-8 custom-form">
                        <label class="mb-2">Nombre Categoria</label>
                        <input class="form-control rounded-0 mb-2" wire:model.defer="name_new_category">
                    </div>
                    <div class="col-1 d-flex align-items-center">
                        <button type="button" class="btn btn-outline-dark"wire:click="createCategoryAdmin" style="margin-top:22px;">Crear</button>
                        <button type="button" class="btn btn-outline-danger ml-2" wire:click="$set('inputsToCreateCategory', null)" style="margin-top:22px;">Cancelar</button>
                    </div>
                </div>
            </div>
            @endif
        @elseif($discounts_admin)
            <div class="p-4 pb-1 d-flex justify-content-start align-items-center mb-5">
                <h5 class="d-flex align-items-center mr-2">Descuentos</h5>
                <div class="ml-4">
                    <button class="btn btn-outline-dark px-2 d-flex justify-content-center align-items-center" wire:click="$set('inputsToCreateDiscount', true)">Crear <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg></button>
                </div>
            </div>
            @if(!$inputsToCreateDiscount)
            <div class="d-flex flex-column align-items-center pr-4 pl-4" style="">
                @foreach($discounts as $dato)
                    <div class="accordion-item border-0 mb-2 w-75">
                        <h2 class="accordion-header d-flex" id="heading{{ $dato->id }}" style="border-bottom:1px solid #995D2D;color:dark;">
                            <button class="accordion-button bg-white collapsed text-dark p-2 d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $dato->id }}" aria-expanded="true" aria-controls="collapse{{ $dato->id }}" style="text-transform:uppercase;box-shadow:none !important;">
                                <div>{{ $dato->name }}</div>
                            </button>
                        </h2>
                        <div wire:ignore.self id="collapse{{ $dato->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $dato->id }}" data-bs-parent="#mi-acordeon">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center justify-content-between p-3">
                                        <div class="col-7" style="color:#8A8080;">
                                            @if($editDiscountAdmin == $dato->id)
                                                <input type="text" class="mb-2" wire:model="name_discount">
                                                <textarea type="text" class="w-100" wire:model.defer="description_discount" style="width:200px;"></textarea>
                                            @else
                                                {{ $dato->description }}
                                            @endif
                                            <div class="fw-bold mt-2 mb-2">
                                                @if($editDiscountAdmin == $dato->id)
                                                    <input type="text" wire:model.defer="contact_discount">
                                                @else
                                                    Contacto: {{ $dato->contact }}
                                                @endif
                                            </div>
                                            <div class="d-flex align-items-center mt-2">
                                                @if($editDiscountAdmin == $dato->id)
                                                    <a href="#" wire:click.prevent="updateDiscount({{$dato->id}})" class="mr-3" style="text-decoration:none;color:dark;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                        <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                                                        </svg>
                                                    </a>
                                                @else
                                                    @if(!$confirmDeleteDiscount)
                                                    <a href="#" wire:click.prevent="$set('editDiscountAdmin', {{$dato->id}})" class="mb-1 mt-1 mr-3" style="font-style:italic;text-decoration:none;color:dark;">
                                                        Editar
                                                    </a>
                                                    @endif
                                                @endif
                                                @if(!$confirmDeleteDiscount)
                                                    <a href="#" wire:click.prevent="$set('confirmDeleteDiscount', {{$dato->id}})" class="mb-1 card-link-delete mt-1" style="font-style:italic;text-decoration:none;color:dark;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg>
                                                    </a>
                                                @else
                                                    <div class="d-flex">
                                                        <a href="#" wire:click.prevent="$set('confirmDeleteDiscount', {{$dato->id}})" class="mb-1 card-link-delete mt-1 mr-3" style="font-style:italic;text-decoration:none;color:dark;">
                                                            Cancelar
                                                        </a>
                                                        <a href="#" wire:click.prevent="$set('confirmDeleteDiscount', {{$dato->id}})" class="mb-1 card-link-delete mt-1" style="font-style:italic;text-decoration:none;color:dark;">
                                                            Confirmar
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if($editDiscountAdmin == $dato->id)
                                            {{--<img src=""> asset($logo_discount) para previsualizar el logo q ya hay--}}
                                            <input type="file" wire:model.defer="logo_discount">
                                        @else
                                            <div class="" style="float:right;">
                                                <img src="{{$dato->logo}}" style="width:180px;">
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-3">{{$discounts->links()}}</div>
            </div>
            @else
                <!-- <div class="p-5">
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label>Nombre</label>
                            <input type="text" wire:model="name_discount"style="outline:none;">
                        </div>
                        <div class="col-6">
                            <label>Logo</label>
                            <input type="file" class="form-control rounded-0"wire:model="logo_discount">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <label>Contact</label>
                            <input type="text" wire:model="contact_discount"style="outline:none;">
                        </div>
                        <div class="col-6 custom-form">
                            <label>Descripcion</label>
                            <textarea class="form-control rounded-0"wire:model="descripcion_discount"></textarea>
                        </div>
                    </div>
                </div> -->
                <div class="p-5 pt-1" style="width:1350px;">
                    <div class="row mb-4">
                        <div class="col-6 custom-form">
                            <label class="mb-2">Nombre</label>
                            <input class="form-control rounded-0 mb-2" wire:model.lazy="name_discount">
                        </div>
                        <div class="col-6 custom-form">
                            <label class="mb-2">Contacto</label>
                            <input class="form-control rounded-0 mb-2" wire:model.lazy="contact_discount">

                        </div>
                    </div>
                    <div class="row mb-4 pb-1">
                        <div class="col-3">
                            <label class="mb-2">Logo</label>
                            <input type="file"class="form-control rounded-0 mb-2" wire:model.defer="logo_discount">
                        </div>
                        <div class="col-9">
                            <label class="mb-2">Descripción</label>
                            <textarea type=""class="form-control rounded-0 mb-2" wire:model.defer="description_discount" style="height:220px;"></textarea>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class="w-50 mr-2 py-3" wire:click="saveNewDiscount" style="background-color:#AC4073;color:white;">Guardar</button>
                        <button class="w-50 py-3" wire:click="$set('inputsToCreateDiscount', false)" style="border:1px solid #000;">Cancelar</button>
                    </div>
                </div>
            <div>
            @endif
        @endif
    </div>
@endif
