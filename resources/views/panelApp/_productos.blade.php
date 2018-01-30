<div style="background: #005000;" class="text-center">
        <h3  class="center-block" style=" color: #ffffff;  position :relative !important; 
       ">TUS PRODUCTOS</h3>
    </div>

<div  class="text-center">
    <h4>Diles cuáles son tus productos estrellas!!!</h4>
</div>

<div  class="text-center">
    <h5>En caso que lo desee podrá agregar 10 productos.!!!</h5>
</div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="thumbnail producto">
                @php($img = "/img/default-image.jpg" )
                @isset($prod1)
                    @php($img =$prod1->url )
                @endisset
                 <img src="{{$img}}" class="img-responsive" id="pprincipal" style="height: 640px; width: 640px;">

            </div>
        </div>
    </div>


    <div class="row center-block" style="width: 95%;">
        <div class="row">
            <div class="col-md-9">
                <h3>
                    Productos</h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="col-sm-3">
                            @if(!isset($prod1))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-1 productos" data-numero="1" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod1))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod1->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod1->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod1->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod1->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod1->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($prod2))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-2 productos" data-numero="2" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod2))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod2->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod2->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod2->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod2->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod2->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($prod3))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-3 productos" data-numero="3" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod3))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod3->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod3->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod3->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod3->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod3->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($prod4))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-4 productos" data-numero="4" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod4))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod4->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod4->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod4->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod4->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod4->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-3">
                            @if(!isset($prod5))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-5 productos" data-numero="5" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod5))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod5->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod5->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod5->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod5->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod5->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($prod6))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-6 productos" data-numero="6" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod6))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod6->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod6->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod6->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod6->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod6->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($prod7))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-7 productos" data-numero="7" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod7))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod7->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod7->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod7->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod7->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod7->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($prod8))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-8 productos" data-numero="8" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod8))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod8->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod8->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod8->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod8->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod8->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="row">
                        <div class="col-sm-3">
                            @if(!isset($prod9))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-9 productos" data-numero="9" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod9))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod9->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod9->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod9->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod9->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod9->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if(!isset($prod10))
                                <div class="col-item">
                                    <div class="photo">
                                        <a href="javascript:void(0);" class=" btn-imagen-producto-10 productos" data-numero="10" id="btn-imagen-icono" title="Click para asociar imagen">
                                            <img src="/img/default-image.jpg" class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="separator clear-left">
                                            <p class="">Click en la imagen para agregar un producto</p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($prod10))
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{$prod10->url}}" class="img-responsive img" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                   <strong>{{ $prod10->nombre  }}</strong> </h5>
                                                <h5 >
                                                    {{ $prod10->descripcion  }}</h5>
                                            </div>

                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                    <a  class="hidden-sm editProducto" href="{{$prod10->idproducto}}" >Editar</a></p>
                                            <p class="btn-details">
                                                <i class="glyphicon glyphicon-trash"></i><a href="{{ route('producto.delete',['id' => $prod10->idproducto]) }}"  class="hidden-sm deleteProducto">Eliminar</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


