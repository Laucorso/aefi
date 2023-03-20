<div class="p-4" style="width:1350px;">
    <div class="row p-4 d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center mb-4 p-2">
                <div class="">
                    <div class="d-flex align-items-center flex-column" style="height: 150px;font-family: Noto Serif;">
                        <div class="p-2 h6" style="color:#C59A8E;font-style:italic;">Área privada</div>
                        <div class="h1" style="font-family: 'Montserrat',sans-serif;font-size:45px;font-weight:600;">DESCUENTOS</div>
                    </div>
                </div>                            
            </div>
            {{--<div class="accordion accordion-flush w-100" id="accordionFlush" style="">

            @foreach($discounts as $item)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-{{$item->id}}" style="outline-style: none;">
                        <button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$item->id}}" aria-expanded="false" aria-controls="flush-{{$item->id}}" style="box-shadow:none !important;text-transform:uppercase;border-bottom:1px solid #995D2D;">
                            {{ $item->name }}
                        </button>
                    </h2>
                    <div id="flush-{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="flush-{{$item->id}}" data-bs-parent="#accordionFlush">
                        <div class="accordion-body">
                            <div class="d-flex align-items-center justify-content-between p-3">
                                    <div class="" style="color:#8A8080;">
                                        {{ $item->description }}
                                        <div class="fw-bold">Contacto: {{ $item->contact }}</div>
                                    </div>
                                    <div class="" style="float:right;">
                                        <img src="{{$item->logo}}" style="width:180px;">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
            </div>--}}

    </div>
    <div class="accordion border-0" id="mi-acordeon">
        @foreach($discounts as $dato)
            <div class="accordion-item border-0 mb-2">
                <h2 class="accordion-header" id="heading{{ $dato->id }}" style="border-bottom:1px solid #995D2D;color:dark;">
                    <button class="accordion-button bg-white collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $dato->id }}" aria-expanded="true" aria-controls="collapse{{ $dato->id }}" style="text-transform:uppercase;box-shadow:none !important;">
                        {{ $dato->name }}
                    </button>
                </h2>
                <div id="collapse{{ $dato->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $dato->id }}" data-bs-parent="#mi-acordeon">
                    <div class="accordion-body">
                        <div class="d-flex align-items-center justify-content-between p-3">
                                <div class="" style="color:#8A8080;">
                                    {{ $dato->description }}
                                    <div class="fw-bold">Contacto: {{ $dato->contact }}</div>
                                </div>
                                <div class="" style="float:right;">
                                    <img src="{{$dato->logo}}" style="width:180px;">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
     </div>
</div>




