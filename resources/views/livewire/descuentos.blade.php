
<div class="row d-flex justify-content-center p-4">
    <div class="row p-4 d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center mb-4 p-4">
                <div class="pb-4">
                    <div class="d-flex align-items-center flex-column" style="height: 150px;font-family: Noto Serif;width:1350px;">
                        <div class="p-2 h6" style="color:#C59A8E;font-style:italic;">Área privada</div>
                        <div class="h2" style="font-family: 'Montserrat',sans-serif;padding-bottom:50px;">DESCUENTOS</div>
                    </div>
                </div>                            
            </div>
            <div class="row d-flex justify-content-center w-75">
            <div class="accordion accordion-flush mb-4" id="accordionFlushExample">
                @foreach($discounts as $item)
                <div class="mt-2" id="accordion-{{ $item->id }}">
                    <div class="accordion-item" style="background-color:white !important;">
                        <h2 class="accordion-header bg-white" id="heading-{{ $item->id }}">
                            <button class="fw-bold accordion-button text-dark bg-white border-bottom border-1" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $item->id }}" data-mdb-parent="#accordionFlushExample"aria-expanded="true" aria-controls="collapse-{{ $item->id }}" style="text-transform:uppercase;font-family:'Montserrat', Sans-serif;">
                                {{ $item->name }}
                            </button>
                        </h2>
                        <div id="collapse-{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $item->id }}" data-bs-parent="#accordion-{{ $item->id }}">
                            <div class="accordion-body d-flex justify-content-around">
                                <div class="">
                                    {{ $item->description }}
                                    <div class="">
                                     Contacto: {{ $item->contact }}
                                    </div>
                                </div>
                                <div class="" style="float:right;">
                                    <img src="{{$item->logo}}" style="width:150px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
    </div>


</div>
